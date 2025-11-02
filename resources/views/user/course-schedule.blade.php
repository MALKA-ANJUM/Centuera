@extends('user.layouts.layout')
@section('title', 'Schedules')
@section('content')
<section class="course-container-pmp">
    <div class="container p-0">
        <h2 class="schedule-heading">Schedule for {{ $course->title ?? 'Course' }}</h2>
        <h4 class="sparkling-box"><span><i class="ri-checkbox-circle-line"></i></span> {{ request('batche') }}</h4>
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

        {{-- Schedules --}}
        <div class="schedule-section">
            <div class="left-section">

                @if($schedules->count() > 0)
                @foreach($schedules as $schedule)
                <div class=" mb-3 shadow-sm border rounded-3">
                    <div class="row g-0 align-items-center p-3">

                        {{-- LEFT SECTION --}}
                        <div class="col-md-8 border-end pe-2">
                            <div class="batch-one d-flex justify-content-between">
                                <h4 class="ms-0">
                                    <span class='w3-text-red bold500'>
                                        {{ ucfirst($schedule->batche ?? '') }} Batch
                                    </span>
                                </h4>
                                <p class="mb-0 small text-success fw-bold">
                                    <i class="ri-time-globe me-1"></i>
                                    {{ ucfirst($schedule->type ?? '') }} Batch
                                </p>
                            </div>
                            {{-- Date & Batch --}}
                            <h5 class="mb-0 fw-bold text-primary">
                                {{ \Carbon\Carbon::parse($schedule->start_date)->format('M d') }}
                                <sup>{{ \Carbon\Carbon::parse($schedule->start_date)->format('S') }}</sup>
                                -
                                {{ \Carbon\Carbon::parse($schedule->end_date)->format('M d') }}
                                <sup>{{ \Carbon\Carbon::parse($schedule->end_date)->format('S') }}</sup>
                            </h5>
                           
                            {{-- Time & Duration --}}
                            <p class="mb-1">
                                <i class="ri-time-line me-1"></i> 
                                @php
			                        $timezones = json_decode($schedule->country->timezones, true);
                                @endphp
                                {{ $timezones[0]['abbreviation'] }}
                                {{ date("g:i A", strtotime($schedule->starttime)) }} - {{ date("g:i A", strtotime($schedule->end_time)) }} {{ $schedule->time_zone }}
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
                            <div class="d-flex justify-content-between">
                                 <a href="#" class="d-block mb-0 text-decoration-none text-primary fw-semibold">
                                    <i class="ri-download-2-line me-1"></i> Download Curriculum
                                </a>
                                <p class="mb-0">More than 5 Participants? <a class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#contactUsModal">Enquire Now.</a></p>
                            </div>
                        </div>

                        {{-- RIGHT SECTION --}}
                        <div class="col-md-4 text-center">
                            <h5 class="fw-bold text-success mb-1">{{ $course->getCourseSchedule && $course->getCourseSchedule->prices->country_id == 0 || $course->getCourseSchedule == null ? 'USD ' : $currency }} {{ $schedule->prices->discount_price ?? 0 }}</h5>
                            <p class="mb-1">
                                <del>{{ $course->getCourseSchedule && $course->getCourseSchedule->prices->country_id == 0 || $course->getCourseSchedule == null ? 'USD ' : $currency }} {{ $schedule->prices->original_price ?? 0 }}</del>
                                @if($schedule->prices != null)
                                <span class="badge bg-danger ms-2">
                                    {{ round(100 - ($schedule->prices->discount_price / $schedule->prices->original_price * 100)) }}% off
                                </span>
                                @endif
                            </p>
                            <!-- <form action="{{ route('checkout.session') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-75 fw-bold">
                                    ENROLL NOW
                                </button>
                            </form> -->

                            <a href="{{ route('user.order.summary', ['id' => $schedule->id]) }}" class="btn btn-danger w-75 fw-bold">
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
            <div class="right-section">
                <div class="review-box">
                    <h3>Reviews</h3>
                    <p>4.5</p>
                    <p>
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </p>
                </div>
                <div class="offer-box">
                    <h3>Limited Offer</h3>
                    <p>Save up to 33%</p>
                </div>
                <div class="info-form">
                    <h4>Register for More Information</h4>
                    <form action="#">
                        <input type="text" placeholder="Full Name*" required>
                        <div class="phone-input">
                            <select>
                                <option>+1</option>
                                <option>+91</option>
                                <option>+44</option>
                            </select>
                            <input type="text" placeholder="Phone Number*" required>
                        </div>
                        <input type="email" placeholder="Email*" required>
                        <textarea placeholder="Message"></textarea>
                        <button type="submit">Submit</button>
                        <div class="form-filed">
                            <p>
                                <input type="checkbox" checked>
                                By submitting your information, you agree to our Terms of Use and Privacy Policy.
                            </p>
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
@endpush