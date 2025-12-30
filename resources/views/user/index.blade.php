@extends('user.layouts.layout')
@section('title', 'Centuera: World\'s Leading Training Provider for Professionals')
@section('content')
<!-- BEGIN: Content-->
<!-- Hero Section Start -->
<div class="hero-section hero-bg position-relative">
    <div class="container">
        <div class="main-max-width">
            <div class="hero-slider owl-carousel owl-theme">
                @foreach ($banners as $banner)
                <div class="silde-item pt-5">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="content">
                                <h4 class="sub-title mb-4">{{ strip_tags($banner->short_title) }}</h4>
                                <h1 class="fs-50 mb-25">{{ strip_tags($banner->title) }}</h1>
                                <p>{{ strip_tags($banner->description) }}</p>

                                <div class="her-btns mt-40">
                                    <a href="{{ route('course.list') }}" class="btn style-one mr-20">
                                        Browse Course
                                        <img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image">
                                    </a>
                                    <a href="{{ route('about') }}" class="btn style-two">
                                        Explore More
                                        <img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-image position-relative">
                                <img class="position-relative index-2"
                                    src="{{ asset('admin/banner_img/' . $banner->image) }}"
                                    alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Hero Section End -->
<!-- Scrolling Banner Section start -->
<div class="logo-banner">
    <div class="logo-text">
        <h4>Collaborating with the Leading Governing Bodies</h4>
    </div>

    <div class="logo-track-wrapper">
        <div class="logo-track">
            <div class="logo-track-inner">
                <!-- Your logos -->
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/ATP-badge-1x1.png') }}" alt="ATP-badge"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/AWS-partner.jpg') }}" alt="AWS-partner"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/CompTIA.png') }}" alt="CompTIA"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/devops-partner.jpg') }}" alt="devops-partner"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/EC%20Council.png') }}" alt="ec council"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/hqdefault.jpg') }}" alt="hqdefault"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/IASSC-Certification-Badge-250x250.png') }}"
                        alt="IASSC-Certification-Badge">
                </div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/IIBA.png') }}" alt="IIBA"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/ISACA_logo.png') }}" alt="ISACA"></div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/REA%20scrum%20alliance.png') }}" alt="rea scrum alliance">
                </div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/SAI_Partner_Badge_Gold.jpg') }}" alt="SAI_Partner">
                </div>
                <div class="logo-img"><img src="{{ asset('frontend-assets/img/banner/Scrumorg-PTN_1000x1000.png') }}" alt="Scrumorg-PTN">
                </div>
                <div class="logo-img"><img
                        src="{{ asset('frontend-assets/img/banner/twitter_thumb_201604_global_training_partner_600x600.png') }}"
                        alt="twitter"></div>
            </div>
        </div>
    </div>
</div>


<!-- Scrolling Banner Section start -->

<!-- Category Section Start -->
@if($categories->count() > 0)
<div class="category-section pb-5">
    <div class="container">
        <div class="main-max-width">
            <div class="section-title mb-3">
                <div class="row">
                    <div class="col-lg-7 col-sm-7">
                        <div class="content">
                            <h4 class="sub-title mb-4"># Browse Category</h4>
                            <h2 class="mb-0 fs-35">Top Courses Categories</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-4 col-sm-6">
                    <a href="{{ route('course.list', ['category' => $category->id]) }}">
                    <div class="cetg-card d-flex align-items-center position-relative mb-25 box-shadow-2">
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/catg-icon-1.svg') }}" alt="icon">
                        </div>
                        <div class="text">
                            <h4 class="fs-16">{{ $category->name }}</h4>
                            <p class="m-0 fs-15">{{ $category->getCourses->count() }} Courses <img src="{{ asset('frontend-assets/img/icon/long-arrow-2.svg') }}" alt="Image">
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!-- Category Section End -->

