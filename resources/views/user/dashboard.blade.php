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
    <div class="course-section pb-100" id="course-sec">
        <div class="container">
            <div class="main-max-width">
                <div class="section-title mb-50 position-relative">
                    <h4 class="sub-title mb-25"># Our Courses List</h4>
                    <h2 class="fs-35">Broad Selection Of Course</h2>
                </div>
                <div id="mix-wrapper" class="course-mix-wrapper">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mix-target Business Design">
                            <div class="single-courses-box mb-25 box-shadow-2">
                                <div class="image mb-20 position-relative">
                                    <a href="pmp_certification.html">
                                        <img src="{{ asset('frontend-assets/img/all-img/course-1.png') }}" alt="image">
                                    </a>

                                    <div class="cr-tag">
                                        <a href="pmp_certification.html">Project Management</a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-1 fs-20"><a href="pmp_certification.html">PMP®</a></h3>

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
                                        <li><i class="ri-time-line"></i> <span>35 Hrs</span></li>
                                    </ul>
                                </div>
                                <div class="curriculum-certificate">
								<a href="pmp_certification.html">
								<button class="view-certification">View Certification</button></a>
									<a href="pmp_certification.html">
									<button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mix-target Development Design">
                            <div class="single-courses-box mb-25 box-shadow-2">
                                <div class="image mb-20 position-relative">
                                    <a href="capm_certification.html">
                                        <img src="{{ asset('frontend-assets/img/all-img/course-2.png') }}" alt="image">
                                    </a>

                                    <div class="cr-tag">
                                        <a href="capm_certification.html">Project Management</a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-1 fs-20"><a href="capm_certification.html">CAPM®</a></h3>

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
                                        <li class="mr-15"><i class="ri-team-fill"></i> <span>89,584 Learners</span> </li>
                                        <li><i class="ri-time-line"></i> <span>16 Hrs</span></li>
                                    </ul>
                                </div>
                                <div class="curriculum-certificate">
                                    <a href="capm_certification.html">
								<button class="view-certification">View Certification</button></a>
									<a href="capm_certification.html">
									<button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mix-target Development Business">
                            <div class="single-courses-box mb-25 box-shadow-2">
                                <div class="image mb-20 position-relative">
                                    <a href="prince_practice.html">
                                        <img src="{{ asset('frontend-assets/img/all-img/course-3.png') }}" alt="image">
                                    </a>

                                    <div class="cr-tag">
                                        <a href="prince_practice.html">Project Management</a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-1 fs-20"><a href="prince_practice.html">PRINCE2®</a></h3>
                                        <div class="cr-price">
                                            <h5 class="fs-16"><span class="price">$1099/</span> <span
                                                    class="old-price">$1499</span></h5>
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
                                        <li class="mr-15"><i class="ri-team-fill"></i> <span>91,216 Learners</span> </li>
                                        <li><i class="ri-time-line"></i> <span>32 Hrs</span></li>
                                    </ul>
                                </div>
                                <div class="curriculum-certificate">
                                    <a href="prince_practice.html">
								<button class="view-certification">View Certification</button></a>
									<a href="prince_practice.html">
									<button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mix-target Business Design Development">
                            <div class="single-courses-box mb-25 box-shadow-2">
                                <div class="image mb-20 position-relative">
                                    <a href="lean_green_belt.html">
                                        <img src="{{ asset('frontend-assets/img/all-img/course-4.png') }}" alt="image">
                                    </a>

                                    <div class="cr-tag">
                                        <a href="lean_green_belt.html">Quality Management</a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-1 fs-20"><a href="lean_green_belt.html">Lean Six Sigma Green
                                                Belt</a>
                                        </h3>
                                        <div class="cr-price">
                                            <h5 class="fs-16"><span class="price">$1145/</span> <span
                                                    class="old-price">$1455</span></h5>
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
                                        <li class="mr-15"><i class="ri-team-fill"></i> <span>88,964 Learners</span> </li>
                                        <li><i class="ri-time-line"></i> <span>32 Hrs</span></li>
                                    </ul>
                                </div>
                                <div class="curriculum-certificate">
                                    <a href="lean_green_belt.html">
								<button class="view-certification">View Certification</button></a>
									<a href="lean_green_belt.html">
									<button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mix-target Design Development">
                            <div class="single-courses-box mb-25 box-shadow-2">
                                <div class="image mb-20 position-relative">
                                    <a href="lean_black_belt.html">
                                        <img src="{{ asset('frontend-assets/img/all-img/course-5.png') }}" alt="image">
                                    </a>

                                    <div class="cr-tag">
                                        <a href="lean_black_belt.html">Quality Management</a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-1 fs-20"><a href="lean_black_belt.html">Lean Six Sigma Black
                                                Belt</a>
                                        </h3>
                                        <div class="cr-price">
                                            <h5 class="fs-16"><span class="price">$1145/</span> <span
                                                    class="old-price">$1655</span></h5>
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
                                        <li class="mr-15"><i class="ri-team-fill"></i> <span>93,008 Learners</span> </li>
                                        <li><i class="ri-time-line"></i> <span>36 Hrs</span></li>
                                    </ul>
                                </div>
                                <div class="curriculum-certificate">
                                    <a href="lean_black_belt.html">
								<button class="view-certification">View Certification</button></a>
									<a href="lean_black_belt.html">
									<button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 mix-target Business Development">
                            <div class="single-courses-box mb-25 box-shadow-2">
                                <div class="image mb-20 position-relative">
                                    <a href="pmi_acp_certification.html">
                                        <img src="{{ asset('frontend-assets/img/all-img/course-6.png') }}" alt="image">
                                    </a>

                                    <div class="cr-tag">
                                        <a href="pmi_acp_certification.html">Agile & Scrum</a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-1 fs-20"><a href="pmi_acp_certification.html">PMI-ACP®</a></h3>
										<br/>
										<h3> </h3>
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
                                        <li><i class="ri-time-line"></i> <span>35 Hrs</span></li>
                                    </ul>
                                </div>
                                <div class="curriculum-certificate">
                                    <a href="pmi_acp_certification.html">
								<button class="view-certification">View Certification</button></a>
									<a href="pmi_acp_certification.html">
									<button class="view-curiculum"><i class="ri-download-line"></i><span>Curriculum</span></button></a>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                    <div class="col-lg-5 col-sm-5">
                        <div class="section-btn">
                            <a href="courses.html" class="btn style-one box-shadow-1">View All <img
                                    src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                                         <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1747833550_90d8040fa8471eca50e9.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Bidisha Ghosh</h5>
                                            <p class="mb-0">Technical Lead ( Mechanical Design)</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>Tim is an exceptional instructor for the PMP certification course. He simplifies complex topics, making them easy to understand. Moreover, he offers great support throughout the PMP course.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1747833300_2289dfe0bbd80acc34c8.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Manuj Upadhyay</h5>
                                            <p class="mb-0">Technology Consultant</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>Centuera PMP Training was excellent. The well-structured course covered key domains, enhancing my project management skills. I gained expertise in Agile, Waterfall, and Hybrid models, improving processes and stakeholder engagement. Though new, it’s earned me recognition at PwC, boosting efficiency and career growth prospects.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1747832857_2f41a024ea84cbdf1192.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Mike Watson</h5>
                                            <p class="mb-0">Chief Executive Officer</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>Sarah is a wonderfully engaging presenter, very easy to listen to and the course was just the right mix of theory, practical demonstration and anecdotes - thank you!</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1747832477_d15e92b865f13befde6a.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Kathy Snowden</h5>
                                            <p class="mb-0">Group Lead</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>The course was excellent, with the instructor's real-life examples being particularly helpful for applying the concepts to my work. I would suggest adding a more interactive element to the next session, like a group case study.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1747832058_82c0db79234d02c97652.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Tom Gardner</h5>
                                            <p class="mb-0">Serial Entrepreneur</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>The training was relevant to my job and provided valuable insights and skills.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1747831715_8e4eb6dde069584e8d8e.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Surender Sharma</h5>
                                            <p class="mb-0">Manager</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>The training was well-structured and engaging, with the presenter effectively using real-life examples. The interactive sessions and materials were particularly helpful, and the pace was comfortable. Overall, it was a valuable and informative session that met my expectations.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1747831623_552706e9a3be7d6bfb85.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Dave Anderson</h5>
                                            <p class="mb-0">President</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>The presenter was knowledgeable and used examples to illustrate key points, making the material easier to grasp.	</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1725339947_6d34ed26353844e5518e.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Albert Hunk</h5>
                                            <p class="mb-0">Manager</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>The training sessions provided invaluable insights that translated into
                                        measurable improvements. Our organization is now more competitive, and our
                                        employees to excel in their roles.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1725339861_dbd3bde237aa0c388b32.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">David Samson</h5>
                                            <p class="mb-0">Customer</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>The online courses had a profound impact on my career growth. I am now better
                                        positioned for success, armed with the knowledge and tools needed to tackle
                                        future challenges.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                                                        <div class="testimonial-box">
                                <div class="info mb-25 d-flex align-items-center justify-content-between">
                                    <div class="image d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/uploads/1725339647_24980e238e8425755ec8.png') }}" alt="image">
                                        <div class="content">
                                            <h5 class="fs-16">Jonson Maxwell</h5>
                                            <p class="mb-0">Customer</p>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <img src="{{ asset('frontend-assets/img/icon/quate-icon.svg') }}" alt="icon">
                                    </div>
                                </div>
                                <div class="box-content">
                                    <p>The training sessions significantly boosted my skills and confidence. I feel
                                        well-prepared for new opportunities and equipped to navigate any obstacles
                                        ahead.</p>
                                </div>
                                <div class="ratings">
                                    <ul class="d-flex list-unstyle p-0">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                            


        
                        </div>
                        <div class="benefits-prev"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></div>
                        <div class="benefits-next"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <a href="blog.html" class="btn style-one box-shadow-1">View All <img
                                        src="{{ asset('frontend-assets/img/icon/long-arrow.svg') }}" alt="Image"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-blog-box">
                            <div class="image position-relative">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets/img/all-img/blog-1.png') }}" alt="image">
                                </a>

                            </div>
                            <div class="content">
                                <ul class="cr-items d-flex list-unstyle">
                                    <li class="mr-20"><a><i class="ri-chat-1-line"></i><span>65 Message</span></a></li>
                                    <li><i class="ri-calendar-2-line"></i><span>12 June 2024</span></li>
                                </ul>
                                <h3 class="mb-15 fs-20"><a href="#">Business modeless and pricing strategies are
                                        essential.</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-blog-box">
                            <div class="image position-relative">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets/img/all-img/blog-2.png') }}" alt="image">
                                </a>


                            </div>
                            <div class="content">
                                <ul class="cr-items d-flex list-unstyle">
                                    <li class="mr-20"><a><i class="ri-chat-1-line"></i><span>54 Message</span></a></li>
                                    <li><i class="ri-calendar-2-line"></i><span>31 May 2024</span></li>
                                </ul>
                                <h3 class="mb-15 fs-20"><a href="#">Business modeless and pricing strategies are
                                        essential.</a></h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-blog-box">
                            <div class="image position-relative">
                                <a href="#">
                                    <img src="{{ asset('frontend-assets/img/all-img/blog-3.png') }}" alt="image">
                                </a>

                            </div>
                            <div class="content">
                                <ul class="cr-items d-flex list-unstyle">
                                    <li class="mr-20"><a><i class="ri-chat-1-line"></i><span>71 Message</span></a></li>
                                    <li><i class="ri-calendar-2-line"></i><span>23 April 2024</span></li>
                                </ul>
                                <h3 class="mb-15 fs-20"><a href="#">Business modeless and pricing strategies are
                                        essential.</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <!-- Subscribe Section Start -->
    <div class="subscribe-area position-relative z-1">
        <div class="container">
            <div class="main-max-width">
                <div class="subscribe-info">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="content">
                                <h3 class="fs-20 mb-20">Sign up to get The Latest Updates</h3>
                                <p>Our approach to it is unique around how to work and how to get hands-on with you like
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form class="subscribe-from d-flex align-items-center">
                                <input class="from-control" type="email" placeholder="type your email address"
                                    required="">
                                <button class="btn style-one" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END: Content-->
@endsection


