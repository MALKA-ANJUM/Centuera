@extends('user.layouts.layout')
@section('title', 'Courses')
@section('content')

<!-- Responsive Navbar Start -->
<div class="responsive-navbar offcanvas offcanvas-end border-0" data-bs-backdrop="static" tabindex="-1"
    id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="index-3.html" class="logo d-inline-block">
            <img class="logo-light" src="layout/img/logo/logo.png" alt="Image">
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
        </ul>
    </div>
</div>
<!-- Responsive Navbar End -->
<!--  Page Title Area Start-->
<section class="page-title-area position-relative">
    <div class="container">
        <div class="main-max-width">
            <div class="page-title-content">
                <h2>Courses</h2>
                <ul class="page-breadcrumb align-items-center list-unstyle">
                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb-item"></li>
                    <li class="primery-link">Courses</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--  Page Title Area End-->

<!-- Courses Section Start -->
<div class="courses-section ptb-100">
    <div class="container">
        <div class="main-max-width">

            <div class="row mt-4">
                <div class="col-lg-4">
                    <aside class="course-sidebar-widgets">
                        <div class="widget widget-catgory widget-search">
                            <form class="search-form">
                                <label>
                                    <input type="search" class="search-field" placeholder="Search...">
                                </label>
                                <button class="widget-search-btn" type="submit"><i
                                        class="ri-search-line"></i></button>
                            </form>

                            <div class="accordion" id="widget-collps">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button widget-title" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                            Categories
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="widget-collapse collapse show"
                                        data-bs-parent="#widget-collps">
                                        <div class="widget-collps-body">
                                            <ul>
                                                <li><a href="#">
                                                        <p>Project Management</p> <span>(15)</span>
                                                    </a></li>
                                                <li><a href="#">
                                                        <p>Quality management</p> <span>(20)</span>
                                                    </a></li>
                                                <li><a href="#">
                                                        <p>Agile & Scrum</p> <span>(10)</span>
                                                    </a></li>
                                                <li><a href="#">
                                                        <p>Digital Marketing</p> <span>(20)</span>
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-checkbox">
                            <div class="accordion" id="widget-collps-two">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button widget-title" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                            Level
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="widget-collapse collapse show"
                                        data-bs-parent="#widget-collps-two">
                                        <div class="widget-collps-body">
                                            <div class="form-check edu-check">
                                                <input class="form-check-input edu-check-input" type="checkbox"
                                                    value="" id="defaultCheck2">
                                                <label class="form-check-label edu-check-label" for="defaultCheck2">
                                                    Beginner
                                                </label>
                                            </div>
                                            <div class="form-check edu-check">
                                                <input class="form-check-input edu-check-input" type="checkbox"
                                                    value="" id="defaultCheck3">
                                                <label class="form-check-label edu-check-label" for="defaultCheck3">
                                                    Advanced
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-rating">
                            <div class="accordion" id="widget-collps-three">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button widget-title" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                            Rating
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="widget-collapse collapse show"
                                        data-bs-parent="#widget-collps-three">
                                        <div class="widget-collps-body">
                                            <div class="form-check edu-check">
                                                <input class="form-check-input edu-check-input" type="checkbox"
                                                    value="" id="defaultCheck4">
                                                <label class="form-check-label edu-check-label" for="defaultCheck4">
                                                    <span><i class="ri-star-fill"></i></span> 5 Star
                                                </label>
                                            </div>
                                            <div class="form-check edu-check">
                                                <input class="form-check-input edu-check-input" type="checkbox"
                                                    value="" id="defaultCheck5">
                                                <label class="form-check-label edu-check-label" for="defaultCheck5">
                                                    <span><i class="ri-star-fill"></i></span> 4 Star or adobe
                                                </label>
                                            </div>
                                            <div class="form-check edu-check">
                                                <input class="form-check-input edu-check-input" type="checkbox"
                                                    value="" id="defaultCheck6">
                                                <label class="form-check-label edu-check-label" for="defaultCheck6">
                                                    <span><i class="ri-star-fill"></i></span> 3 Star or adobe
                                                </label>
                                            </div>
                                            <div class="form-check edu-check">
                                                <input class="form-check-input edu-check-input" type="checkbox"
                                                    value="" id="defaultCheck7">
                                                <label class="form-check-label edu-check-label" for="defaultCheck7">
                                                    <span><i class="ri-star-fill"></i></span> 2 Star or adobe
                                                </label>
                                            </div>
                                            <div class="form-check edu-check">
                                                <input class="form-check-input edu-check-input" type="checkbox"
                                                    value="" id="defaultCheck8">
                                                <label class="form-check-label edu-check-label" for="defaultCheck8">
                                                    <span><i class="ri-star-fill"></i></span> 1 Star or adobe
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget filter-widget">
                            <h3 class="widget-title">Price Filter</h3>
                            <div class="filter-info">
                                <div class="filter-bar">
                                    <div class="price-range-slider">
                                        <div id="slider-range" class="range-bar"></div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="range-value mb-0 d-flex align-items-center">
                                                <input type="text" id="amount" readonly>
                                            </p>
                                            <a class="btn-filter" href="courses">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-tag-cloud">
                            <div class="accordion" id="widget-collps-four">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button widget-title" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                            Popular Tags
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="widget-collapse collapse show"
                                        data-bs-parent="#widget-collps-four">
                                        <div class="widget-collps-body">
                                            <div class="tagcloud">
                                                <a href="#">Business</a>
                                                <a href="#">Course</a>
                                                <a href="#">Consulting</a>
                                                <a href="#">Online</a>
                                                <a href="#">Remote</a>
                                                <a href="#">Solution</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($courses as $course)
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-courses-box mb-25 box-shadow-2">
                                <div class="image mb-20 position-relative">
                                    <a href="{{ route('course.details', $course->slug) }}">
                                        <img src="{{ asset('uploads/courses/'. $course->image) }}" alt="image">
                                    </a>

                                    <div class="cr-tag">
                                        <a href="{{ $course->getCategory->name ?? '' }}">{{ $course->getCategory->name ?? '' }}</a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-1 fs-20"><a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a></h3>

                                        <div class="cr-price px-2">
                                            <h5 class="fs-16 text-nowrap"><span class="price">{{ $course->getCourseSchedule && $course->getCourseSchedule->prices?->country_id == 0 || $course->getCourseSchedule == null ? 'USD ' : $currency }}  {{ $course->getCourseSchedule->prices->discount_price ?? 0 }}</span> 
                                            @if($course->getCourseSchedule && $course->getCourseSchedule->prices)
                                            <br>
                                                <span class="old-price">
                                                    {{ $course->getCourseSchedule && $course->getCourseSchedule->prices?->country_id == 0 || $course->getCourseSchedule == null ? 'USD ' : $currency }}  {{ $course->getCourseSchedule->prices->original_price }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-between align-items-center rating-section">
                                    @php
                                        $rating = round($course->rating);
                                        $maxStars = 5;
                                    @endphp

                                    <ul class="d-flex list-unstyle customer-ratings">
                                        @for ($i = 1; $i <= $maxStars; $i++)
                                            @if ($i <= $rating)
                                                <li><i class="ri-star-fill"></i></li>
                                            @else
                                                <li><i class="ri-star-line"></i></li>
                                            @endif
                                        @endfor
                                        <li><span>({{ $course->rating }})</span></li>
                                    </ul>
                                    <ul
                                        class="cr-items d-flex align-items-center justify-content-center gap-2 list-unstyle">
                                        <li class="mr-15"><i class="ri-team-fill"></i> <span>{{ number_format(($course->learner_field ?? 0) + 10000) }} Learners</span> </li>
                                        <li><i class="ri-time-line"></i> <span>{{ round($course->duration/60, 2) }} Hrs</span></li>
                                    </ul>
                                </div>
                                <div class="curriculum-certificate">
                                <a href="{{ route('course.details', $course->slug) }}" class="view-certification">
                                    View Program
                                </a>
                                @if($course->upload_curriculum != null)
                                <a href="{{ asset('uploads/curriculum/'. $course->upload_curriculum ) }}" target="_blank">
                                    <button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                                @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if ($courses->count() > 0)
                <ul class="page-nav list-style text-end p-0 mt-40">
                    @if ($courses->onFirstPage())
                        <li><span><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></span></li>
                    @else
                        <li><a href="{{ $courses->previousPageUrl() }}"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></a></li>
                    @endif

                    @for ($i = 1; $i <= $courses->lastPage(); $i++)
                        <li>
                            <a class="{{ $courses->currentPage() == $i ? 'active' : '' }}"
                            href="{{ $courses->url($i) }}">
                            {{ $i }}
                            </a>
                        </li>
                    @endfor

                    @if ($courses->hasMorePages())
                        <li><a href="{{ $courses->nextPageUrl() }}"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></a></li>
                    @else
                        <li><span><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></span></li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</div>
<!-- Courses Section End -->


@endsection