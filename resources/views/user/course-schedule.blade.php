@extends('user.layouts.layout')
@section('title', 'Schedules')
@section('content')
<section class="course-container-pmp">
    <div class="container p-0">
        <h2 class="schedule-heading">Schedule for {{ $course->title ?? 'Course' }}</h2>

        {{-- Schedules --}}
        <div class="schedule-section">
            <div class="left-section">
                <h4 class="sparkling-box"><span><i class="ri-checkbox-circle-line"></i></span> {{ request('batche') ?? 'Live Online Class, Classroom' }}</h4>
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
                @if($schedules->count() > 0)
                    @foreach($schedules as $schedule)
                        <div class="mb-3 shadow-sm border rounded-3">
                            <div class="row g-0 align-items-center p-3">
                                {{-- LEFT SECTION --}}
                                <div class="col-md-4 border-end pe-2">
                                    <div class="batch-one"> 
                                        <h4 class="ms-0"> 
                                            <span class='w3-text-red bold500'> 
                                                {{ ucfirst($schedule->batche ?? '') }} Batch 
                                            </span> 
                                        </h4> 
                                    </div>
                                    <h5 class="mb-0 fw-bold text-primary">
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

                                    <p class="mb-1 small">
                                        <i class="ri-time-line me-1"></i>
                                        @php
                                            $timezones = json_decode($schedule->country->timezones, true);
                                        @endphp
                                        {{ $timezones[0]['abbreviation'] ?? '' }}
                                        {{ date("g:i A", strtotime($schedule->starttime)) }} - 
                                        {{ date("g:i A", strtotime($schedule->end_time)) }} {{ $schedule->time_zone }}
                                        | {{ $schedule->total_days_of_training ?? '' }} Days
                                    </p>

                                    {{-- Trainer --}}
                                    <div class="d-flex align-items-center mb-1">
                                        <img src="{{ asset('uploads/trainners/' . ($schedule->trainner_image ?? 'default.png')) }}"
                                            alt="Trainer" class="rounded-circle me-2" style="height:50px;width:50px;">
                                        <div>
                                            <p class="mb-0 fw-semibold">{{ $schedule->trainner_name ?? '' }}</p>
                                            <small class="text-muted">Language: {{ $schedule->language ?? 'English' }}</small>
                                        </div>
                                    </div>
                                </div>

                                {{-- MIDDLE SECTION --}}
                                <div class="col-md-4 text-center border-end">
                                    <a href="#" class="d-block mb-2 text-decoration-none text-primary fw-semibold">
                                        <i class="ri-download-2-line me-1"></i> Download Curriculum
                                    </a>

                                    <div class="d-flex justify-content-center align-items-center mb-2 mx-auto border border-2 px-3 py-2" style="width: max-content;border-radius: 50px">
                                        <button class="btn btn-outline-secondary btn-sm counter-btn p-2" data-type="minus">-</button>
                                        <span class="mx-3 counter-value">1</span>
                                        <button class="btn btn-outline-secondary btn-sm counter-btn p-2" data-type="plus">+</button>
                                    </div>

                                    <p class="small text-danger fw-bold mb-0">Only few seats left</p>
                                    <p class="small mt-1 mb-0">
                                        More than 5 Participants?
                                        <a class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#contactUsModal">
                                            Enquire Now.
                                        </a>
                                    </p>
                                </div>

                                {{-- RIGHT SECTION --}}
                                <div class="col-md-4 text-center">
                                    <h5 class="fw-bold text-success mb-1">
                                        {{ $course->getCourseSchedule && $course->getCourseSchedule->prices->country_id == 0 || $course->getCourseSchedule == null ? 'USD ' : $currency }}
                                        {{ $schedule->prices->discount_price ?? 0 }}
                                    </h5>

                                    <p class="mb-1">
                                        <del>
                                            {{ $course->getCourseSchedule && $course->getCourseSchedule->prices->country_id == 0 || $course->getCourseSchedule == null ? 'USD ' : $currency }}
                                            {{ $schedule->prices->original_price ?? 0 }}
                                        </del>

                                        @if($schedule->prices != null)
                                            <span class="badge bg-danger ms-2">
                                                {{ round(100 - ($schedule->prices->discount_price / $schedule->prices->original_price * 100)) }}% off
                                            </span>
                                        @endif
                                    </p>

                                    <a href="{{ route('user.order.summary', ['id' => $schedule->id]) }}"
                                        class="btn btn-danger w-75 fw-bold enroll-btn">
                                        ENROLL NOW
                                    </a>
                                </div>
                            </div>
                        </div>
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
                    @php
                        $rating = round($course->rating);
                        $maxStars = 5;
                    @endphp
                    <h3 class="text-white">Reviews</h3>
                    <ul class="d-flex list-unstyle customer-ratings justify-content-center">
                        @for ($i = 1; $i <= $maxStars; $i++)
                            @if ($i <= $rating)
                                <li><i class="ri-star-fill"></i></li>
                            @else
                                <li><i class="ri-star-line"></i></li>
                            @endif
                        @endfor
                        <li><span>({{ $course->rating }})</span></li>
                    </ul>
                </div>
                @php 
                    $generalSetting = App\Models\Generalsettings::first();
                @endphp
                @if($generalSetting->display_offer != null)
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
                        <!--  <div class="form-group mt-3">
                                <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                            </div> -->
                        <div class="text-center">
                            <button class="btn btn-primary mt-4" data-animation="fadeInRight" data-delay=".8s" type="submit"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="contactUsModalLabel">Connect us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('lead') }}">
                @csrf
                <div class="modal-body row">
                    <div class="col-md-6">
                        <img src="{{ asset('frontend-assets/img/callback-popup.jpg') }}" alt="Contact Us">
                    </div>
                    <div class="col-md-6">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="type" value="enquiry">

                        <div class="mb-3">
                            <input type="text" class="form-control pb-0" name="name" placeholder="Name *" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control pb-0" name="email" placeholder="Email *" required>
                        </div>

                        <div class="input-group mb-3">
                            <select name="country_code" class="modal-phone-flag form-select rounded-start-3 me-0  pb-0" required>
                                @foreach($countries as $country)
                                <option
                                    value="{{ $country->phonecode }}"
                                    data-flag='{!! $country->flag !!}'
                                    data-id="{{ $country->id }}">
                                    +{{ $country->phonecode }} {!! $country->flag !!}
                                </option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control p-2 pb-0" name="phone" placeholder="Mobile *" required>
                        </div>

                        <div class="mb-2 enquiry-field">
                            <label class="form-label fw-semibold">Enquiry for:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="enquiry_for" value="myself" id="enquiryMyself">
                                <label class="form-check-label" for="enquiryMyself">Myself</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="enquiry_for" value="company" id="enquiryCompany">
                                <label class="form-check-label" for="enquiryCompany">My Company</label>
                            </div>
                        </div>

                        <!-- Company name -->
                        <div class="mb-3 company_name d-none">
                            <input type="text" class="form-control" name="company_name" id="" placeholder="Company Name" >
                        </div>

                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                            <label class="form-check-label" for="privacyPolicy">
                                By providing your contact details, you agree to our
                                <a href="/privacy-policy" target="_blank">Privacy Policy</a>.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" data-animation="fadeInRight" data-delay=".8s" type="submit"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
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
    .modal-dialog {
        max-width: 800px !important;
    }
</style>
@endpush
<!-- Same CSS as callback modal -->

@push('script')
<script>
    $('.modal-phone-flag').select2({
        dropdownParent: $('#contactUsModal')
    });
</script>
<script>
$(document).ready(function () {
    $(".counter-btn").on("click", function () {
        let counter = $(this).closest("div").find(".counter-value");
        let value = parseInt(counter.text());

        if ($(this).data("type") === "plus") {
            value++;
        } else if ($(this).data("type") === "minus" && value > 1) {
            value--;
        }

        counter.text(value);
        let enrollBtn = document.querySelector(".enroll-btn"); // ✅ class added to button
        let baseUrl = enrollBtn.getAttribute("href").split("?")[0]; 
        enrollBtn.setAttribute("href", baseUrl + "?participants=" + value);
    });
});
$(document).on("change", "input[name='enquiry_for']", function () { debugger;
    let $form = $(this).closest("form");           // scope to current form
    let $companyField = $form.find(".company_name"); 

    if ($(this).val() === "company") {
        $companyField.removeClass("d-none");
    } else {
        $companyField.addClass("d-none");
    }
});
</script>

@endpush