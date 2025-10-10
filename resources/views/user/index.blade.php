@extends('user.layouts.layout')
@section('title', 'Dashboard')
@section('content')
<!-- BEGIN: Content-->
<!-- Hero Section Start -->
<div class="hero-section hero-bg position-relative">
    <div class="container">
        <div class="main-max-width">
            <div class="hero-slider owl-carousel owl-theme">
                <div class="silde-item">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="content">
                                <h4 class="sub-title mb-25">The Leader In Online Learning</h4>
                                <h1 class="fs-50 mb-25">Grow Your <span class="gradient-style">Skills</span> Advance
                                    Your Career Path.</h1>
                                <p>In the dynamic landscape of today's professional world, the key to success lies
                                    in continuous learning and skill Development. As industries evolve and
                                    technology advances,</p>

                                <div class="her-btns mt-40">
                                    <a href="#course-sec" class="btn style-one mr-20">Browse Course <img
                                            src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                                    <a href="#about-sec" class="btn style-two">Explore More<img
                                            src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                                </div>

                                <!-- <div class="book-icon bounce"><img src="{{ asset('frontend-assets/img/icon/book.svg') }}" alt="image"></div> -->

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-image position-relative">
                                <img class="position-relative index-2" src="{{ asset('frontend-assets/img/banner/hero-img-3.png') }}"
                                    alt="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="silde-item">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="content">
                                <h4 class="sub-title mb-25">The Leader In Online Learning</h4>
                                <h1 class="fs-50 mb-25">Welcome To <span class="gradient-style">Online</span>
                                    Education Solutions.</h1>
                                <p>In the dynamic landscape of today's professional world, the key to success lies
                                    in continuous learning and skill Development. As industries evolve and
                                    technology advances,</p>

                                <div class="her-btns mt-40">
                                    <a href="courses.html" class="btn style-one mr-20">Browse Course <img
                                            src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                                    <a href="about.html" class="btn style-two">Explore More<img
                                            src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                                </div>

                                <!-- <div class="book-icon bounce"><img src="{{ asset('frontend-assets/img/icon/book.svg') }}" alt="image"></div> -->

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-image position-relative">
                                <img class="position-relative index-2" src="{{ asset('frontend-assets/img/all-img/hero-img2.png') }}"
                                    alt="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="silde-item">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="content">
                                <h4 class="sub-title mb-25">The Leader In Online Learning</h4>
                                <h1 class="fs-50 mb-25">Grow Your <span class="gradient-style">Skills</span> Advance
                                    Your Career Path.</h1>
                                <p>In the dynamic landscape of today's professional world, the key to success lies
                                    in continuous learning and skill Development. As industries evolve and
                                    technology advances,</p>

                                <div class="her-btns mt-40">
                                    <a href="courses.html" class="btn style-one mr-20">Browser Course <img
                                            src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                                    <a href="about.html" class="btn style-two">Explore More<img
                                            src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                                </div>

                                <!-- <div class="book-icon bounce"><img src="{{ asset('frontend-assets/img/icon/book.svg') }}" alt="image"></div> -->

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-image position-relative">
                                <img class="position-relative index-2" src="{{ asset('frontend-assets/img/all-img/hero-img.png') }}"
                                    alt="image">
                            </div>
                        </div>
                    </div>
                </div>


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
<div class="category-section ptb-100">
    <div class="container">
        <div class="main-max-width">
            <div class="section-title mb-50">
                <div class="row">
                    <div class="col-lg-7 col-sm-7">
                        <div class="content">
                            <h4 class="sub-title mb-25"># Browse Category</h4>
                            <h2 class="mb-0 fs-35">Top Courses Categories</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="cetg-card d-flex align-items-center position-relative mb-25 box-shadow-2">
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/catg-icon-1.svg') }}" alt="icon">
                        </div>
                        <div class="text">
                            <h4 class="fs-16"><a href="courses.html">Project Management</a></h4>
                            <p class="m-0 fs-15">3 Courses <img src="{{ asset('frontend-assets/img/icon/long-arrow-2.svg') }}" alt="Image">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cetg-card d-flex align-items-center position-relative mb-25 box-shadow-2">
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/catg-icon-2.svg') }}" alt="icon">
                        </div>
                        <div class="text">
                            <h4 class="fs-16"><a href="courses.html">Quality Management</a></h4>
                            <p class="m-0 fs-15">2 Courses <img src="{{ asset('frontend-assets/img/icon/long-arrow-2.svg') }}" alt="Image">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cetg-card d-flex align-items-center position-relative mb-25 box-shadow-2">
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/catg-icon-3.svg') }}" alt="icon">
                        </div>
                        <div class="text">
                            <h4 class="fs-16"><a href="courses.html">Agile & Scrum</a></h4>
                            <p class="m-0 fs-15">3 Courses <img src="{{ asset('frontend-assets/img/icon/long-arrow-2.svg') }}" alt="Image">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cetg-card d-flex align-items-center position-relative mb-25 box-shadow-2">
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/catg-icon-1.svg') }}" alt="icon">
                        </div>
                        <div class="text">
                            <h4 class="fs-16"><a href="courses.html">IT Service Management</a></h4>
                            <p class="m-0 fs-15">1 Course <img src="{{ asset('frontend-assets/img/icon/long-arrow-2.svg') }}" alt="Image">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category Section End -->

