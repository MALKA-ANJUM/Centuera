@extends('user.layouts.layout')
@section('title', 'Dashboard')
@section('content')

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Register basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <form class="auth-register-form mt-2" action="{{ route('user.register.details.submit') }}" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="john" aria-describedby="first_name" tabindex="1" autofocus required />
                                    </div>
                                    <div class="mb-1">
                                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="doe" aria-describedby="last_name" tabindex="2" autofocus required />
                                    </div>
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="john@example.com" aria-describedby="email" tabindex="3" required />
                                    </div>

                                    <div class="mb-1">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" tabindex="4" required />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <label for="c_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="c_password" name="c_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="c_password" tabindex="5" required />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="register-privacy-policy" tabindex="4" required />
                                            <label class="form-check-label" for="register-privacy-policy">
                                                I agree to <a href="#">privacy policy & terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="5">Sign up</button>
                                </form>

                                <p class="text-center">
                                    <span>Already have an account?</span>
                                    <a href="{{ route('login') }}">
                                        <span>Sign in instead</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Register basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
</body>
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/authentication.css') }}">
<!-- END: Page CSS-->
@endpush
@push('script')
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/pages/auth-register.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endpush