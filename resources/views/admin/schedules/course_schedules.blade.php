@extends('admin.layouts.layout')
@section('title', 'Course Schedules')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12 mb-2">
                            <h2 class="content-header-title float-start mb-0">Course Schedules</h2>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <a href="{{ route('admin.schedule.create', $course->id) }}" class="btn btn-primary me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Add Schedule
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                @if (session('success'))
                                    <p class="alert alert-success text-center fs-3">{{ session('success') }}</p>
                                @endif
                                @if (session('error'))
                                    <p class="alert alert-danger text-center fs-3">{{ session('error') }}</p>
                                @endif
                                <div class="card-header border-bottom d-flex align-items-center">
                                    <form action="" method="GET" class="d-flex ms-auto">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search by Type,Batch" value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-primary ms-2"><i
                                                class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-ajax table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl.no</th>
                                                <th>Course</th>
                                                <th>Batch Type</th>
                                                <th>Batch</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($schedules as $index => $schedule)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $schedule->getCourse->title ?? '-' }}</td>
                                                    <td>{{ $schedule->type ?? '-' }}</td>
                                                    <td>{{ $schedule->batche ?? '-' }}</td>
                                                    <td>
                                                        <a class="btn btn-outline-success btn-sm"
                                                            href="{{ route('admin.schedule.edit', $schedule->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{route('admin.schedule.delete', $schedule->id)}}" class="btn btn-outline-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="7">No schedules found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    @if ($schedules->count())
                                        {{ $schedules->links('pagination::bootstrap-5') }}
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
