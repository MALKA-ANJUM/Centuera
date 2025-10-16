@extends('admin.layouts.layout')
@section('title', 'Coupons')
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
                        <h2 class="content-header-title float-start mb-0">Coupons</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (Session::has('success'))
                                <p class="alert {{ Session::get('alert-class', 'alert-success') }} text-center fs-3">
                                    {{ Session::get('success') }}
                                </p>
                            @endif

                            @if (Session::has('error'))
                                <p class="alert {{ Session::get('alert-class', 'alert-danger') }} text-center fs-3">
                                    {{ Session::get('error') }}
                                </p>
                            @endif

                            <div class="card-header border-bottom d-flex align-items-center">
                                <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add New Coupon
                                    </span>
                                </a>

                                <form action="" method="GET" class="d-flex ms-3">
                                    <input type="text" name="search" id="search" class="form-control"
                                           placeholder="Search Coupon Name or Code" value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary ms-1">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="" class="btn btn-primary ms-1">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </a>
                                </form>
                            </div>

                            <div class="card-datatable table-responsive">
                                <table class="datatables-ajax table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>Expire Date</th>
                                            <th>Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($coupons->count() > 0)
                                            @foreach ($coupons as $index => $coupon)
                                                <tr>
                                                    <td>{{ $coupons->firstItem() + $index }}</td>
                                                    <td>{{ $coupon->name }}</td>
                                                    <td>{{ $coupon->start_date }}</td>
                                                    <td>{{ $coupon->expire_date }}</td>
                                                    <td>{{ $coupon->code }}</td>
                                                    <td>
                                                        <a class="btn btn-outline-success" href="{{ route('admin.coupons.edit', $coupon->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.coupons.delete', $coupon->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this coupon?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="9">No coupons found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                @if ($coupons->count() > 0)
                                    {{ $coupons->links('pagination::bootstrap-5') }}
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
