@extends('user.layouts.layout')
@section('title', 'OTP Verification')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-0">
                <div class="card-body">
                    <h2 class="card-title fw-bold mb-1 text-center" style="font-size:2rem; letter-spacing:1px;">OTP Verification</h2>
                    <p class="card-text mb-4 text-center" style="color:#555; font-size:1.1rem;">Please enter the OTP sent to your registered email address.</p>
                    <form action="{{ route('user.otp.verification') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="mb-3">
                            <label for="otp" class="form-label mb-0">OTP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 border p-2" id="otp" name="otp" placeholder="Enter OTP" required>
                        </div>
                        <button class="btn btn-primary w-100 rounded-3" type="submit">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
