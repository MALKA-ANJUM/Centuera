@extends('user.layouts.layout')
@section('title', 'About | Centuera')
@section('content')
<!-- BEGIN: Content-->

<!--  Page Title Area Start-->
<section class="page-title-area position-relative">
    <div class="container">
        <div class="main-max-width">
            <div class="page-title-content">
                <h2>About Us</h2>
                <ul class="page-breadcrumb align-items-center list-unstyle">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"></li>
                    <li class="primery-link">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--  Page Title Area End-->


<!-- About Section Start -->
<div class="about-section mt-5 ptb-100">
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
                    <div class="about-meta d-flex align-items-center mt-3">
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
                                <div class="icon"><img src="/frontend-assets/img/icon/about-icon.svg" alt="icon"
                                        style="margin-top: 25px;"></div>
                                <h4>Learn From The Experts</h4>
                                <p>Continuous learning keeps you ahead and informed in evolving fields.</p>
                                <!-------
                                    <a class="btn" href="about">Read More <img src="layout/img/icon/long-arrow.svg"
                                            alt="Image"></a>----->
                            </div>
                        </div>
                        <div class="card about-card" id="my-element2">
                            <h4 class="heading">Seven Easy Rules Of Education</h4>
                            <div class="description">
                                <div class="icon"><img src="/frontend-assets/img/icon/about-icon.svg" alt="icon"></div>
                                <h4>Seven Easy Rules Of Education</h4>
                                <p>Stay curious and committed to learning for a brighter future.</p>
                                <!---------
                                    <a class="btn" href="about">Read More <img src="layout/img/icon/long-arrow.svg"
                                            alt="Image"></a>--->
                            </div>
                        </div>
                        <div class="card about-card" id="my-element3">
                            <h4 class="heading">Explore our Beliefs</h4>
                            <div class="description">
                                <div class="icon"><img src="/frontend-assets/img/icon/about-icon.svg" alt="icon"></div>
                                <h4>Explore our Beliefs</h4>
                                <p>Knowledge grows rapidly, so keep learning and stay well-informed always.</p>
                                <!-------
                                    <a class="btn" href="about">Read More <img src="layout/img/icon/long-arrow.svg"
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

            <div class="row">
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

<!-- END: Content-->
@endsection