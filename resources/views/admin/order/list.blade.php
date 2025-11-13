@extends('admin.layouts.layout')
@section('title', 'Orders')
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
                            <h2 class="content-header-title float-start mb-0">@lang('Orders')</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <form action="" method="GET" class="d-flex ms-3">
                                        {{-- From Date --}}
                                        <input type="text" name="from_date" class="form-control datepicker"
                                            placeholder="From Date" value="{{ request('from_date') }}">

                                        {{-- To Date --}}
                                        <input type="text" name="to_date" class="form-control datepicker"
                                            placeholder="To Date" value="{{ request('to_date') }}">

                                        {{-- Filter Button --}}
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i></button>

                                        {{-- Status Filter --}}
                                        <select name="status" class="form-control" style="margin-left:50px">
                                            <option value="">All Status</option>
                                            <option value="pending"{{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="paid"{{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="cancelled"{{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>

                                        {{-- Search filter --}}
                                        <input type="text" name="search" id="search" style="margin-left:50px" class="form-control"
                                            placeholder="Email or Order Id" value="{{ request('search') }}">
                                        <a href="{{route('admin.order.list')}}" class="btn btn-primary"><i
                                                class="fa-solid fa-rotate-right"></i></a>
                                    </form>

                                   <a href="{{ route('admin.order.export', request()->query()) }}" class="btn btn-success">
                                        Export <i class="fa fa-file-excel"></i>
                                    </a>

                                </div>
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-ajax table table-hover">
                                        <thead>
                                            <tr>
                                                <th>@lang('ID')</th>
                                                <th>@lang('Name')</th>
                                                <th>@lang('Order Id')</th>
                                                <th>@lang('Email')</th>
                                                <th>@lang('Course')</th>
                                                <th>@lang('Amount')</th>
                                                <th>@lang('Start date')</th>
                                                <th>@lang('End date')</th>
                                                <th>@lang('Status')</th>
                                                <th>@lang('Action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($orders) > 0)
                                                @foreach ($orders as $index => $order)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $order->fullname }}</td>
                                                        <td>{{ $order->orderId }}</td>
                                                        <td>{{ $order->email }}</td>

                                                        <td>
                                                            @if($order->courses && is_array($order->courses))
                                                                @foreach($order->courses as $courseId)
                                                                    {{ \App\Models\Course::find($courseId)->title ?? 'N/A' }}<br>
                                                                @endforeach
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>

                                                        <td>{{ $order->total_amount }}</td>
                                                        <td>{{ $order->workshop_start_date ? \Carbon\Carbon::parse($order->workshop_start_date)->format('d-M-Y') : '-' }}</td>
                                                        <td>{{ $order->workshop_end_date ? \Carbon\Carbon::parse
                                                        ($order->workshop_end_date)->format('d-M-Y') : '-' }}</td>
                                                        <td>
                                                            @if($order->status == 'pending')
                                                                <span class="badge bg-warning text-dark">Pending</span>
                                                            @elseif($order->status == 'paid')
                                                                <span class="badge bg-success">Paid</span>
                                                            @elseif($order->status == 'cancelled')
                                                                <span class="badge bg-danger">Cancelled</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.order.view', $order->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="8">No data found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    @if (count($orders) > 0)
                                        {{ $orders->links('pagination::bootstrap-5') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
        flatpickr(".datepicker", {
            dateFormat: "d-m-Y",
        });
    });
</script>
@endpush 
