@extends('user.layouts.layout')
@section('title', 'Reset Password')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-0">
                <div class="card-body">
                    <form action="{{ route('user.reset.password') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="mb-3">
                            <label for="password" class="form-label mb-0">New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control rounded-3 border p-2" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label mb-0">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control rounded-3 border p-2" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button class="btn btn-primary w-100 rounded-3" type="submit">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
