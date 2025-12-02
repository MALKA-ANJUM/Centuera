@extends('user.layouts.layout')
@section('title', 'Schedules')
@section('content')
<section class="course-container-pmp">
    <div class="container p-0">
        <h2 class="schedule-heading">Schedule for {{ $course->title ?? 'Course' }}</h2>

        {{-- Schedules --}}
        <div class="schedule-section">
            <div class="left-section">
                <h4 class="sparkling-box">
                    <span><i class="ri-checkbox-circle-line"></i></span> 
                    {{ request('batche') ?? 'Live Online Class, Classroom' }}
                </h4>
                <div class="filter-tittle">
                    <h4 class="countSchedules">{{ $schedules->total() }} Schedules Available</h4>
                </div>

                {{-- Filter Form --}}
                <div class="button-group">
                    <form method="GET" action="{{ route('user.course.schedule', $course->slug) }}" id="filterForm" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        {{-- Weekday / Weekend Dropdown --}}
                        <select name="type" onchange="document.getElementById('filterForm').submit()">
                            <option value="">Select Schedule Type</option>
                            <option value="weekday" {{ request('type') == 'weekday' ? 'selected' : '' }}>Weekday</option>
                            <option value="weekend" {{ request('type') == 'weekend' ? 'selected' : '' }}>Weekend</option>
                        </select>

                        {{-- Month --}}
                        <select name="month" onchange="document.getElementById('filterForm').submit()">
                            <option value="">Select Month</option>
                            @foreach(['August','September','October','November','December'] as $month)
                                <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>{{ $month }}</option>
                            @endforeach
                        </select>

                        {{-- Class Type --}}
                        <select name="batche" onchange="document.getElementById('filterForm').submit()">
                            <option value="">Select Class Type</option>
                            <option value="Live Online Class" {{ request('batche') == 'Live Online Class' ? 'selected' : '' }}>Live Online Class</option>
                            <option value="Classroom" {{ request('batche') == 'Classroom' ? 'selected' : '' }}>Classroom</option>
                        </select>
                    </form>
                </div>
            
                <div class="d-flex justify-content-end">
                    <p data-bs-toggle="tooltip" data-bs-placement="top" 
                    data-bs-html="true"
                    title="<strong>Group discount: Upto 12%</strong>
                            <ul style='padding-left: 15px; margin: 5px 0;'>
                                <li>3 or more participants get up to 7%</li>
                                <li>5 or more participants get up to 10%</li>
                                <li>8 or more participants get up to 12%</li>
                            </ul>">
                        🎁 Group discount: Upto 12% &nbsp;<i class="ri-information-line text-primary fw-bold"></i>
                    </p>
                </div>

                {{-- Schedules --}}
                @php
                    $validSchedules = $schedules->filter(function($schedule) {
                        return !empty($schedule->prices) && !empty($schedule->prices->country_id);
                    });
                @endphp

                @if($validSchedules->count() > 0)
                    @foreach($validSchedules as $index => $schedule)
                        <div class="mb-3 shadow-sm border rounded-3">
                            <div class="row g-0 align-items-center p-2">
                                {{-- LEFT SECTION --}}
                                <div class="col-md-4 border-end pe-2">
                                    <div class="batch-one"> 
                                        <h4 class="ms-0"> 
                                            <span class='w3-text-red bold500'> 
                                                {{ ucfirst($schedule->batche ?? '') }} Batch 
                                            </span> 
                                        </h4> 
                                    </div>
                                    <h5 class="mb-0 fw-bold">
                                        {{ \Carbon\Carbon::parse($schedule->start_date)->format('M d') }}
                                        <sup>{{ \Carbon\Carbon::parse($schedule->start_date)->format('S') }}</sup>
                                        -
                                        {{ \Carbon\Carbon::parse($schedule->end_date)->format('M d') }}
                                        <sup>{{ \Carbon\Carbon::parse($schedule->end_date)->format('S') }}</sup>
                                    </h5>

                                    <p class="mb-0 small text-success fw-bold">
                                        <i class="ri-time-globe me-1"></i>
                                        {{ ucfirst($schedule->type ?? '') }} Batch
                                    </p>

                                    <p class="mb-0 small">
                                        <i class="ri-time-line"></i>
                                        @php
                                            $timezones = json_decode($schedule->country->timezones);
                                        @endphp
                                        {{ $timezones[0]->abbreviation }}
                                        {{ $schedule->starttime ?? 'N/A' }} - {{ $schedule->end_time ?? 'N/A' }}
                                        | {{ $schedule->total_days_of_training ?? '' }} Days
                                    </p>

                                    {{-- Trainer --}}
                                    <div class="d-flex align-items-center">
                                        @if($schedule->trainner_image)
                                            <img src="{{ asset('uploads/trainners/' . $schedule->trainner_image) }}"
                                                alt="Trainer" class="rounded-circle me-2" style="height:50px;width:50px;">
                                        @else
                                            <img src="{{ asset('frontend-assets/img/all-img/default.jpg') }}"
                                                alt="Trainer" class="rounded-circle me-2" style="height:50px;width:50px;">
                                        @endif
                                        <div>
                                            <p class="mb-0 fw-semibold">{{ $schedule->trainner_name ?? '' }}</p>
                                            <small class="text-muted">Language: {{ $schedule->language ?? 'English' }}</small>
                                        </div>
                                    </div>
                                </div>

                                {{-- MIDDLE SECTION --}}
                                <div class="col-md-4 text-center border-end">
                                    @if($course->upload_curriculum)
                                        <a data-bs-toggle="modal" data-course-id="{{ $course->id }}" data-bs-target="#curriculumModal"
                                            class="d-block mb-2 text-decoration-none text-primary" target="_blank">
                                            Download Curriculum 
                                            <i class="ri-download-2-line me-1"></i>
                                        </a>
                                    @endif
                                    <div class="d-flex justify-content-center align-items-center mb-2 mx-auto border border-2" 
                                    style="width: max-content;border-radius: 50px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                        <button class="btn btn-outline-secondary btn-sm counter-btn p-2" data-type="minus">-</button>
                                        <span class="mx-3 counter-value">1</span>
                                        <button class="btn btn-outline-secondary btn-sm counter-btn p-2" data-type="plus">+</button>
                                    </div>

                                <div class="d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('frontend-assets/img/all-img/alarm-clock.png') }}" alt="" width="20px">
                                        <p class="small text-danger fw-bold mb-0">
                                        &nbsp;  Only few seats left</p>
                                </div>
                                    <p class="small mt-1 mb-0">
                                        More than 5 Participants?
                                        <a class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#contactUsModal">
                                            Enquire Now.
                                        </a>
                                    </p>
                                </div>

                                {{-- RIGHT SECTION --}}
                                <div class="col-md-4 text-center">
                                    <small class="mb-1">
                                        <del>
                                            {{ $course->getCourseSchedule->country->currency ?? '' }}
                                            {{ $schedule->prices->original_price ?? 0 }}
                                        </del>
                                        @if($schedule->prices)
                                            <span class="text-success ms-2 fw-bold">
                                                {{ round(100 - ($schedule->prices->discount_price / $schedule->prices->original_price * 100)) }}% off
                                            </span>
                                        @endif
                                    </small>

                                    <h5 class="fw-bold mb-1">
                                        {{ $course->getCourseSchedule->country->currency ?? '' }}
                                        {{ $schedule->prices->discount_price ?? 0 }}
                                    </h5>

                                    <a href="{{ route('user.order.summary', ['id' => $schedule->id]) }}"
                                        class="btn btn-danger fw-bold enroll-btn px-3 py-2" style="border-radius: 5px; background: linear-gradient(90deg, #FF7E5F 0%, #FF3D3D 100%);">
                                        ENROLL NOW
                                    </a>
                                </div>
                            </div>
                        </div>

                        @if(($index + 1) % 4 == 0)
                            <div class="my-4 p-3 text-white text-center rounded-3 talkToUs">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('frontend-assets/img/all-img/help.png') }}" alt="" style="height: 50px;" class="me-3">
                                        <h5 class="mb-0 text-white">Struggling to identify an appropriate Schedule?</h5>
                                    </div>
                                    <a href="#contactUsModal" data-bs-toggle="modal"   class="btn btn-danger fw-bold enroll-btn px-3 py-2" style="border-radius: 5px; background: linear-gradient(90deg, #FF7E5F 0%, #FF3D3D 100%);">Talk to us</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- Pagination --}}
                    <div class="pagination-wrapper">
                        {{ $schedules->links() }}
                    </div>
                @else
                    <div class="no-data" style="padding: 20px; background: #f8d7da; color: #721c24; border-radius: 8px; text-align: center; margin-top: 20px;">
                        <i class="ri-error-warning-line" style="font-size: 24px;"></i>
                        <p style="margin: 10px 0 0;">No schedules found for the selected filters.</p>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="right-section p-0 mb-3">
                <div class="review-box">
                    <h3 class="text-white">Reviews</h3>
                    @php
                        $rating = round($course->average_rating); // uses accessor
                        $maxStars = 5;
                    @endphp
                    <ul class="d-flex list-unstyle customer-ratings justify-content-center">
                        @for ($i = 1; $i <= $maxStars; $i++)
                            @if ($i <= $rating)
                                <li><i class="ri-star-fill"></i></li>
                            @else
                                <li><i class="ri-star-line"></i></li>
                            @endif
                        @endfor
                        <li><span>({{ number_format($course->average_rating, 1) }})</span></li>
                    </ul>
                </div>
                @php 
                    $generalSetting = App\Models\Generalsettings::first();
                @endphp
                @if($generalSetting->display_offer)
                <div class="offer-box">
                    <img src="{{ asset('admin/display_offer/'. $generalSetting->display_offer) }}" class="w-100" alt="{{ $generalSetting->name }}">
                </div>
                @endif
                <div class="border rounded p-3">
                    <h4>Register for More Information</h4>
                    <form method="POST" class="mt-3" action="{{ route('lead') }}">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
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
                                <input type="text" class="form-control p-2" name="phone" placeholder="9090909090" required>
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
                            <input type="text" class="form-control" name="company_name" id="" placeholder="Company Name" >
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                            <label class="form-check-label" for="privacyPolicy">By providing your contact details,
                                you agree to our privacy policy</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary mt-4" data-animation="fadeInRight" data-delay=".8s" type="submit">
                                <span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span>
                            </button>
                        </div>
                    </form>     
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@push('modal')
<div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content overflow-hidden" style="border-radius: 10px;">
            <!-- <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <form method="post" action="{{ route('lead') }}">
                @csrf
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <!-- Left Section -->
                        <div class="d-none col-md-6 d-lg-flex flex-column justify-content-between bg-primary text-white">
                            <div class="p-4">
                                <h3 class="text-center" style="color: #012833">Corporate Training</h3>
                                <p class="mb-4 text-center" style="color: #012833">Upskill or reskill your teams</p>
                                <ul class="list-unstyled" style="list-style: none;">
                                    <li style="color: #012833"><i class="ri-arrow-right-s-fill"></i> Flexible pricing & billing options</li>
                                    <li style="color: #012833"><i class="ri-arrow-right-s-fill"></i> Private cohorts available</li>
                                    <li style="color: #012833"><i class="ri-arrow-right-s-fill"></i> Training progress dashboards</li>
                                    <li style="color: #012833"><i class="ri-arrow-right-s-fill"></i> Skills assessment & benchmarking</li>
                                    <li style="color: #012833"><i class="ri-arrow-right-s-fill"></i> Platform integration capabilities</li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend-assets/img/all-img/meeting.png') }}" alt="Meeting" class="img-fluid mt-3">
                        </div>

                        <!-- Right Section -->
                        <div class="col-md-6 bg-white p-4">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="fw-bold text-center" id="contactUsModalLabel" style="color: rgba(33, 37, 41, 0.75);">Get a Quote</h4>
                            <p class="small text-muted mb-3">Fill in the details to get a callback from our team</p>
                            <input type="hidden" name="type" value="enquiry">

                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="First Name *" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email *" required>
                            </div>
                            <div class="input-group mb-3">
                                <select name="country_code" class="form-select select2" required>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->phonecode }}">+{{ $country->phonecode }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number *" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="learners" placeholder="Number of Learners (2 or above) *" required>
                            </div>
                            <div class="mb-3 d-block">
                                <input type="number" class="form-control" name="company_name" placeholder="Company Name" required>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                                <label class="form-check-label small" for="privacyPolicy">
                                    By providing your contact details, you agree to our
                                    <a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a>.
                                </label>
                            </div>
                            <button class="btn btn-primary w-100 fw-bold" type="submit">
                                Enquire Now
                                <i class="fa fa-spinner fa-spin ms-2" id="submitSpin" style="display:none;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  
