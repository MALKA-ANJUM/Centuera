@extends('user.layouts.layout')
@section('title', 'Dashboard')
@section('content')
<!-- BEGIN: Content-->

<!--  Page Title Area Start-->
    <section class="page-title-area position-relative">
        <div class="container">
            <div class="main-max-width">
                <div class="page-title-content">
                    <h2>Blog</h2>
                    <ul class="page-breadcrumb align-items-center list-unstyle">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"></li>
                        <li class="primery-link">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--  Page Title Area End-->

    <!-- Blog Section Start -->
    <div class="blog-section mt-5 ptb-100">
        <div class="container">
            <div class="main-max-width">
                <div class="row justify-content-center">
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-blog-box">
                                <div class="image position-relative">
                                    <a href="{{ route('user.blog.view', $blog->slug) }}">
                                        <img src="{{ asset('admin/blog/'. $blog->image) }}" alt="image" style="min-height: 275px">
                                    </a>
                                </div>
                                <div class="content" style="min-height: 175px;">
                                    <ul class="cr-items d-flex list-unstyle justify-content-between">
                                        <li><i class="ri-calendar-2-line"></i><span>{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}</span></li>
                                        <li><i class="ri-price-tag-3-line"></i><span>{{ $blog->categories }}</span></li>
                                    </ul>
                                    <h3 class="mb-15 fs-20">
                                        <a href="{{ route('user.blog.view', $blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 20) }}</a>
                                    </h3>
                                    <p class="mb-0"><a href="{{ route('user.blog.view', $blog->slug) }}">{!! Str::limit(strip_tags($blog->description), 70) !!}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
            <div class="row mt-2">
                {{-- <div class="col-12 d-flex justify-content-center"> --}}
                    {{ $blogs->links('pagination::bootstrap-5') }}
                {{-- </div> --}}
            </div>
            <!-- End Pagination -->
            </div>
        </div>
    </div>
    <!-- Blog Section Start -->

<!-- END: Content-->
@endsection