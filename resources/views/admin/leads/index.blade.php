@extends('admin.layouts.layout')
@section('title', 'Leads')
@section('content')

<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row mb-2">
            <div class="col-12">
                <h2 class="content-header-title">Leads</h2>
            </div>
        </div>
        <div class="content-body">
            <section>
                <div class="card">
                    <div class="card-header border-bottom d-flex align-items-center">
                        <form action="" method="GET" class="d-flex ms-auto">
                            <input type="text" name="search" class="form-control" placeholder="Search by name, email, or phone" value="{{ request('search') }}">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($leads as $index => $lead)
                                    <tr>
                                        <td>{{ $leads->firstItem() + $index }}</td>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->phone }}</td>
                                        <td>{{ Str::limit($lead->message, 50) }}</td>
                                        <td>
                                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No leads found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end mt-2">
                            {{ $leads->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
