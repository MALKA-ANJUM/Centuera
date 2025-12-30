@extends('user.layouts.layout')
@section('title', 'Login | Centuera')
@section('content')

<div class="container my-5">
    <div class="row justify-content-center ">
        <div class="col-md-5">
            <div class="card mb-0">
                <div class="card-body">
                      <form class="auth-register-form" action="{{ route('login.details.submit') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label mb-0">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control rounded-3 border p-2" id="email" name="email" placeholder="john@example.com" required>
                        </div>


                        <!-- Password -->
                        <div class="mb-3">

                            <label for="password" class="form-label mb-0">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control rounded-start-3 border p-2" id="password" name="password" placeholder="••••••••" required>
                                <button type="button" class="btn btn-outline-secondary rounded-end-3 toggle-password p-2 border" data-target="password">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('user.forgot.password') }}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>

                        </div>

                        <!-- Submit -->
                        <button class="btn btn-primary w-100 rounded-3" type="submit">Sign In</button>
                    </form>

                    <p class="text-center mt-2">
                        <span>New on our platform?</span>
                        <a href="{{ route('register') }}">
                            <span>Create an account</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Login basic -->
        </div>
    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    .register {
        width: 400px;
    }
</style>
@endpush

@push('script')
<script>
   document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });
    });
</script>
@endpush