@endpush

@push('style')
<style>
    span.select2-selection.select2-selection--single {
        border: none !important;
        border-bottom: 1px solid #ccc !important;
        height: 41px !important;
        padding-top: 7px;
        margin-top: 5px;
        border-radius: 0 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px !important;
    }

    .modal span.select2-selection.select2-selection--single {
        width: 75px;
    }
    #contactUsModal .modal-dialog {
        max-width: 800px !important;
    }
    .tooltip-inner {
        background-color: #fff !important; /* Dark background */
        color: #000 !important; /* White text */
        font-size: 14px;
        padding: 10px 15px;
        border-radius: 8px;
        max-width: 250px;
        text-align: left;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .tooltip-arrow::before {
        border-top-color: #fff !important; /* Match background */
    }
    .talkToUs{
       background-color: #012833;
    }
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

@push('script')
<script>
    $('.modal-phone-flag').select2({
        dropdownParent: $('#contactUsModal')
    });

    $(document).ready(function () {
        let value = 1;

        // 🔹 Set default ?participants=1 on page load
        let enrollBtn = document.querySelector(".enroll-btn");
        if (enrollBtn) {
            let baseUrl = enrollBtn.getAttribute("href").split("?")[0];
            enrollBtn.setAttribute("href", baseUrl + "?participants=" + value);
        }

        $(".counter-btn").on("click", function () {
            let counter = $(this).closest("div").find(".counter-value");
            value = parseInt(counter.text()) || 1;

            if ($(this).data("type") === "plus") {
                value++;
            } else if ($(this).data("type") === "minus" && value > 1) {
                value--;
            }

            counter.text(value);
            if (enrollBtn) {
                let baseUrl = enrollBtn.getAttribute("href").split("?")[0];
                enrollBtn.setAttribute("href", baseUrl + "?participants=" + value);
            }
        });
    });
        
    $(document).on("change", "input[name='enquiry_for']", function () { 
        let $form = $(this).closest("form");           // scope to current form
        let $companyField = $form.find(".company_name"); 

        if ($(this).val() === "company") {
            $companyField.removeClass("d-none");
        } else {
            $companyField.addClass("d-none");
        }
    });

    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    });

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
@endpush

