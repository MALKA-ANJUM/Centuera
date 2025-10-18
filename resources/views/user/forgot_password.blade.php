@extends('user.layouts.layout')
@section('title', 'Forgot Password')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 mb-0">
                <div class="card-body p-5">
                    <h2 class="card-title fw-bold mb-1 text-center" style="font-size:2rem; letter-spacing:1px;">Verify Email</h2>
                    <p class="card-text mb-4 text-center" style="color:#555; font-size:1.1rem;">Please enter your registered e-mail to verify, we'll send your verification code.</p>
                    <form action="{{ route('user.send.otp') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label mb-0">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control rounded-3 border p-2" id="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <button class="btn btn-primary w-100 rounded-3" type="submit">Send OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
