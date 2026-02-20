@extends('user.layouts.layout')
@section('title', $blog->title . ' | Centuera')
@section('meta_description', $blog->meta)

@section('content')
<!-- Blog Detail Section -->
<section class="blog-section ptb-60">
    <div class="breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class=" d-flex align-items-center w-100 py-1 dgs breadcrumb-nav dfgblogs">
                        <a href="{{ route('index') }}" class="text-black text-decoration-none fs-7 whiteSpace-nw py-1 px-lg-1 ">Home</a>
                        <i class="text-black fa-solid fa-chevron-right mx-2 fa-sm pe-none fts"></i>
                        <a href="{{ route('blog') }}" class="text-black text-decoration-none fs-7 whiteSpace-nw py-1 px-lg-1 ">Blogs</a>
                        <i class="text-black fa-solid fa-chevron-right mx-2 fa-sm pe-none fts"></i>
                        <p class="mb-0 fs-7 text-ellipsis-mobile ">
                            <strong class="fw-semibold fs-7">{{ $blog->title }}</strong>
                        </p>
                    </div>
                    <div class="mb-1 mt-3">
                        <p class="text-warning fw-bold mb-1 fs-7">👋 <span class="hdsw fw-semibold fs-7"> HELLO</span></p>
                        <h1 class="section-title mb-1 fs-4 fw-bold mt-2 lh-base ">{{ $blog->title }}</h1>
                    </div>
                    <div class="py-3 ddsr">
                        <div class="py-4 py-lg-5 text-white px-lg-4 px-3 rounded-4 details">
                            <div class="row text-center hts">
                                <div class="col d-flex gdsr liner flex-column align-items-center border-end border-light">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-eye"></i> &nbsp;
                                        <span class="">Author</span>
                                    </div>
                                    <strong class="fs-7"> {{ $blog->author ?? 'Admin' }}</strong>
                                </div>
                                <div class="col d-flex gdsr liner flex-column align-items-center border-end border-light">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-calendar-days"></i>  &nbsp;
                                        <span class="">Published</span>
                                    </div>
                                    <strong class="fs-7"> {{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</strong>
                                </div>
                                <div class="col d-flex gdsr liner flex-column align-items-center border-end border-light">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-thumbs-up"></i>&nbsp;
                                        <span class="">Views</span>
                                    </div>
                                    <strong id="viewsCountPlaceholder" class="fs-7">{{ number_format($blog->views) ?? '200' }}</strong>
                                </div>
                                <div class="col d-flex gdsr flex-column align-items-center article-author-detail">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-book-open mb-1"></i>&nbsp;
                                        <span class="">Read Time</span>
                                    </div>

                                    <strong class="fs-7 read-time">{{ $blog->read_time ?? 0}} mins</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-none d-md-block">
                    <img src="{{ asset('frontend-assets/img/all-img/blog-unscreen.gif') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                @if($blog->image)
                <!-- <div class="mb-4">
                    <img src="{{ asset('admin/blog/' . $blog->image) }}" alt="Blog Image" class="img-fluid w-100 rounded shadow-sm" style="max-height: 450px; object-fit: fill;">
                </div> -->
                @endif
                <div class="blog-description" style="text-align: justify; line-height: 1.8; font-size: 1.1rem;">
                    {!! $blog->description !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <h5 class="text-center">Request More Information</h5>
                    <form method="POST" class="mt-3 courseLead" action="{{ route('lead') }}">
                        @csrf
                        <input type="hidden" name="course_id" value="">
                        <input type="hidden" name="type" value="enquiry">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name*" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email*" required>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label mb-0">
                                Mobile No. <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <select name="country_code" class="phone-flag form-select rounded-start-3 me-0 select2" required>
                                    @foreach($countries as $country)
                                    <option
                                        value="{{ $country->phonecode }}"
                                        data-flag='{!! $country->flag !!}'
                                        data-id="{{ $country->id }}">
                                        +{{ $country->phonecode }} {!! $country->flag !!}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control p-2" name="phone" placeholder="9090909090" maxlength="10" oninput="restrictToNumbers(this)" required>
                            </div>
                        </div>

                        <div class="mb-3 enquiry-field">
                            <label for="enquiry_for">Enquiry for :</label>
                            <div class="form-check">
                                <input class="form-check-input enquiryFor" type="radio" name="enquiry_for" id="myself"
                                    value="myself" checked>
                                <label class="form-check-label" for="myself">Myself</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input enquiryFor" type="radio" name="enquiry_for" id="company"
                                    value="company">
                                <label class="form-check-label company" for="company">My Company</label>
                            </div>
                        </div>
                        <!-- Company name -->
                        <div class="mb-3 company_name d-none">
                            <input type="text" class="form-control" name="company_name" id="" placeholder="Company Name">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                            <label class="form-check-label" for="privacyPolicy">By providing your contact details,
                                you agree to our privacy policy</label>
                        </div>
                        <!-- Google reCAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}"></div>

                        <div class="text-center">
                            <button class="btn btn-primary mt-4" data-animation="fadeInRight" data-delay=".8s" type="submit"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent blogs -->
    @if(count($recentBlogs) > 0)
    <div class="recent-blogs mt-5">
        <div class="container">
            <h4 class="fw-bold mb-4">Recent Blogs</h4>
            <div class="row">
                @foreach($recentBlogs as $blog)
                <div class="col-lg-4 col-sm-6">
                    <div class="single-blog-box">
                        <div class="image position-relative">
                            <a href="{{ route('blog.view', $blog->slug) }}">
                                <img src="{{ asset('admin/blog/'. $blog->image) }}" alt="image" style="height: 250px; object-fit: fill; width: 100%">
                            </a>
                        </div>
                        <div class="content" style="min-height: 175px;">
                            <ul class="cr-items d-flex list-unstyle justify-content-between">
                                <li><i class="ri-calendar-2-line"></i><span>{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}</span></li>
                                <li><i class="ri-price-tag-3-line"></i><span>{{ $blog->getCategory->name ?? '' }}</span></li>
                            </ul>
                            <h3 class="mb-15 fs-20">
                                <a href="{{ route('blog.view', $blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 20) }}</a>
                            </h3>
                            <p class="mb-0"><a href="{{ route('blog.view', $blog->slug) }}">{!! Str::limit(strip_tags($blog->description), 70) !!}</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

</section>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        let storedCountryId = localStorage.getItem('selected_country_id');

        if (storedCountryId) {
            $(".phone-flag option").each(function() {
                if ($(this).data("id") == storedCountryId) {
                    $(this).prop("selected", true);
                }
            });
        }
        $('.phone-flag').select2();

    });
    $(document).on("submit", ".courseLead", function(e) {
        e.preventDefault();

        let form = $(this);
        let formData = form.serialize();

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.status === "success") {
                    toastr.success(response.message);
                    form[0].reset();
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error(response.message || "Something went wrong!");
                }
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    toastr.error("Something went wrong. Please try again.");
                }
            },
        });
    });

    $(document).on("change", "input[name='enquiry_for']", function() {
        let $form = $(this).closest("form"); // scope to current form
        let $companyField = $form.find(".company_name");

        if ($(this).val() === "company") {
            $companyField.removeClass("d-none");
        } else {
            $companyField.addClass("d-none");
        }
    });
</script>
@endpush

@push('style')
<style>
    span.select2-selection.select2-selection--single {
        border: none !important;
        border-bottom: 1px solid #ccc !important;
        height: 41px !important;
        padding-top: 7px;
        margin-top: 4.2px;
        border-radius: 0 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px !important;
    }

    .breadcrumb {
        background-color: #f0f9ff;
    }

    .details {
        background-color: #01203D;
    }
    .blog-description a {
        text-decoration: underline;
        color: #012833;
        cursor: pointer;
    }
</style>
@endpush