<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Mail\UserForgotPasswordOTP;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function paymentForm()
    {
        return view('user.payment');
    }

    public function createOrder(Request $request)
    {
        // Check if we already created an order for this email/phone (optional)
        // $order = Order::where('email', $request->email)
        //     ->orWhere('phone', $request->phone)
        //     ->where('status', 'pending')
        //     ->first();

        if ($request->order_id == '') {
            $lastOrder = Order::orderBy('id', 'desc')->first();
            if ($lastOrder && !empty($lastOrder->orderId)) {
                $lastNumber = (int) str_replace('CT-', '', $lastOrder->orderId);
                $orderId = 'CT-' . ($lastNumber + 1);
            } else {
                $orderId = 'CT-1000';
            }
            // Create minimal order
            $order = Order::create([
                'orderId' => $orderId,
                'fullname' => $request->fullname ?? null,
                'email' => $request->email ?? null,
                'phone' => $request->phone ?? null,
                'country_code' => $request->country_code ?? null,
                'status' => 'pending',
                'custom_payment' => $request->custom_payment ?? 0,
                'transaction_id' => \Illuminate\Support\Str::uuid(),
            ]);
            return response()->json([
                'success' => true,
                'order_id' => $order->orderId,
                'message' => 'Order Created Successfully!',
            ]);
        } else {
            $order =  Order::where('orderId', $request->order_id)->update([
                'orderId' => $request->order_id,
                'email' => $request->email ?? null,
                'phone' => $request->phone ?? null,
                'country_code' => $request->country_code ?? null,
            ]);
            return response()->json([
                'success' => true,
                'order_id' => $request->order_id,
                'message' => 'Order Updated Successfully!',
            ]);
        }
    }

    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // ✅ 1. Check if user exists, else create new
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $fullName = trim($request->fullname);
            $nameParts = explode(' ', $fullName, 2);

            $firstName = $nameParts[0] ?? '';
            $lastName  = $nameParts[1] ?? '';
            $randomPassword = Str::random(10);
            $user = User::create([
                'first_name'   => $firstName,
                'last_name'    => $lastName,
                'email' => $request->email,
                'password' => bcrypt($randomPassword), // random temp password
                'mobile' => $request->phone ?? null,
                'country_code' => $request->country_code ?? null,
            ]);

            // Send mail with user id and password
            $mailData = [
                'title' => 'Your Account Details',
                'body'  => 'Your account has been created.<br>User ID: ' . $user->email . '<br>Password: ' . $randomPassword
            ];
            Mail::to($user->email)->send(new UserForgotPasswordOTP($mailData));
        }
        $lastOrder = Order::orderBy('id', 'desc')->first();
        if ($lastOrder && !empty($lastOrder->orderId)) {
            // Extract numeric part (after CT-)
            $lastNumber = (int) str_replace('CT-', '', $lastOrder->orderId);
            $orderId = 'CT-' . ($lastNumber + 1);
        } else {
            $orderId = 'CT-1001';
        }

        $courseIds = is_array($request->course_id) ? $request->course_id : [$request->course_id];
        $order = Order::where('orderId', $request->order_id)->first();

        if ($order) {
            // Update existing order with rest of data
            $order->update([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'country_code' => $request->country_code,
                'phone' => $request->phone,
                'courses' => $courseIds,
                'discount' => $request->discount,
                'total_amount' => $request->total_amount,
                'currency' => $request->currency,
                'coupon_id' => $request->coupon_id,
                'city' => $request->city,
                'schedule_id' => $request->schedule_id,
                'workshop_start_date' => $request->workshop_start_date,
                'workshop_end_date' => $request->workshop_end_date,
            ]);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Generate PDF invoice and send order details mail
        try {
            // Generate PDF from Blade view
            $pdf = PDF::loadView('order-invoice', ['order' => $order]);
            $pdfPath = storage_path('app/invoices/invoice_' . $order->orderId . '.pdf');
            if (!file_exists(dirname($pdfPath))) {
                mkdir(dirname($pdfPath), 0777, true);
            }
            $pdf->save($pdfPath);

            // Prepare mail data
            $mailData = [
                'title' => 'Order Confirmation',
                'body' => 'Thank you for your order.<br>Order ID: ' . $order->orderId . '<br>Total: ' . $order->total_amount,
                'order' => $order
            ];

            // Send mail with PDF attachment
            Mail::send('emails.order-details', $mailData, function ($message) use ($order, $pdfPath) {
                $message->to($order->email)
                    ->subject('Order Confirmation - ' . $order->orderId)
                    ->attach($pdfPath);
            });
        } catch (\Exception $e) {
            // Log error if PDF or mail fails
            Log::error('Order mail/PDF error: ' . $e->getMessage());
        }

        // convert amount to cents (Stripe expects smallest currency unit)
        $amountInCents = intval($request->total_amount * 100);

        // ✅ 3. Create Stripe session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $request->currency,
                    'product_data' => [
                        'name' => 'Course Enrollment',
                    ],
                    'unit_amount' => $amountInCents,
                ],
                // 'quantity' => $request->participants ?? 1,
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' =>  $request->email, // ✅ required
            'billing_address_collection' => 'required', // ✅ ensures address is collected
            'success_url' => route('stripe.success') . "?order_id=" . $order->orderId,
            'cancel_url' => route('stripe.cancel') . "?order_id=" . $order->orderId,
        ]);

        foreach ($courseIds as $courseId) {
            OrderDetail::create([
                'order_id' => $order->id,
                'course_id' => $courseId,
                'schedule_id' => $request->schedule_id,
                'quantity' => $request->participants,
            ]);
        }

        return response()->json(['id' => $session->id]);
    }

    public function success(Request $request)
    {
        $order = Order::where('orderId', $request->order_id)->first();
        if ($order) {
            $order->status = 'paid';
            $order->save();
        }
        return view('user.success', compact('order'));
    }

    public function cancel(Request $request)
    {
        $order = Order::where('orderId', $request->order_id)->first();
        if ($order) {
            $order->status = 'cancelled';
            $order->save();
        }
        return view('user.cancel', compact('order'));
    }

    public function applyCoupon(Request $request)
    {
        $code = trim($request->coupon_code);
        $courseId = $request->course_id; // pass from frontend

        $coupon = Coupon::where('code', $code)->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code.']);
        }

        $today = now()->format('Y-m-d');

        // Date validation
        if ($today < $coupon->start_date || $today > $coupon->expire_date) {
            return response()->json(['success' => false, 'message' => 'Coupon expired or not active yet.']);
        }

        // Course validation
        $courseIds = json_decode($coupon->course_id, true) ?? [];
        if (!in_array($courseId, $courseIds)) {
            return response()->json(['success' => false, 'message' => 'Coupon not valid for this course.']);
        }

        $map = [
            'Classroom' => 'classroom',
            'Live Online Class' => 'online',
        ];

        $scheduleClassType = $map[$request->classtype] ?? strtolower($request->classtype);

        if ($coupon->class_type !== $scheduleClassType) {
            return response()->json(['success' => false, 'message' => 'Coupon not valid for this class type.']);
        }

        // Apply discount
        $discount = 0;
        if ($coupon->type === 'fixed') {
            $discount = $coupon->value;
        } elseif ($coupon->type === 'percentage') {
            $discount = ($request->subtotal * $coupon->value) / 100;
        }

        $newTotal = max($request->subtotal - $discount, 0);

        return response()->json([
            'success' => true,
            'message' => 'Coupon applied successfully!',
            'discount' => $discount,
            'total' => $newTotal,
            'type' => $coupon->type,
            'coupon_id' => $coupon->id,
        ]);
    }
}
