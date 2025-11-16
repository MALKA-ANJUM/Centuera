<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from centuera.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 10:39:14 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Link of CSS files -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/remixicon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/responsive.css')}}">
    {{-- toaster --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description', '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <link rel="icon" type="image/png" href="{{ asset('frontend-assets/img/all-img/favicon.png')}}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link href="{{ asset('frontend-assets/css/remixicon.css') }}" rel="stylesheet">

    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .fi {
            position: relative;
            display: inline-block;
            width: 2rem !important;
            height: 24px !important;
        }

        .footer-widget-info .footer-widget .contact-item {
            margin-bottom: 10px !important;
        }

        .popup-bg {
            background-image: url(../frontend-assets/img/all-img/coupon-1.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        #welcomeModal .select2-container .select2-selection--single {
            height: 38px;
            border: none;
            border-bottom: 1px solid #aaa;
            border-radius: 0px;
        }

        #welcomeModal .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 34px !important;
        }

        .mega-menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 1000px;
            /* Increased width for third column */
            background: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            display: flex;
            border-radius: 6px;
            overflow: hidden;
            z-index: 999;
        }

        /* Left Panel - Categories */
        .categories-list {
            width: 30%;
            /* Adjusted for 3-column layout */
            background: #f9f9f9;
            max-height: 400px;
            overflow-y: auto;
            border-right: 1px solid #ddd;
        }

        .category-item {
            padding: 12px 15px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .category-item:hover,
        .category-item.active {
            background: #007bff;
            color: #fff;
        }

        /* Middle Panel - Courses */
        .courses-list {
            width: 40%;
            /* Adjusted for 3-column layout */
            padding: 15px;
            max-height: 400px;
            overflow-y: auto;
            border-right: 1px solid #ddd;
        }

        .courses-content ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .courses-content ul li {
            margin-bottom: 8px;
        }

        .courses-content ul li a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .courses-content ul li a:hover {
            color: #007bff;
        }

        /* Right Panel - Accreditation */
        .accreditation-list {
            width: 30%;
            /* New column */
            padding: 15px;
            max-height: 400px;
            overflow-y: auto;
            background: #fafafa;
        }

        .accreditation-content img {
            display: block;
            margin-bottom: 5px;
            margin-right: 10px;
            width: 15%;
            object-fit: contain;
            height: auto;
        }

        /* Dropdown Show/Hide */
        .mega-dropdown .mega-menu {
            display: none;
        }

        .mega-dropdown:hover .mega-menu {
            display: flex;
        }

        .mega-dropdown .list-unstyle li {
            display: block !important;
        }
        .deal-header {
            background: #F9F7FA; /* Light orange/beige */
            font-size: 16px;
            font-weight: 600;
            color: #000;
            border-bottom: 1px solid #ddd;
        }
        .deal-text i {
            font-size: 14px;
        }
        
        .payment-gateway img {
            padding: 4px;
            width: 27%;
            padding-left: 0px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('flag-icons-main/css/flag-icons.min.css')}}" rel="stylesheet">
    @stack('style')
    @stack('modal')
</head>

<body>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mx-auto" style="width: 660px; max-width: 80%">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-6 d-none d-md-block popup-bg">
                        <div class=" ">
                            <p class="text-black fs-5 fw-semibold position-relative lh-base mb-0 pt-4 text-center">
                                Your Growth Journey Starts with <br>
                                <span style="color:#FF4500; font-weight: bold;">
                                    30% Savings &amp;
                                    <span class="position-relative d-inline-block">
                                        Free Courses!
                                        <img src="https://www.simpliaxis.com/frontend_assets/image/re-1.png" data-src="https://www.simpliaxis.com/frontend_assets/image/re-1.png" alt="underline" class="position-absolute start-0 bottom-0 w-100 d-lg-block d-none" style="height:5px;">
                                    </span>
                                </span>
                            </p>

                            <p class="text-dark fs-6 mb-0 text-center m-5">
                                Unlock free self-learning courses and <br>
                                accelerate your success.
                            </p>
                            <img class=" " src="{{ asset('frontend-assets/img/all-img/savings-image.png')}}" width="347" height="316" alt="coupon">
                        </div>
                    </div>
                    @php
                    $countryID = Session::get('selected_country_id');
                    $countries = App\Models\Country::get();
                    $courses = App\Models\Course::get();
                    @endphp
                    <div class="col-md-6 bg-white p-4">
                        <form action="{{ route('request.callback') }}" method="post">
                            @csrf
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="fw-bold text-center" id="contactUsModalLabel">Get a Quote</h4>
                            <p class="small text-muted mb-3">Fill in the details to get a callback from our team</p>

                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="First Name *" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email *" required>
                            </div>
                            <div class="mb-3">
                                <select name="course_id" class="form-control select2" required>
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <select name="country_code" class="form-select select2" required>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->phonecode }}"
                                        {{ $country->id == $countryID ? 'selected' : '' }}>
                                        +{{ $country->phonecode }}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number *" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                                <label class="form-check-label small" for="privacyPolicy">
                                    By providing your contact details, you agree to our
                                    <a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a>.
                                </label>
                            </div>
                            <button class="btn btn-primary w-100 fw-bold" type="submit">
                                Enquire Now
                                <i class="fa fa-spinner fa-spin ms-2" id="submitSpin" style="display:none;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $generalSetting = App\Models\Generalsettings::first();
        $stealDeal = $generalSetting->steal_the_deal;
    @endphp

    @if(!empty($stealDeal))
        <div class="deal-header text-center py-2">
            <div class="container">
                <div class="deal-text d-flex justify-content-center align-items-center flex-wrap gap-4">
                    <p class="mb-0"><img src="{{ asset('frontend-assets/img/all-img/upskill-logo.png') }}" alt="" width="27px"> 30% Savings on Standard Course Fees</p>
                    <p class="mb-0"><i class="fas fa-calendar-alt" style="color: #f0a601"></i> Enroll by 25th September</p>
                    <p class="mb-0"><i class="fas fa-lock" style="color: #f0a601"></i> Unlock FREE Self-Learning Courses</p>
                </div>
            </div>
        </div>
    @endif
    <div class="navbar-area" id="navbar">
        <div class="navbar-top">
            <div class="container" style="width: 100%;">
                <div class="">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-sm-6 col-lg-7 col-md-6 p-0">
                            <ul class="navbar-contact d-lg-flex align-items-lg-center list-unstyle">
                                <li>
                                    <a class="navbar-brand xs-none" href="{{ route('index') }}">
                                        <img class="logo-light" src="{{ asset('frontend-assets/img/logo/logo.png')}}" alt="logo"
                                            style="height: 70px; width: 200px;">
                                    </a>
                                </li>
                                @php
                                $categories = App\Models\Category::with(['getCourses'])->where('features', 1)->get();
                                @endphp
                                @if($categories->count() > 0)
                                <li class="nav-item dropdown mega-dropdown">
                                    <div class="dropdown">
                                        <button class="dropbtn btn btn-primary d-flex align-items-center gap-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                <circle cx="4" cy="4" r="2" />
                                                <circle cx="12" cy="4" r="2" />
                                                <circle cx="20" cy="4" r="2" />
                                                <circle cx="4" cy="12" r="2" />
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="20" cy="12" r="2" />
                                                <circle cx="4" cy="20" r="2" />
                                                <circle cx="12" cy="20" r="2" />
                                                <circle cx="20" cy="20" r="2" />
                                            </svg>
                                            All Courses
                                        </button>

                                        <div class="mega-menu">
                                            <!-- Left Side (Categories) -->
                                            <div class="categories-list">
                                                @foreach($categories as $index => $category)
                                                <div class="category-item {{ $index === 0 ? 'active' : '' }}" data-category="cat-{{ $category->id }}">
                                                    {{ $category->name }}
                                                </div>
                                                @endforeach
                                            </div>

                                            <!-- Middle Side (Courses) -->
                                            <div class="courses-list">
                                                @foreach($categories as $index => $category)
                                                <div class="courses-content" id="cat-{{ $category->id }}" style="{{ $index !== 0 ? 'display:none;' : '' }}">
                                                    <div class="d-flex justify-content-between mb-3 border-bottom">
                                                        <h6>{{ $category->name }} ({{ $category->getCourses->count() }} Courses)</h6>
                                                        <a href="{{ route('course.list', ['category' => $category->id]) }}">View All</a>
                                                    </div>

                                                    @if($category->getCourses->count() > 0)
                                                    <ul>
                                                        @foreach($category->getCourses as $course)
                                                        <li class="d-flex justify-content-start align-items-start">
                                                            <img src="{{ asset('uploads/logo/'.$course->logo) }}" class="me-2" alt="" width="40px">
                                                            <a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @else
                                                    <p>No courses available</p>
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>

                                            <!-- Right Side (Accreditation Bodies) -->
                                            <div class="accreditation-list">
                                                @foreach($categories as $index => $category)
                                                @php
                                                $accreditations = json_decode($category->accreditation_bodies, true) ?? [];
                                                @endphp
                                                <div class="accreditation-content" id="acc-{{ $category->id }}" style="{{ $index !== 0 ? 'display:none;' : '' }}">
                                                    <h6 class="mb-2">Accreditation Bodies</h6>
                                                    @forelse($accreditations as $acc)
                                                    <div class="mb-4 d-flex align-items-center">
                                                        <img src="{{ asset('admin/accreditation_images/' . $acc['image']) }}" alt="{{ $acc['name'] }}" width="40px">
                                                        <p class="mb-0 lh-1">{{ $acc['name'] }}</p>
                                                    </div>
                                                    @empty
                                                    <p>No accreditation available</p>
                                                    @endforelse
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif

                                <li class="nav-item dropdown">
                                    <div class="dropdown rounded overflow-hidden">
                                        <input type="text" placeholder="What do you want to learn?" class="search-input" id="searchCourse" autocomplete="off">
                                        <i class="ri-search-2-line"></i>
                                        <div class="dropdown-content">
                                            <div class="dropdown-item" id="courseDropdown">
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="col-xl-1 col-sm-1 col-lg-1 col-md-2 mt-2">
                            @auth
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hi, {{ auth()->user()->first_name }}
                                </button>
                                <ul class="dropdown-menu list-unstyle" aria-labelledby="userMenu">
                                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.dashboard', ['tab' => 'password']) }}">
                                            Update Password
                                        </a>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                                </ul>
                            </div>
                            @endauth

                            @guest
                            <a href="{{ route('login') }}" class="btn btn-primary" style="width: 130px">Login</a>
                            @endguest
                        </div>
                        <div class="col-xl-4 col-sm-5 col-lg-4 col-md-4">
                            <div class="navbar-right d-flex align-items-center justify-content-lg-end">
                                <span class="fs-16 fc-main">Follow Us:</span>
                                <div class="option-item">
                                    <ul class="social-profile list-unstyle position-relative">
                                        <li><a href="https://www.facebook.com/people/Centuera/61559120999420/"
                                                target="_blank"><i class="ri-facebook-fill"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/centuera-americas-llc/?viewAsMember=true"
                                                target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank"><i
                                                    class="ri-instagram-line"></i></a></li>
                                        <li><a href="https://www.twitter.com/" target="_blank"><i
                                                    class="ri-twitter-fill"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="">
                <nav class="navbar insocour-nav navbar-expand-lg p-0">
                    <a class="navbar-brand lg-none" href="{{ route('index') }}">
                        <img class="logo-light" src="{{ asset('frontend-assets/img/logo/logo.png')}}" alt="logo"
                            style="height: 50px; width: 140px;">
                    </a>
                    <div class="other-options d-flex flex-wrap justify-content-end align-items-center d-lg-none">
                        <div class="option-item d-flex">
                            <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button"
                                aria-controls="navbarOffcanvas">
                                <span class="burger-menu">
                                    <span class="top-bar"></span>
                                    <span class="middle-bar"></span>
                                    <span class="bottom-bar"></span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse align-items-center justify-content-between">
                        <div class="menu-list">
                            <ul class="navbar-nav ms-1">
                                <li class="nav-item">
                                    <a href="{{ route('index') }}" class="nav-link">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about') }}" class="nav-link">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('course.list') }}" class="nav-link">
                                        Courses
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('blog') }}" class="nav-link">
                                        Blogs
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar Area End -->

    <!-- Responsive Navbar Start -->
    <div class="responsive-navbar offcanvas offcanvas-end border-0" data-bs-backdrop="static" tabindex="-1"
        id="navbarOffcanvas">
        <div class="offcanvas-header">
            <a href="index-2.html" class="logo d-inline-block">
                <img class="logo-light" src="{{ asset('frontend-assets/img/logo/logo.png')}}" alt="Image">
            </a>
            <button type="button" class="close-btn bg-transparent position-relative lh-1 p-0 border-0"
                data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="ri-close-line"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <ul class="responsive-menu">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('course.list') }}">Courses</a></li>
                <li><a href="{{ route('blog') }}">Blogs</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                <p class="text-center">Hi, {{ auth()->user()->first_name }}</p>
                @endauth
                @guest
                <li><a href="{{ route('login') }}" class="btn btn-primary text-white font-bold">Login</a></li>
                @endguest
            </ul>
        </div>
    </div>
    <!-- Responsive Navbar End -->

 