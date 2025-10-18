<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Order Confirmation' }}</title>
</head>
<body>
    <h2>{{ $title ?? 'Order Confirmation' }}</h2>
    <p>{!! $body !!}</p>
    <hr>
    <h3>Order Details</h3>
    <ul>
        <li><strong>Order ID:</strong> {{ $order->orderId ?? '' }}</li>
        <li><strong>Full Name:</strong> {{ $order->fullname ?? '' }}</li>
        <li><strong>Email:</strong> {{ $order->email ?? '' }}</li>
        <li><strong>Country Code:</strong> {{ $order->country_code ?? '' }}</li>
        <li><strong>Phone:</strong> {{ $order->phone ?? '' }}</li>
        <li><strong>Schedule ID:</strong> {{ $order->schedule_id ?? '' }}</li>
        <li><strong>Courses:</strong> {{ is_array($order->courses) ? implode(', ', $order->courses) : $order->courses }}</li>
        <li><strong>Total Amount:</strong> {{ $order->total_amount ?? '' }}</li>
        <li><strong>Discount:</strong> {{ $order->discount ?? '' }}</li>
        <li><strong>Currency:</strong> {{ $order->currency ?? '' }}</li>
        <li><strong>Workshop Start Date:</strong> {{ $order->workshop_start_date ?? '' }}</li>
        <li><strong>Workshop End Date:</strong> {{ $order->workshop_end_date ?? '' }}</li>
        <li><strong>Status:</strong> {{ $order->status ?? '' }}</li>
        <li><strong>Custom Payment:</strong> {{ $order->custom_payment ?? '' }}</li>
        <li><strong>Transaction ID:</strong> {{ $order->transaction_id ?? '' }}</li>
    </ul>
</body>
</html>
