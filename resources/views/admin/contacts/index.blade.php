@extends('admin.layouts.layout')
@section('title', 'Contacts')
@section('content')

<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row mb-2">
            <div class="col-12">
                <h2 class="content-header-title">Contacts</h2>
            </div>
        </div>
        <div class="content-body">
            <section>
                <div class="card">
                    <div class="card-header border-bottom d-flex align-items-center">
                        <form action="" method="GET" class="d-flex ms-auto">
                            <input type="text" name="search" class="form-control" placeholder="Search by name, email, or subject" value="{{ request('search') }}">
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
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $index => $contact)
                                    <tr>
                                        <td>{{ $contacts->firstItem() + $index }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ Str::limit($contact->message, 50) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No contacts found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end mt-2">
                            {{ $contacts->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
