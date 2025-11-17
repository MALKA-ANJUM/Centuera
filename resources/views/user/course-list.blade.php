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
                            <form class="search-form" onsubmit="return false;"> 
                                <label>
                                    <input type="search" class="search-field" placeholder="Search...">
                                </label>
                                <button class="widget-search-btn" type="button"><i class="ri-search-line"></i></button>
                            </form>

                            <div class="accordion" id="widget-collps">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button widget-title" type="button" style="padding-bottom: 10px !important;"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                            Categories
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="widget-collapse collapse show"
                                        data-bs-parent="#widget-collps">
                                        <div class="widget-collps-body">
                                            <ul>
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $category)
                                                        <li>
                                                            <a href="#" class="filter-category" data-id="{{ $category->id }}">
                                                                <p>{{ $category->name }}</p> 
                                                                <span>{{ $category->getCourses->count() }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8">
                    <div id="course-list"> <!-- 🔥 Wrap the entire course list -->
                        @include('user.partials.course-list', ['courses' => $courses, 'currency' => $currency])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Courses Section End -->


@endsection
@push('script')
<script>
    $(document).ready(function () {
        let timer; // for debounce
        $('.search-field').on('keyup', function () {
            clearTimeout(timer); // clear previous timer

            let search = $(this).val();
            
            timer = setTimeout(function () {
                $.ajax({
                    url: "{{ route('course.list') }}",
                    type: "GET",
                    data: { search: search },
                    success: function (data) {
                        $('#course-list').html(data);
                    },
                    error: function () {
                        alert('Something went wrong.');
                    }
                });
            }, 300); // waits 300ms after typing stops
        });
    });

    $(document).on('click', '.filter-category', function (e) {
        e.preventDefault();
        let categoryId = $(this).data('id');

        $.ajax({
            url: "{{ route('course.list') }}",
            type: "GET",
            data: { category: categoryId },
            success: function (response) {
                $('#course-list').html(response);
            }
        });
    });

</script>
@endpush
