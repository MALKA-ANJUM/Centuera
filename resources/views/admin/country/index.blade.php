@extends('admin.layouts.layout')
@section('title', 'Country')
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
                        <h2 class="content-header-title float-start mb-0">@lang('Country')</h2>
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
                                        value="{{ $search }}" placeholder="Search Country">
                                    <button type="submit" class="btn btn-primary ms-1">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="{{ route('admin.country.list') }}" class="btn btn-primary ms-1">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </a>
                                </form>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-ajax table table-hover">
                                    <thead>
                                        <tr>
                                            <th>@lang('ID')</th>
                                            <th>@lang('Country Name')</th>
                                            <th>@lang('Code')</th>
                                            <th>@lang('Flag')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($countries) > 0)
                                            @foreach ($countries as $index => $country)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $country->name }}</td>
                                                    <td>{{ $country->iso }}</td>
                                                    <td>
                                                        {!! $country->flag !!}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-success"
                                                            href="{{ route('admin.country.edit', $country->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="5">No data found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                @if (count($countries) > 0)
                                    {{ $countries->links('pagination::bootstrap-5') }}
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