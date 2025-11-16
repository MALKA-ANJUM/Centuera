@extends('admin.layouts.layout')
@section('title', 'Add Testimonial')
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
                            <h2 class="content-header-title float-start mb-0">@lang('Add Testimonial')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.testimonial.list') }}">Home</a>
                                    </li>
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
                        <form action="{{ route('admin.testimonial.form') }}" method="POST" id="blogForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="title" class="form-label">@lang('Name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Enter Name')"
                                        name="title" id="title" required>
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label for="description" class="form-label">@lang('Feedback')</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="image" class="form-label">@lang('Image')</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <div class="col-md-6">
                                    <label for="rating" class="form-label">@lang('Rating')</label>
                                    <select name="rating" id="rating" class="form-control" required>
                                        <option value="">Select Rating</option>
                                        <option value="1">1 - ★☆☆☆☆</option>
                                        <option value="2">2 - ★★☆☆☆</option>
                                        <option value="3">3 - ★★★☆☆</option>
                                        <option value="4">4 - ★★★★☆</option>
                                        <option value="5">5 - ★★★★★</option>
                                    </select>
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
@push('script')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
        console.error(error);
    });
</script>
@endpush

@push('style')
<style>
.ck.ck-editor__editable_inline>:last-child
{
    margin-bottom: var(--ck-spacing-large);
    height: 120px;
}
</style>
@endpush
