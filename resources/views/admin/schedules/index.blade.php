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
                    <div class="card-body">
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
                                                <a href="{{ route('admin.schedule.create', $course->id) }}" class="btn btn-primary btn-sm">Update</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No courses found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $courses->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
