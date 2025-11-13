<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Illuminate\Support\Str;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function paymentForm()
    {
        return view('user.payment');
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
            $user = User::create([
                'first_name'   => $firstName,
                'last_name'    => $lastName,
                'email' => $request->email,
                'password' => bcrypt(Str::random(10)), // random temp password
                'mobile' => $request->phone ?? null,
                'country_code' => $request->country_code ?? null,
            ]);
        }
        // Generate Order ID ----
        $lastOrder = Order::orderBy('id', 'desc')->first();
        if ($lastOrder && !empty($lastOrder->orderId)) {
            // Extract numeric part (after CT-)
            $lastNumber = (int) str_replace('CT-', '', $lastOrder->orderId);
            $orderId = 'CT-' . ($lastNumber + 1);
        } else {
            $orderId = 'CT-1001';
        }

        $courseIds = is_array($request->course_id) ? $request->course_id : [$request->course_id];
        // ✅ 2. Save order in DB
        $order = Order::create([
            'orderId' => $orderId,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'schedule_id' => $request->schedule_id,
            'courses' => $courseIds, // adjust if relation
            'total_amount' => $request->total_amount,
            'discount' => $request->discount,
            'currency' => $request->currency,
            'workshop_start_date' => $request->workshop_start_date,
            'workshop_end_date' => $request->workshop_end_date,
            'status' => 'pending',
            'custom_payment' => $request->custom_payment ?? 0,
            'transaction_id' => Str::uuid(), // temp unique ID
        ]);

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
            'success_url' => route('stripe.success')."?order_id=".$order->id,
            'cancel_url' => route('stripe.cancel')."?order_id=".$order->id,
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
        $order = Order::find($request->order_id);
        if ($order) {
            $order->status = 'paid';
            $order->save();
        }
        return view('user.success');
    }

    public function cancel(Request $request)
    {
        $order = Order::find($request->order_id);
        if ($order) {
            $order->status = 'cancelled';
            $order->save();
        }
        return view('user.cancel');
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