<!-- About Section Start -->
<div class="about-section pb-5" id="about-sec">
    <div class="container">
        <div class="main-max-width">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <h4 class="sub-title mb-4"># About Us</h4>
                        <h2 class="mb-50 fs-35">Why Will You Choose Our?</h2>
                        <p class="mb-30">Delve into Centuera guided by industry experts and seasoned professionals.
                            Our carefully curated curriculum is Designed to impart not just theoretical knowledge
                            but practical insights gained from real-world experience.</p>
                        <p class="mb-30">Learn by doing. Our course emphasizes hands-on projects, case studies, and
                            interactive sessions to ensure you can apply your newfound knowledge directly to
                            real-world scenarios.</p>
                    </div>
                    <div class="about-meta d-flex align-items-center mt-40">
                        <div class="about-btn mr-20">
                            <a href="{{ route('about') }}" class="btn style-one box-shadow-1">About More<img
                                    src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                        </div>
                        <div class="info">
                            <div class="d-flex align-items-center">
                                <h5 class="count">16</h5>
                                <h5>+</h5>
                            </div>
                            <h5>Years Of Experiences</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-wrapper">

                        <div class="card about-card active" id="my-element1">
                            <h4 class="heading">Learn From The Experts</h4>
                            <div class="description">
                                <div class="icon"><img src="{{ asset('frontend-assets/img/icon/about-icon.svg') }}" alt="icon"></div>
                                <h4>Learn From The Experts</h4>
                                <p>Continuous learning keeps you ahead and informed in evolving fields.</p>

                                <!-------
                                    <a class="btn" href="about">Read More <img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}"
                                            alt="Image"></a>----->
                            </div>
                        </div>

                        <div class="card about-card" id="my-element2">
                            <h4 class="heading">Seven Easy Rules Of Education</h4>
                            <div class="description">
                                <div class="icon"><img src="{{ asset('frontend-assets/img/icon/about-icon.svg') }}" alt="icon"></div>
                                <h4>Seven Easy Rules Of Education</h4>
                                <p>Stay curious and committed to learning for a brighter future.</p>
                                <!---------
                                    <a class="btn" href="about">Read More <img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}"
                                            alt="Image"></a>--->
                            </div>
                        </div>
                        <div class="card about-card" id="my-element3">
                            <h4 class="heading">Explore our Beliefs</h4>
                            <div class="description">
                                <div class="icon"><img src="{{ asset('frontend-assets/img/icon/about-icon.svg') }}" alt="icon"></div>
                                <h4>Explore our Beliefs</h4>
                                <p>Knowledge grows rapidly, so keep learning and stay well-informed always.</p>
                                <!-------
                                    <a class="btn" href="about">Read More <img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}"
                                            alt="Image"></a>----->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Course Section Start -->
