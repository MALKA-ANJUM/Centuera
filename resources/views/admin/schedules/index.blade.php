@extends('admin.layouts.layout')
@section('title', 'Schedules')
@section('content')

<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row mb-2">
            <div class="col-12">
                <h2 class="content-header-title">Course Schedules</h2>
            </div>
        </div>
        <div class="content-body">
            <section>
                <div class="card">
                    <div class="card-header border-bottom d-flex align-items-center">
                        <form action="" method="GET" class="d-flex ms-auto">
                            <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary ms-2"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($courses as $index => $course)
                                    <tr>
                                        <td>{{ $courses->firstItem() + $index }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>
                                                <a href="{{ route('admin.schedule.course.schedules', $course->id) }}" class="btn btn-primary btn-sm">Update</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No courses found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end mt-2">
                            {{ $courses->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
