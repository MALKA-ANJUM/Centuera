@extends('user.layouts.layout')
@section('title', 'Courses | Centuera')
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
                            <input type="tel" class="form-control ps-3" id="phone" maxlength="10"  oninput="restrictToNumbers(this)" name="phone" placeholder="Enter your Phone No." required>
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
@endpush

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
</style>
@endpush
