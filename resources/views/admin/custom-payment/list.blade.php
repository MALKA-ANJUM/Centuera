@extends('admin.layouts.layout')
@section('title', 'Custom Payment')
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
                            <h2 class="content-header-title float-start mb-0">@lang('Custom Payment')</h2>
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
                               </div>
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-ajax table table-hover">
                                        <thead>
                                            <tr>
                                                <th>@lang('ID')</th>
                                                <th>@lang('Name')</th>
                                                <th>@lang('Email')</th>
                                                <th>@lang('Course')</th>
                                                <th>@lang('Amount')</th>
                                                <th>@lang('Start date')</th>
                                                <th>@lang('End date')</th>
                                                {{-- <th>@lang('Action')</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($payments) > 0)
                                                @foreach ($payments as $index => $payment)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $payment->fullname }}</td>
                                                        <td>{{ $payment->email }}</td>

                                                        <td>
                                                            @if($payment->courses && is_array($payment->courses))
                                                                @foreach($payment->courses as $courseId)
                                                                    {{ \App\Models\Course::find($courseId)->title ?? 'N/A' }}<br>
                                                                @endforeach
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>

                                                        <td>{{ $payment->total_amount }}</td>
                                                        <td>{{ $payment->workshop_start_date ? \Carbon\Carbon::parse($payment->workshop_start_date)->format('d-M-Y') : '-' }}</td>
                                                        <td>{{ $payment->workshop_end_date ? \Carbon\Carbon::parse
                                                        ($payment->workshop_end_date)->format('d-M-Y') : '-' }}</td>

                                                        {{-- <td>
                                                            <a href="" class="btn btn-success">
                                                                <i class="fa fa-file-excel"></i>
                                                            </a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="8">No data found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    @if (count($payments) > 0)
                                        {{ $payments->links('pagination::bootstrap-5') }}
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