@if(count($courses) > 0)
<div class="course-section pb-5" id="course-sec">
    <div class="container">
        <div class="main-max-width">
            <div class="section-title mb-3 position-relative">
                <h4 class="sub-title mb-4"># Our Courses List</h4>
                <h2 class="fs-35">Broad Selection Of Course</h2>
            </div>
            <div id="mix-wrapper" class="course-mix-wrapper">
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-lg-4 col-sm-6 mix-target Business Design">
                        <div class="single-courses-box mb-25 box-shadow-2">
                            <div class="image mb-20 position-relative">
                                <a href="{{ route('course.details', $course->slug) }}">
                                    <img src="{{ asset('uploads/courses/'. $course->image) }}" alt="image">
                                </a>

                                <div class="cr-tag">
                                    <a href="{{ route('course.details', $course->slug) }}">{{ $course->getCategory->name ?? '' }}</a>
                                </div>
                            </div>
                            <div class="content">
                                <h5 class="mb-0">{{ $course->title }}</h5>
                                @if($course->getCourseSchedule && $course->getCourseSchedule->prices)
                                <div class="meta-info d-flex align-items-center justify-content-between">
                                    <h3 class="mb-1 fs-20"><a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a></h3>
                                    <div class="cr-price px-2">
                                        <h5 class="fs-16 text-nowrap"><span class="price"> {{ $course->getCourseSchedule->country->currency }} {{ $course->getCourseSchedule->prices->discount_price ?? 0 }}</span>
                                            <br>
                                            @if($course->getCourseSchedule && $course->getCourseSchedule)
                                            <span class="old-price">
                                                {{ $course->getCourseSchedule->country->currency }} {{ $course->getCourseSchedule->prices->original_price ?? 0 }}
                                            </span>
                                            @endif

                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center align-items-center rating-section">
                                @php
                                $rating = round($course->average_rating); // uses accessor
                                $maxStars = 5;
                                @endphp

                                <ul class="d-flex list-unstyle customer-ratings">
                                    @for ($i = 1; $i <= $maxStars; $i++)
                                        @if ($i <=$rating)
                                        <li><i class="ri-star-fill"></i></li>
                                        @else
                                        <li><i class="ri-star-line"></i></li>
                                        @endif
                                        @endfor
                                        <li><span>({{ number_format($course->average_rating, 1) }})</span></li>
                                </ul>

                                <ul
                                    class="cr-items d-flex align-items-center justify-content-center gap-2 list-unstyle">
                                    <li class="mr-15"><i class="ri-team-fill"></i>
                                        <span>
                                            {{ ($course->learner_field + $course->getRating->count()) }} Learners
                                        </span>
                                    </li>
                                    <li><i class="ri-time-line"></i> <span>{{ round($course->duration / 60 , 2)  }} Hrs</span></li>
                                </ul>
                            </div>
                            <div class="curriculum-certificate">
                                <a href="{{ route('course.details', $course->slug) }}" class="view-certification">
                                    View Program
                                </a>
                                @if($course->upload_curriculum != null)
                                    <button class="view-curiculum" data-bs-toggle="modal" data-course-id="{{ $course->id }}" data-bs-target="#curriculumModal"><i class="ri-download-line"></i><span>Curriculum</span></button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-5 col-sm-5">
                    <div class="section-btn">
                        <a href="{{ route('course.list') }}" class="btn style-one box-shadow-1">View All <img
                                src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Course Section End -->
