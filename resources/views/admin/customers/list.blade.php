@extends('admin.layouts.layout')
@section('title', 'Customers')
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
                        <h2 class="content-header-title float-start mb-0">@lang('Customers')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-success') }} text-center fs-3">
                                    {{ Session::get('message') }}
                                </p>
                            @endif

                            @if (Session::has('error'))
                                <p class="alert {{ Session::get('alert-class', 'alert-danger') }} text-center fs-3">
                                    {{ Session::get('error') }}
                                </p>
                            @endif

                            <div class="card-header border-bottom d-flex justify-content-end">
                                <form action="" method="GET" class="d-flex">
                                    <input type="text" name="search" id="search" class="form-control"
                                        value="{{ $search }}" placeholder="Search">
                                    <button type="submit" class="btn btn-primary ms-1">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="{{ route('admin.customers.list') }}" class="btn btn-primary ms-1">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </a>
                                </form>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-ajax table table-hover">
                                    <thead>
                                        <tr>
                                            <th>@lang('ID')</th>
                                            <th>@lang('First Name')</th>
                                            <th>@lang('Last Name')</th>
                                            <th>@lang('Email')</th>
                                            <th>@lang('Mobile')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($users->count() > 0)
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td>{{ $users->firstItem() + $index }}</td>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.customers.view', $user->id) }}" class="btn btn-outline-success btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="6">No customers found</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>

                                @if (count($users) > 0)
                                    {{ $users->links('pagination::bootstrap-5') }}
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