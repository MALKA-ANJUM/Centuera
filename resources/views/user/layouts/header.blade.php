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
    </style>
    <link href="{{asset('flag-icons-main/css/flag-icons.min.css')}}" rel="stylesheet">
    @stack('style')
    @stack('modal')
</head>

<body>
    <div class="navbar-area" id="navbar">
        <div class="navbar-top">
            <div class="container" style="width: 100%;">
                <div class="main-max-width">
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
                                $categories = App\Models\Category::with('getCourses')->where('features', 1)->latest()->take(6)->get();
                                @endphp
                                @if($categories->count() > 0)
                                <li class="nav-item dropdown">
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
                                        <div class="dropdown-content">
                                            @foreach($categories as $category)
                                            <div class="dropdown-item">
                                                <a class="dropdown-link" href="#">{{ $category->name }}</a>
                                                @if($category->getCourses->count() > 0)
                                                <div class="dropdown-submenu">
                                                    @foreach($category->getCourses as $course)
                                                    <a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                @endif

                                <li class="nav-item dropdown">
                                    <div class="dropdown">
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
                            <a href="{{ route('login') }}" class="btn btn-primary w-max-content">Login</a>
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
            <div class="main-max-width">
                <nav class="navbar insocour-nav navbar-expand-lg">
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
                <li><a href="index-2.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="courses.html">Courses</a></li>
                <li><a href="blog.html">Blogs</a></li>
                <li><a href="contact.html">Contact</a></li>
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