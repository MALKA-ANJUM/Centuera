@extends('user.layouts.layout')
@section('title', 'Payment Cancelled')
@section('content')

@section('content')
<div class="container d-flex justify-content-center align-items-center border rounded mb-3">
    <div class="border-0 text-center" style="padding: 40px; border-radius: 15px;">
        <h1 class="text-danger mb-3">Payment Failed. Try Again</h1>
        <p class="fs-5 text-muted">Order Id #{{ $order->orderId }}</p>

        <img src="{{ asset('frontend-assets/img/all-img/cancel.gif') }}" 
             alt="Payment Success" class="mb-4 mx-auto" style="max-width: 135px;">
        <a href="{{ route('user.dashboard', ['tab' => 'orders']) }}" class="btn btn-primary">Return to Dashboard</a>
    </div>
</div>
</div>
@endsection
