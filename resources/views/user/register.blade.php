@extends('user.layouts.layout')
@section('title', 'Dashboard')
@section('content')


<div class="container my-5">
    <div class="row justify-content-center ">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Create Your Account</h3>
                    <form class="auth-register-form" action="{{ route('register.details.submit') }}" method="POST">
                        @csrf
                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label mb-0">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 border p-2" id="first_name" name="first_name" placeholder="John" required>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label mb-0">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 border p-2" id="last_name" name="last_name" placeholder="Doe" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label mb-0">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control rounded-3 border p-2" id="email" name="email" placeholder="john@example.com" required>
                        </div>

                        <!-- Mobile -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label mb-0">Mobile No. <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select name="country_code" id="phone-flag" class="form-select rounded-start-3 me-0 select2">
                                    @foreach($countries as $country)
                                    <option value="{{ $country->phonecode }}" data-flag='{!! $country->flag !!}' data-id="{{ $country->id }}">
                                        + {{ $country->phonecode }} {!! $country->flag !!}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control rounded-end-3 border p-2" id="mobile" name="mobile" placeholder="9090909090" required>
                            </div>
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
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="c_password" class="form-label mb-0">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control rounded-start-3 border p-2" id="c_password" name="c_password" placeholder="••••••••" required>
                                <button type="button" class="btn btn-outline-secondary rounded-end-3 toggle-password p-2 border" data-target="c_password">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Privacy Policy -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="register-privacy-policy" required>
                            <label class="form-check-label" for="register-privacy-policy">
                                I agree to <a href="#">privacy policy & terms</a>
                            </label>
                        </div>

                        <!-- Submit -->
                        <button class="btn btn-primary w-100 rounded-3" type="submit">Sign Up</button>
                    </form>
                    <p class="text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END: Content-->
@endsection
@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    .register {
        width: 400px;
    }
    .input-group > div{
        width: 80px !important;
    }
    .select2-container .select2-selection--single {
        height: 42px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 24px !important;
        padding: 10px !important;
    }
    .select2-container--default{
        width: max-content !important;
    }
    /* Improved Select2 styling */
    .select2-container--default .select2-selection--single {
        border: 1px solid #ccc !important;
        border-radius: 4px 0 0 4px !important;
    }
    .select2-container--default {
        width: 100% !important;
        max-width: 100px;
    }

    .select2-container--default .select2-selection--single {
        border: none;
        background: transparent;
        height: auto;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: inherit;
        line-height: inherit;
        padding-left: 0;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        display: none;
    }

    .select2-dropdown {
        border: 1px solid #eee;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #f0f0f0;
        color: #333;
    }

    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: #e6e6e6;
    }

    .select2-results__option {
        padding: 8px 12px;
    }

    /* Flag display styling */
    .select__flag {
        display: inline-block;
        width: 24px;
        height: 24px;
        background-size: cover;
        margin-right: 8px;
        transition: all 0.2s ease;
    }

    .select_country:hover .select__flag {
        transform: scale(1.1);
    }
    
</style>

@endpush
@push('script')
<script>
    
    $(document).ready(function() {
        let storedCountryId = localStorage.getItem('selected_country_id');

        if (storedCountryId) {
            $("#phone-flag option").each(function() {
                if ($(this).data("id") == storedCountryId) {
                    $(this).prop("selected", true);
                }
            });
        }

        // Initialize Select2 after setting the value
        $('#phone-flag').select2();
    });


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