<!-- scroll logo section start -->
<div class="company-logo-section">
    <div class="logo-text">
        <h4>Trusted by Digital Leaders and Practitioners from 100+ Fortune 500 Companies</h4>
    </div>
    <!-- Row 1: Scroll Left to Right -->
    <div class="logo-scroll-row row-one">
        <div class="logo-scroll-track">
            <div class="logo-scroll-track-inner">
                <!-- Replace with your logos -->
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/kpmg.png') }}" alt="kpmg"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/hp.png') }}" alt="hp"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/ATT-logo-1.png') }}" alt="ATT-logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Bosch-logo.svg.png') }}" alt="Bosch-logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/fedEx.png') }}" alt="fedEx"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/cisco.png') }}" alt="cisco"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Cognizant_logo_2022.svg.png') }}"
                        alt="Cognizant_logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Daimler-Logo-Background-PNG-Image.png') }}"
                        alt="Daimler-Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Dell_Logo.png') }}" alt="Dell_Logo"></div>
                <div class="company-logo-box"><img
                        src="{{ asset('frontend-assets/img/banner/deloitte-logo_brandlogos.net_d1uq0-512x512.png') }}" alt="deloitte-logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/tcs.png') }}" alt="tcs"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/EY_logo_2019.svg.png') }}" alt="EY_logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/hackerrank.png') }}" alt="hackerrank"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Hexaware_Technologies-Logo.wine.png') }}"
                        alt="Hexaware_Technologies-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Honeywell-Logo.png') }}" alt="Honeywell-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/intel.png') }}" alt="intel"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/apple.png') }}" alt="apple"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/regal.png') }}" alt="regal"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/ibm.png') }}" alt="ibm"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/ust%20global.png') }}" alt="ust global"></div>
                <!-- duplicate  -->
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/kpmg.png') }}" alt="kpmg"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/hp.png') }}" alt="hp"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/ATT-logo-1.png') }}" alt="ATT-logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Bosch-logo.svg.png') }}" alt="Bosch-logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/fedEx.png') }}" alt="fedEx"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/cisco.png') }}" alt="cisco"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Cognizant_logo_2022.svg.png') }}"
                        alt="Cognizant_logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Daimler-Logo-Background-PNG-Image.png') }}"
                        alt="Daimler-Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Dell_Logo.png') }}" alt="Dell_Logo"></div>
                <div class="company-logo-box"><img
                        src="{{ asset('frontend-assets/img/banner/deloitte-logo_brandlogos.net_d1uq0-512x512.png') }}" alt="deloitte-logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/tcs.png') }}" alt="tcs"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/EY_logo_2019.svg.png') }}" alt="EY_logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/hackerrank.png') }}" alt="hackerrank"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Hexaware_Technologies-Logo.wine.png') }}"
                        alt="Hexaware_Technologies-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Honeywell-Logo.png') }}" alt="Honeywell-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/intel.png') }}" alt="intel"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/apple.png') }}" alt="apple"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/regal.png') }}" alt="regal"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/ibm.png') }}" alt="ibm"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/ust%20global.png') }}" alt="ust global"></div>
            </div>
        </div>
    </div>

    <!-- Row 2: Scroll Right to Left -->
    <div class="logo-scroll-row row-two">
        <div class="logo-scroll-track">
            <div class="logo-scroll-track-inner">
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Infosys_logo.svg.png') }}"
                        alt="Infosys_logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/L%26T_Infotech_logo.jpg') }}"
                        alt="L&T_Infotech_logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Microsoft-Logo.png') }}" alt="Microsoft-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/MPHASIS.NS_BIG-96e12b36.png') }}"
                        alt="MPHASIS">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/nvidia-logo-brandlogos.net_-512x512.png') }}"
                        alt="nvidia-logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Oracle-Logo.jpg') }}" alt="Oracle-Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/micro-focus.jpg') }}" alt="micro-focus"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Quess_Logo.png') }}" alt="Quess_Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Resideo_Logo.png') }}" alt="Resideo_Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Schneider-Electric-Logo.jpg') }}"
                        alt="Schneider-Electric-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Standard_Chartered_(2021).svg.png') }}"
                        alt="Standard_Chartered"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Tata-Logo-1988.png') }}" alt="Tata-Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Tech_Mahindra_New_Logo.svg.png') }}"
                        alt="Tech_Mahindra"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Thomson-Reuters-Logo.png') }}"
                        alt="Thomson-Reuters-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Viacom_Logo-3000x576.png') }}"
                        alt="Viacom_Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Vmware.svg.png') }}" alt="Vmware"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/WeWork.svg.png') }}" alt="WeWork"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Wipro_Primary_Logo_Color_RGB.svg.png') }}"
                        alt="Wipro_Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Zoho-partners-with-Redington.jpg') }}"
                        alt="Zoho-partners"></div>
                <!-- duplicate -->
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Infosys_logo.svg.png') }}"
                        alt="Infosys_logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/L%26T_Infotech_logo.jpg') }}"
                        alt="L&T_Infotech_logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Microsoft-Logo.png') }}" alt="Microsoft-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/MPHASIS.NS_BIG-96e12b36.png') }}"
                        alt="MPHASIS">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/nvidia-logo-brandlogos.net_-512x512.png') }}"
                        alt="nvidia-logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Oracle-Logo.jpg') }}" alt="Oracle-Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/micro-focus.jpg') }}" alt="micro-focus"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Quess_Logo.png') }}" alt="Quess_Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Resideo_Logo.png') }}" alt="Resideo_Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Schneider-Electric-Logo.jpg') }}"
                        alt="Schneider-Electric-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Standard_Chartered_(2021).svg.png') }}"
                        alt="Standard_Chartered"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Tata-Logo-1988.png') }}" alt="Tata-Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Tech_Mahindra_New_Logo.svg.png') }}"
                        alt="Tech_Mahindra"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Thomson-Reuters-Logo.png') }}"
                        alt="Thomson-Reuters-Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Viacom_Logo-3000x576.png') }}"
                        alt="Viacom_Logo">
                </div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Vmware.svg.png') }}" alt="Vmware"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/WeWork.svg.png') }}" alt="WeWork"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Wipro_Primary_Logo_Color_RGB.svg.png') }}"
                        alt="Wipro_Logo"></div>
                <div class="company-logo-box"><img src="{{ asset('frontend-assets/img/banner/Zoho-partners-with-Redington.jpg') }}"
                        alt="Zoho-partners"></div>
            </div>
        </div>
    </div>
