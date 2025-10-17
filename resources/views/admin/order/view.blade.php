@extends('admin.layouts.layout')
@section('title', 'Order Details')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0 mx-1">Order Details</h2>
                        <a href="{{ route('admin.order.list') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card shadow-lg border-0 rounded-4">
                            <div class="card-header d-flex justify-content-between align-items-center rounded-top">
                                <h5 class="mb-0"><i class="fa fa-receipt"></i> Order # {{ $orders->orderId }}</h5>

                            </div>

                            <div class="card-body p-4">
                                <dl class="row mb-0">

                                    <dt class="col-sm-3">Customer Name</dt>
                                    <dd class="col-sm-3 fw-bold">{{ $orders->fullname }}</dd>

                                    <dt class="col-sm-3">Amount</dt>
                                    <dd class="col-sm-3 fw-bold">{{ number_format($orders->total_amount) }} {{ $orders->currency }}</dd>

                                    <dt class="col-sm-3">Order Id</dt>
                                    <dd class="col-sm-3 fw-bold">{{ $orders->orderId }}</dd>

                                    <dt class="col-sm-3">Start Date</dt>
                                    <dd class="col-sm-3 fw-bold">
                                        {{ $orders->workshop_start_date ? \Carbon\Carbon::parse($orders->workshop_start_date)->format('d M Y') : '-' }}
                                    </dd>

                                    <dt class="col-sm-3">Email</dt>
                                    <dd class="col-sm-3 fw-bold"><i class="fa fa-envelope text-primary me-1"></i>{{ $orders->email }}</dd>

                                    <dt class="col-sm-3">End Date</dt>
                                    <dd class="col-sm-3 fw-bold">
                                        {{ $orders->workshop_end_date ? \Carbon\Carbon::parse($orders->workshop_end_date)->format('d M Y') : '-' }}
                                    </dd>

                                    <dt class="col-sm-3">Phone</dt>
                                    <dd class="col-sm-3 fw-bold"><i class="fa fa-phone text-success me-1"></i> +{{ $orders->country_code }}  {{ $orders->phone }}</dd>

                                    <dt class="col-sm-3">Status</dt>
                                    <dd class="col-sm-3">
                                        @if($orders->status == 'pending')
                                            <span class="badge bg-warning text-dark px-2 py-1 rounded-pill">Pending</span>
                                        @elseif($orders->status == 'paid')
                                            <span class="badge bg-success px-2 py-1 rounded-pill">Paid</span>
                                        @elseif($orders->status == 'cancelled')
                                            <span class="badge bg-danger px-2 py-1 rounded-pill">Cancelled</span>
                                        @endif
                                    </dd>

                                    <dt class="col-sm-3">Courses</dt>
                                    <dd class="col-sm-3">
                                        @if($orders->courses && is_array($orders->courses))
                                            @foreach($orders->courses as $courseId)
                                                <span class="">
                                                    {{ \App\Models\Course::find($courseId)->title ?? 'N/A' }} <br>
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="">N/A</span>
                                        @endif
                                    </dd>

                                    <dt class="col-sm-3">Transaction Id</dt>
                                    <dd class="col-sm-3 fw-bold">{{ $orders->transaction_id}}</dd>
                                </dl>
                            </div>

                            {{-- <div class="card-footer text-center bg-light rounded-bottom">
                                <small class="">
                                    Created on {{ $orders->created_at->format('d M, Y h:i A') }}
                                </small>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
