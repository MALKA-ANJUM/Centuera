@extends('admin.layouts.layout')
@section('title', 'Add Coupon')

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
                            <h2 class="content-header-title float-start mb-0">@lang('Coupon')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Add Coupon</li>
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
                        <form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="form-label">@lang('Coupon Name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Enter Coupon Name')" name="name" id="name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="code" class="form-label">@lang('Coupon Code')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Enter Coupon Code')" name="code" id="code" required value="{{ old('code', $autoCode ?? '') }}" readonly>
                                    @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="start_date" class="form-label">@lang('Start Date')</label>
                                    <input type="text" class="form-control" name="start_date" id="start_date" required autocomplete="off">
                                    @error('start_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="expire_date" class="form-label">@lang('Expire Date')</label>
                                    <input type="text" class="form-control" name="expire_date" id="expire_date" required autocomplete="off">
                                    @error('expire_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="type" class="form-label">@lang('Type')</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="">@lang('Select Type')</option>
                                        <option value="percentage">@lang('Percentage')</option>
                                        <option value="fixed">@lang('Fixed')</option>
                                    </select>
                                    @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="value" class="form-label">@lang('Value')</label>
                                    <input type="number" step="0.01" class="form-control" name="value" id="value" required>
                                    @error('value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="course_id" class="form-label">@lang('Course(s)')</label>
                                    <select class="form-control select2" name="course_id[]" id="course_id" multiple>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ (collect(old('course_id'))->contains($course->id)) ? 'selected' : '' }}>
                                                {{ $course->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">@lang('Add')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@push('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#start_date', {dateFormat: 'Y-m-d'});
        flatpickr('#expire_date', {dateFormat: 'Y-m-d'});
    </script>
@endpush
@endsection