</div>

<!-- scroll logo section end -->

<!-- Testimonial Section Start -->
@if(count($testimonials) > 0)
<div class="testimonial-section custom-nav pb-5">
    <div class="container">
        <div class="main-max-width">
            <div class="row">
                <div class="col-lg-5">
                    <div class="content">
                        <h4 class="sub-title mb-4"># Client’s Testimonials</h4>
                        <h2 class="mb-30 fs-35">Let's what our student says</h2>
                        <p class="mb-50">The community created within the program is supportive and collaborative.
                            I've had the opportunity to connect with fellow learners, share experiences, and even
                            collaborate on projects. It truly feels like a learning journey.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testimonial-cards owl-carousel owl-theme">
                        @foreach($testimonials as $testimonial)
                        <div class="testimonial-box">
                            <div class="info mb-25 d-flex align-items-center justify-content-between">
                                <div class="image d-flex align-items-center">
                                    <img src="{{ asset('admin/testimonials/' . $testimonial->image) }}" alt="image">
                                    <div class="content">
                                        <h5 class="fs-16">{{ $testimonial->title }}</h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                </div>
                            </div>
                            <div class="box-content">
                                <p>{!! $testimonial->description !!}</p>
                            </div>
                            <div class="ratings">
                                <ul class="d-flex list-unstyle p-0">
                                    @for($i = 0; $i < 5; $i++)
                                        <li>
                                            <i class="ri-star{{ $i < $testimonial->rating ? '-fill' : '' }}"></i>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="benefits-prev"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></div>
                    <div class="benefits-next"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Testimonial Section End -->

<!-- Video Section End -->

<!-- Score Area Start -->
<div class="score-area">
    <div class="container">
        <div class="main-max-width">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon icon-yl-clr">
                            <img src="{{ asset('frontend-assets/img/icon/counter-icon-1.svg') }}" alt="image">
                        </div>
                        <div class="content">
                            <div class="count">5440</div>
                            <p class="text-white">Happy Student</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon icon-rd-clr">
                            <img src="{{ asset('frontend-assets/img/icon/counter-icon-1.svg') }}" alt="image">
                        </div>
                        <div class="content">
                            <div class="count">350</div>
                            <p class="text-white">Good Comment</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon icon-gr-clr">
                            <img src="{{ asset('frontend-assets/img/icon/counter-icon-1.svg') }}" alt="image">
                        </div>
                        <div class="content">
                            <div class="count">2000</div>
                            <p class="text-white">Services Download</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon icon-pr-clr">
                            <img src="{{ asset('frontend-assets/img/icon/counter-icon-1.svg') }}" alt="image">
                        </div>
                        <div class="content">
                            <div class="count">50</div>
                            <p class="text-white">Best Awards</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Score Area End -->

<!-- Blog Section Start -->
@if(count($blogs) > 0)
<div class="blog-section pb-5">
    <div class="container">
        <div class="main-max-width">
            <div class="section-title mb-3">
                <div class="row">
                    <div class="col-lg-7 col-sm-7">
                        <div class="content">
                            <h4 class="sub-title mb-4"># Blog</h4>
                            <h2 class="mb-0 fs-35">Latest News & Articles</h2>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5">
                        <div class="section-btn text-end">
                            <a href="{{ route('blog') }}" class="btn style-one box-shadow-1">View All <img
                                    src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-sm-6">
                    <div class="single-blog-box">
                        <div class="image position-relative">
                            <a href="{{ route('blog.view', $blog->slug) }}">
                                <img src="{{ asset('admin/blog/'. $blog->image) }}" alt="image" style="min-height: 275px">
                            </a>
                        </div>
                        <div class="content">
                            <ul class="cr-items d-flex list-unstyle">
                                <li><i class="ri-calendar-2-line"></i><span>{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}</span></li>
                            </ul>
                            <h3 class="mb-15 fs-20">
                                <a href="{{ route('blog.view', $blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 30) }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!-- Blog Section End -->

