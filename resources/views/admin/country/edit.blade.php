@extends('admin.layouts.layout')
@section('title', 'Edit Country')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">@lang('Country')</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.country.list') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Country</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }} text-center fs-3">
                {{ Session::get('error') }}
            </p>
        @endif

        <div class="content-body">
            <div class="card w-100">
                <div class="card-body">
                    <form action="{{ route('admin.country.update', $country->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="name" class="form-label">@lang('Country Name')</label>
                                <input type="text" class="form-control" placeholder="@lang('Enter Country Name')"
                                    name="name" id="name" value="{{ old('name', $country->name) }}" readonly>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="flag" class="form-label">@lang('Flag')</label>
                                <input type="text" class="form-control" name="flag" id="flag" value="{{old('flag', $country->flag)}}" >
                                @error('flag')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                               {{-- @if ($country->flag)
                                    <a href="{{ asset('admin/flag/' . $country->flag) }}" target="_blank">view image</a>
                                @endif --}}
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
