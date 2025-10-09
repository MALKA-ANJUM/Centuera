@extends('admin.layouts.layout')
@section('title', 'Courses')
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
                        <h2 class="content-header-title float-start mb-0">Courses</h2>
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

                            <div class="card-header border-bottom">
                                <a href="{{ route('admin.course.create') }}" class="btn btn-primary">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add New Course
                                    </span>
                                </a>

                                <form action="{{ route('admin.course.index') }}" method="GET" class="d-flex ms-3">
                                    <input type="text" name="search" id="search" class="form-control"
                                           placeholder="Search Course Title">
                                    <button type="submit" class="btn btn-primary ms-1">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="{{ route('admin.course.index') }}" class="btn btn-primary ms-1">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </a>
                                </form>
                            </div>

                            <div class="card-datatable table-responsive">
                                <table class="datatables-ajax table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($courses) > 0)
                                            @foreach ($courses as $index => $course)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $course->title ?? '' }}</td>
                                                    <td>{{ $course->slug ?? 'N/A' }}</td>
                                                    <td>
                                                        <a class="btn btn-outline-success"
                                                           href="{{ route('admin.course.edit', $course->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href=""
                                                           class="btn btn-outline-danger"
                                                           onclick="return confirm('Are you sure you want to delete this course?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="5">No courses found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                @if (count($courses) > 0)
                                    {{ $courses->links('pagination::bootstrap-5') }}
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