<div class="customer-container container">
    <div class="customer-content">
        <h2>Training Solution</h2>
        <p>Our courses are developed and taught in partnership with internationally renowned universities,
            prestigious companies, and notable trade groups. They are taught virtually in real time by highly
            qualified experts, in-demand teachers, and famous industry leaders.</p>
        <div class="button mt-5">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactUsModal">Request a Free
                Demo</button>
        </div>
    </div>

    <div class="customer-box">
        <div class="customer-logos">
            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-1.png') }}" alt="Company 1" class="customer-logo">
            </div>
            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-2.png') }}" alt="Company 2" class="customer-logo">
            </div>
            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-3.png') }}" alt="Company 3" class="customer-logo">
            </div>

            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-4.png') }}" alt="Company " class="customer-logo">
            </div>
            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-5.png') }}" alt="Company 4" class="customer-logo">
            </div>
            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-6.png') }}" alt="Company 5" class="customer-logo">
            </div>

            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-7.png') }}" class="customer-logo">
            </div>
            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-8.png') }}" class="customer-logo">
            </div>
            <div class="customer-logo-box">
                <img src="{{ asset('frontend-assets/img/all-img/cmp-log-9.png') }}" class="customer-logo">
            </div>
        </div>
    </div>
</div>
@endsection

@push('modal')
<div class="modal fade" id="curriculumModal" tabindex="-1" aria-labelledby="curriculumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px;">
            <div class="modal-body p-4">

                <!-- Close Button -->
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Title -->
                <h5 class="text-center fw-bold mb-4" id="curriculumModalLabel">Course Syllabus</h5>

                <form id="curriculumForm">
                    @csrf
                    <input type="hidden" name="type" value="curriculum">
                    <input type="hidden" id="course_id" name="course_id" value="">

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <div class="input-group">
                            <select name="country_code" class="modal-phone-flag form-select rounded-start-3 me-0 select2" required>
                                @foreach($countries as $country)
                                <option value="{{ $country->phonecode }}" data-flag='{!! $country->flag !!}' data-id="{{ $country->id }}">
                                    +{{ $country->phonecode }} {!! $country->flag !!}
                                </option>
                                @endforeach
                            </select>
                            <input type="tel" maxlength="10"  oninput="restrictToNumbers(this)"  class="form-control ps-3" id="phone" name="phone" placeholder="Enter your Phone No." required>
                        </div>
                    </div>

                    <!-- Privacy Policy -->
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                        <label class="form-check-label small" for="privacyPolicy">
                            By providing your contact details, you agree to our
                            <a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a>.
                        </label>
                    </div>

                    <button class="btn btn-primary w-100 fw-bold" type="submit" style="border-radius: 8px;">
                        Download Syllabus
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade callbackmodal" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="min-width: 800px; width: 90%">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="modal-image d-none d-md-block">
                        <div class="desc p-4 pb-0">
                            <h3 class="text-center" style="color: #012833">Being Friends & Colleagues</h3>
                            <p class="fw-bold text-center" style="color: #012833">Avail Group Discount</p>
                            <ul class="text-white ps-0" style="list-style: none;" >
                                <li style="color: #012833"> <i class="ri-arrow-right-s-fill ms-0"></i> Enroll with your groups or friends</li>
                                <li style="color: #012833"> <i class="ri-arrow-right-s-fill ms-0"></i> Get details on our social group enrollment pricing</li>
                                <li style="color: #012833"> <i class="ri-arrow-right-s-fill ms-0"></i> Group learning boosts completion rates by 30% and improves outcomes</li>
                            </ul>
                        </div>
                    <img src="{{ asset('frontend-assets/img/all-img/call_center.png') }}" alt="Request Callback">
                </div>
                <!-- Right: Form -->
                <div class="modal-form py-3 pe-4 mt-3">
                    <span class="close" id="closeModal">&times;</span>
                    <h4 class="border-bottom">Request a Callback</h4>
                    <form action="{{route('request.callback')}}" method="POST" class="mt-5">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name *" required>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <select name="country_code" id="phone-flag" class="form-select select2" required>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->phonecode }}" data-flag='{!! $country->flag !!}' data-id="{{ $country->id }}">
                                            +{{ $country->phonecode }} {!! $country->flag !!}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="text" 
                                    id="phone" 
                                    name="phone" 
                                    class="form-control ps-2" 
                                    placeholder="9090909090" 
                                    required
                                    maxlength="10"
                                    oninput="restrictToNumbers(this)" 
                                    autocomplete="tel">
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email *">
                        </div>

                        <div class="mb-3">
                            <select name="course_id" id="course_id" class="form-control select2" required>
                                <option value="">Select Program</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="policy" name="policy" required>
                            <label class="form-check-label" for="policy">
                                By providing your contact details, you agree to our 
                                <a href="/privacy-policy" target="_blank">Privacy Policy</a>.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('script')
