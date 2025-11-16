@extends('admin.layouts.layout')
@section('title', 'Edit Category')

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
                                    <li class="breadcrumb-item active">Edit Category</li>
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
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <!-- Category Name -->
                                <div class="col-md-12">
                                    <label for="name" class="form-label">@lang('Category Name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Enter Category Name')"
                                           name="name" id="name" value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Accreditation Bodies -->
                                <h4 class="mt-2">Accreditation Bodies</h4>
                                <div id="accreditation-wrapper">
                                    @php
                                        $accreditations = json_decode($category->accreditation_bodies, true) ?? [];
                                    @endphp

                                    @foreach ($accreditations as $index => $accr)
                                        <div class="row mb-2 accreditation-item">
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="accreditation_bodies[]"
                                                       value="{{ $accr['name'] ?? '' }}" placeholder="Enter Accreditation Body">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="file" class="form-control" name="image[]">
                                                @if (!empty($accr['image']))
                                                    <img src="{{ asset('admin/accreditation_images/' . $accr['image']) }}" alt="Image" class="mt-1" width="60">
                                                    <input type="hidden" name="old_image[]" value="{{ $accr['image'] }}">
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger remove-field">X</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-md-12">
                                    <button type="button" id="add-more" class="btn btn-success">+ Add More</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">@lang('Update')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#add-more').click(function () {
            $('#accreditation-wrapper').append(`
                <div class="row mb-2 accreditation-item">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="accreditation_bodies[]" 
                               placeholder="Enter Accreditation Body">
                    </div>
                    <div class="col-md-5">
                        <input type="file" class="form-control" name="image[]">
                        <input type="hidden" name="old_image[]" value="">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-field">X</button>
                    </div>
                </div>
            `);
        });

        $(document).on('click', '.remove-field', function () {
            $(this).closest('.accreditation-item').remove();
        });
    });
</script>
@endpush