<!-- About Section Start -->
<div class="about-section pb-100" id="about-sec">
    <div class="container">
        <div class="main-max-width">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <h4 class="sub-title mb-25"># About Us</h4>
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
                            <a href="about.html" class="btn style-one box-shadow-1">About More<img
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
<div class="course-section pb-100" id="course-sec">
    <div class="container">
        <div class="main-max-width">
            <div class="section-title mb-50 position-relative">
                <h4 class="sub-title mb-25"># Our Courses List</h4>
                <h2 class="fs-35">Broad Selection Of Course</h2>
            </div>
            <div id="mix-wrapper" class="course-mix-wrapper">
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-lg-4 col-sm-6 mix-target Business Design">
                        <div class="single-courses-box mb-25 box-shadow-2">
                            <div class="image mb-20 position-relative">
                                <a href="{{ route('user.course.details', $course->slug) }}">
                                    <img src="{{ asset('uploads/courses/'. $course->image) }}" alt="image">
                                </a>

                                <div class="cr-tag">
                                    <a href="{{ route('user.course.details', $course->slug) }}">{{ $course->getCategory->name ?? '' }}</a>
                                </div>
                            </div>
                            <div class="content">
                                <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                    <h3 class="mb-1 fs-20"><a href="{{ route('user.course.details', $course->slug) }}">{{ $course->title }}</a></h3>

                                    <div class="cr-price">
                                        <h5 class="fs-16"><span class="price">$1145/</span> <span
                                                class="old-price">$1599</span></h5>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center align-items-center rating-section">
                                <ul class="d-flex list-unstyle customer-ratings">
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><span>(4.5)</span></li>
                                </ul>
                                <ul
                                    class="cr-items d-flex align-items-center justify-content-center gap-2 list-unstyle">
                                    <li class="mr-15"><i class="ri-team-fill"></i> <span>85,396 Learners</span> </li>
                                    <li><i class="ri-time-line"></i> <span>{{ $course->duration }} Hrs</span></li>
                                </ul>
                            </div>
                            <div class="curriculum-certificate">
                                    <a href="{{ asset('uploads/certifications/'. $course->certification_image ) }}" class="view-certification" target="_blank">
                                        View Certification
                                    </a>
                                <a href="{{ route('user.course.details', $course->slug) }}">
                                    <button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-5 col-sm-5">
                    <div class="section-btn">
                        <a href="{{ route('user.course.list') }}" class="btn style-one box-shadow-1">View All <img
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
<div class="testimonial-section custom-nav pb-100">
    <div class="container">
        <div class="main-max-width">
            <div class="row">
                <div class="col-lg-5">
                    <div class="content">
                        <h4 class="sub-title mb-25"># Client’s Testimonials</h4>
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
                                <p>{{ $testimonial->description }}</p>
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
<div class="blog-section pb-75">
    <div class="container">
        <div class="main-max-width">
            <div class="section-title mb-50">
                <div class="row">
                    <div class="col-lg-7 col-sm-7">
                        <div class="content">
                            <h4 class="sub-title mb-25"># Blog</h4>
                            <h2 class="mb-0 fs-35">Latest News & Articles</h2>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5">
                        <div class="section-btn text-end">
                            <a href="{{ route('user.blog') }}" class="btn style-one box-shadow-1">View All <img
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
                            <a href="#">
                                <img src="{{ asset('admin/blog/'. $blog->image) }}" alt="image" style="min-height: 275px">
                            </a>
                        </div>
                        <div class="content">
                            <ul class="cr-items d-flex list-unstyle">
                                <li><i class="ri-calendar-2-line"></i><span>{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}</span></li>
                            </ul>
                            <h3 class="mb-15 fs-20">
                                <a href="#">{{ \Illuminate\Support\Str::limit($blog->title, 30) }}</a>
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

            <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactUsModalLabel">Contact Us</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <select class="form-select" id="countryCode">
                                            <option value="IN">IN +91</option>
                                            <option value="US">US +1</option>
                                            <option value="UK">UK +44</option>
                                        </select>
                                        <input type="text" class="form-control" id="phoneNumber"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="company" placeholder="Company">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="privacyPolicy">
                                    <label class="form-check-label" for="privacyPolicy">By providing your
                                        contact
                                        details, you
                                        agree to our privacy policy</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#subscribeForm').on('submit', function(e) {
            e.preventDefault();

            let email = $('#emailInput').val();

            $.ajax({
                url: "{{ route('user.subscribe') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: email
                },
                success: function(response) {
                    $('#subscribeMessage').html('<span style="color:green;">' + response.message + '</span>');
                    $('#emailInput').val('');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    $('#subscribeMessage').html('<span style="color:red;">Something went wrong.</span>');
                }
            });
        });
    });
</script>