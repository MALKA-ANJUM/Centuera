@extends('admin.layouts.layout')
@section('title', 'Add Category')

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
                            <h2 class="content-header-title float-start mb-0">@lang('Category')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Add Category</li>
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
                        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">@lang('Category Name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Enter Category Name')"
                                        name="name" id="name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label for="features" class="form-label">@lang('Features')</label>
                                    <textarea class="form-control" name="features" id="features"
                                        placeholder="Enter features"></textarea>
                                    @error('features')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">@lang('Add')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
