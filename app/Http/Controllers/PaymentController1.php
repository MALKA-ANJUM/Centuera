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

class PaymentController1 extends Controller
{
    public function paymentForm()
    {
        return view('user.payment');
    }

    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // ✅ Find or create user
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'first_name'   => explode(' ', $request->fullname)[0] ?? '',
                'last_name'    => explode(' ', $request->fullname, 2)[1] ?? '',
                'password'     => bcrypt(Str::random(10)),
                'mobile'       => $request->phone ?? null,
                'country_code' => $request->country_code ?? null,
            ]
        );

        $courseIds = is_array($request->course_id) ? $request->course_id : [$request->course_id];

        // ✅ Check if order exists
        if (!empty($request->order_id)) {

            $order = Order::where('orderId', $request->order_id)->first();
            if ($order) {
                $order->update([
                    'fullname'             => $request->fullname,
                    'email'                => $request->email,
                    'phone'                => $request->phone,
                    'country_code'         => $request->country_code,
                    'schedule_id'          => $request->schedule_id,
                    'courses'              => $courseIds,
                    'total_amount'         => $request->total_amount,
                    'discount'             => $request->discount,
                    'currency'             => $request->currency,
                    'workshop_start_date'  => $request->workshop_start_date,
                    'workshop_end_date'    => $request->workshop_end_date,
                    'custom_payment'       => $request->custom_payment ?? 0,
                ]);
            }
        } else {
            // ✅ Create a new order
            $lastOrder = Order::orderBy('id', 'desc')->first();
            $nextNumber = $lastOrder && !empty($lastOrder->orderId)
                ? ((int) str_replace('CT-', '', $lastOrder->orderId)) + 1
                : 1001;

            $order = Order::create([
                'orderId'              => 'CT-' . $nextNumber,
                'fullname'             => $request->fullname,
                'email'                => $request->email,
                'country_code'         => $request->country_code,
                'phone'                => $request->phone,
                'schedule_id'          => $request->schedule_id,
                'courses'              => $courseIds,
                'total_amount'         => $request->total_amount,
                'discount'             => $request->discount,
                'currency'             => $request->currency,
                'workshop_start_date'  => $request->workshop_start_date,
                'workshop_end_date'    => $request->workshop_end_date,
                'status'               => 'pending',
                'custom_payment'       => $request->custom_payment ?? 0,
                'transaction_id'       => Str::uuid(),
            ]);

            // Add Order Details
            foreach ($courseIds as $courseId) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'course_id' => $courseId,
                    'schedule_id' => $request->schedule_id,
                    'quantity' => $request->participants,
                ]);
            }
        }
   
        if ($request->payWithStripe == 1 && isset($order)) {
            // ✅ Stripe session if paying
            $amountInCents = intval($order->total_amount * 100);

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $order->currency,
                        'product_data' => ['name' => 'Order #' . $order->orderId],
                        'unit_amount' => $amountInCents,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'customer_email' => $order->email,
                'billing_address_collection' => 'required',
                'success_url' => route('stripe.success') . "?order_id=" . $order->orderId,
                'cancel_url' => route('stripe.cancel') . "?order_id=" . $order->orderId,
            ]);
        }

        return response()->json(['id' => $session->id, 'order_id' => $order->orderId]);
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
        ]);
    }
}
