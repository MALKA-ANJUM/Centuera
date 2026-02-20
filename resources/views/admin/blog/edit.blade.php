@extends('admin.layouts.layout')
@section('title', 'Edit Blog Form')
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
                        <h2 class="content-header-title float-start mb-0">@lang('Edit Blog')</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.blog.list') }}">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="card w-100">
                <div class="card-body">
                    <form action="{{ route('admin.blog.update', $blogs->id) }}" id="updateBlog" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="title" class="form-label">@lang('Title')</label>
                                <input type="text" class="form-control" placeholder="@lang('Enter Title')"
                                    name="title" id="title" value="{{ old('title', $blogs->title) }}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="meta" class="form-label">@lang('meta')</label>
                                <input type="text" class="form-control" placeholder="@lang('Enter Meta')"
                                    name="meta" id="meta" value="{{ old('meta', $blogs->meta) }}" required>
                                @error('meta')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="categories" class="form-label">@lang('Categories')</label>
                                <select  class="form-control" name="categories" required>
                                    <option value="">Select categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id ==  $blogs->categories) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">@lang('Date')</label>
                                <input type="text" id="date" name="date"
                                    class="form-control flatpickr-basic flatpickr-input active"
                                    value="{{ old('date', $blogs->date) }}">
                                @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="image" class="form-label">@lang('Image')</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if ($blogs->image)
                                <a href="{{ asset('admin/blog/' . $blogs->image) }}" target="_blank">view image</a>
                                @endif
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="author" class="form-label">@lang('Author')</label>
                                <input type="text" class="form-control" name="author" id="author" value="{{ $blogs->author }}">
                                @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                           <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="views" class="form-label">@lang('Views')</label>
                                <input type="number" class="form-control" name="views" id="views" value="{{ $blogs->views }}">
                                @error('views')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="read_time" class="form-label">@lang('Read Time (In mins)')</label>
                                <input type="number" class="form-control" name="read_time" id="read_time" value="{{ $blogs->read_time }}">
                                @error('read_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <label for="description" class="form-label">@lang('Description')</label>
                                <textarea class="form-control" placeholder="@lang('Enter Description')" name="description" id="description" rows="4"
                                    required>{{ old('description', $blogs->description) }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
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
    .create(document.querySelector('#description'), {
        ckfinder: {
            uploadUrl: "{{ route('admin.upload.blog.image') }}?_token={{ csrf_token() }}"
        },
        toolbar: [
            'heading', '|', 'bold', 'italic', 'link',
            '|', 'bulletedList', 'numberedList',
            '|', 'insertTable', 'blockQuote',
            '|', 'undo', 'redo', '|', 'imageUpload'
        ]
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endpush

@push('style')
<style>
    .ck.ck-editor__editable_inline>:last-child {
        margin-bottom: var(--ck-spacing-large);
        height: 120px;
    }
</style>
@endpush