@extends('user.layouts.layout')
@section('title', 'Order Details')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <!-- Back Button -->
            <div class="mb-3">
                <a href="{{ route('user.dashboard', ['tab' => 'orders']) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back to Orders
                </a>
            </div>

            <!-- Order Card -->
            <div class="card shadow-lg border-0 rounded-4 mw-100">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-0 rounded-top">
                    <h4 class="mb-0"><i class="fa fa-receipt text-primary me-2"></i> Order #{{ $orders->orderId }}</h4>
                    <span class="badge 
                        @if($orders->status == 'pending') bg-warning text-dark
                        @elseif($orders->status == 'paid') bg-success
                        @elseif($orders->status == 'cancelled') bg-danger
                        @endif px-3 py-2">
                        {{ ucfirst($orders->status) }}
                    </span>
                </div>

                <div class="card-body p-4">

                    <!-- Order Summary -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="p-3 bg-light rounded-3">
                                <p class="text-muted mb-1"><i class="fa fa-user text-primary me-2"></i>Customer</p>
                                <h6 class="mb-0 fw-bold">{{ $orders->fullname }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="p-3 bg-light rounded-3">
                                <p class="text-muted mb-1"><i class="fa fa-envelope text-info me-2"></i>Email</p>
                                <h6 class="mb-0 fw-bold">{{ $orders->email }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="p-3 bg-light rounded-3">
                                <p class="text-muted mb-1"><i class="fa fa-phone text-success me-2"></i>Phone</p>
                                <h6 class="mb-0 fw-bold">+{{ $orders->country_code }} {{ $orders->phone }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Dates -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="p-3 border rounded-3">
                                <p class="text-muted mb-1"><i class="fa fa-calendar text-secondary me-2"></i>Start Date</p>
                                <h6 class="mb-0 fw-bold">
                                    {{ $orders->workshop_start_date ? \Carbon\Carbon::parse($orders->workshop_start_date)->format('d M Y') : '-' }}
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="p-3 border rounded-3">
                                <p class="text-muted mb-1"><i class="fa fa-calendar-check text-secondary me-2"></i>End Date</p>
                                <h6 class="mb-0 fw-bold">
                                    {{ $orders->workshop_end_date ? \Carbon\Carbon::parse($orders->workshop_end_date)->format('d M Y') : '-' }}
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="p-3 border rounded-3">
                                <p class="text-muted mb-1"><i class="fa fa-clock text-secondary me-2"></i>Order Date</p>
                                <h6 class="mb-0 fw-bold">{{ $orders->created_at->format('d M Y') }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Courses Table -->
                    <h5 class="mb-3 mt-4">Courses</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Course Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($orders->courses && is_array($orders->courses))
                                    @foreach($orders->courses as $index => $courseId)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ \App\Models\Course::find($courseId)->title ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="text-center text-muted">No courses found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Payment Info -->
                    <h5 class="mb-3 mt-4">Payment Information</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <p class="text-muted mb-1">Amount</p>
                                <h6 class="mb-0 fw-bold">{{ number_format($orders->total_amount, 2) }} {{ $orders->currency }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <p class="text-muted mb-1">Transaction ID</p>
                                <h6 class="mb-0 fw-bold">{{ $orders->transaction_id ?? '-' }}</h6>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-end bg-white border-0 rounded-bottom">
                    <a href="{{ route('user.order.invoice', $orders->id) }}" class="btn btn-outline-success" target="_blank">
                        <i class="fa fa-download"></i> Download Invoice
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