<script>
    $(document).ready(function () {
        let storedCountryId = localStorage.getItem('selected_country_id');
        if (storedCountryId) {
            $(".modal-phone-flag option").each(function () {
                if ($(this).data("id") == storedCountryId) {
                    $(this).prop("selected", true);
                }
            });
        }

        $('.modal-phone-flag').select2({
            dropdownParent: $('#curriculumModal')
        });

        $('#curriculumModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let courseId = button.data('course-id');
            $(this).find('#course_id').val(courseId);
        });

        $('#curriculumForm').on('submit', function (e) {
            e.preventDefault();

            let $submitBtn = $(this).find('button[type="submit"]');
            $submitBtn.prop('disabled', true).text('Processing...');

            $.ajax({
                url: "{{ route('lead') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    $('#curriculumModal').modal('hide');

                    if (response.file) {
                        toastr.success(response.message || 'Submitted successfully!');
                        
                        // 🔽 Trigger file download
                        let link = document.createElement('a');
                        link.href = response.file;
                        link.setAttribute('download', response.file.split('/').pop());
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);

                        setTimeout(() => {
                            location.reload(); // 🔥 Reload page
                        }, 2000);
                    } else {
                        toastr.success(response.message || 'Submitted successfully!');
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                },
                error: function (xhr) {
                    $('#curriculumModal').modal('hide');
                    if (xhr.status === 404) {
                        toastr.error('Curriculum file not found for this course.');
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        toastr.error('Something went wrong! Please try again.');
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                },
                complete: function () {
                    $submitBtn.prop('disabled', false).text('Download Syllabus');
                }
            });
        });
    });
</script>
@endpush

@push('style')
<style>
    #curriculumModal span.select2-selection.select2-selection--single {
        border: none !important;
        border-bottom: 1px solid #ccc !important;
        height: 41px !important;
        padding-top: 7px;
        margin-top: 4.2px;
        border-radius: 0 !important;
    }

    #curriculumModal .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px !important;
    }

    #curriculumModal span.select2.select2-container.select2-container--default.select2-container--below.select2-container--focus{
        width: 70px !important;
    }

    .callbackmodal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        display: none;
        align-items: center;
        justify-content: center;
    }

    .callbackmodal .modal-content {
        width: 90%;
        max-width: 800px; 
        background: #fff;
        /* padding: 25px 20px; */
        border-radius: 8px;
        position: relative;
    }

    .callbackmodal .close {
        position: absolute;
        right: 12px;
        top: 6px;
        font-size: 24px;
        cursor: pointer;
    }

    .callbackmodal .modal-body {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }

    .callbackmodal .modal-image {
        flex: 1;
        
        background-color: #79CAF6;
    }

    .callbackmodal .modal-image img {
        /* border-radius: 8px; */
        max-width: 100%;
        max-height: 320px;
        object-fit: cover;
    }

    .callbackmodal .modal-form {
        flex: 1;
    }
    .callbackmodal .select2-container .select2-selection--single{
        height: 37px;
    }
    .callbackmodal .select2-container--default .select2-selection--single{
        border: 0;
        border-bottom: 1px solid #aaa;
        border-radius: 0;
    }
    .testimonial-cards.owl-carousel .owl-item img {
        width: 55px;
        height: 55px;
        border-radius: 50%;
    }
</style>
@endpush