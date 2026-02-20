@extends('user.layouts.layout')
@section('title', ($courseDetails->getSeoData->meta_title ?? $courseDetails->title) . ' | Centuera')
@section('meta_description', $courseDetails->getSeoData->meta_description ?? '')
@section('meta_keywords', $courseDetails->getSeoData->meta_keyword ?? '')
@section('content')
<!-- Courses Section Start -->
<div class="container" id="course-section-start">
    <div class="row courses-demo-container px-0 pt-3">
        <div class="col-md-6 left-course-container px-0">
            <h1>{{ $courseDetails->title ?? '' }}</h1>
            <h6>{!! $courseDetails->short_description !!}</h6>
                @php
                    $descriptionWithChecks = preg_replace(
                        '/<(p|li)>(.*?)<\/(p|li)>/i',
                        '<$1 class="d-flex"><span><i class="ri-checkbox-circle-line pe-2"></i></span> $2</$1>',
                        $courseDetails->description
                    );
                @endphp
                {!! $descriptionWithChecks !!}

            <div class="demo-course-btn d-flex flex-wrap">
                <a class="demo-course-btn-one text-center" href="#view_schedule">View Training Options</a>
                <button class="demo-course-btn-two" data-bs-toggle="modal" data-bs-target="#talktoOurAdvisor">Talk to
                    our advisor</button>
                <a href="{{ route('user.course.schedule', $courseDetails->slug) }}" class="demo-course-btn-two" style="border: 1px solid orangered; color: orangered">View Schedules</a>
            </div>

            <div class="training-team">
                <a>Want to Train your team? : <span class="get-quote" data-bs-toggle="modal"
                        data-bs-target="#contactUsModal">Get a quote</span></a>
            </div>
            @php
            $authorized_training_partner = json_decode($courseDetails->authorized_training_partner, true);
            @endphp
            @if($authorized_training_partner != null)

            <div class="patp-course">
                <p class="patp-course-text">Premier Authorized Training Partner</p>
            </div>

            <div class="project-institute">
                    @foreach($authorized_training_partner as $partners)
                    <div class="project-institute">
                        <img src="{{ asset('uploads/premier_partner/' . $partners['image']) }}" style="width: 75px; height: auto;"
                            alt="Project Management Institute">
                        <h4 class="project-institute-text">{{ $partners['text'] }}</h4>
                    </div>
                    @endforeach
            </div>
            @endif
        </div>

        <div class="col-md-6 right-course-container">
            <img src="{{ asset('uploads/cover_image/'. $courseDetails->cover_image) }}" alt="Course Image">
            <div class="right-course d-flex flex-wrap">
                <button class="right-course-btn-1 d-flex align-items-center">
                    <span><i class="ri-user-2-fill text-primary"></i></span>&nbsp;
                    <span>
                        {{ number_format($courseDetails->learner_field + $courseDetails->getRating->count()) }} Learners
                    </span>
                </button>
                <button class="right-course-btn-2 d-flex align-items-center"><span><i
                            class="ri-star-fill text-warning"></i></span>&nbsp;<span class="">
                                <!-- {{ round($courseDetails->rating) }} -->
                            </span>&nbsp;{{ number_format($courseDetails->number_of_user_rating ?? 0) }}
                    Ratings</button>
            </div>
        </div>
    </div>
</div>

<!-------------------section-2 ------------------->
<section class="container">
    <div class="row">
        <div class="pmp-course-left-text col-md-8 px-3 px-md-0">
            <h2>{{ $courseDetails->short_title }} Overview</h2>
            <p>{!! $courseDetails->overview !!}</p>

            <div class="pmp-course-left-btn">
                @if($courseDetails->exam_pass_guarantee != null)
                <div class="tooltip-container">
                    <button class="pmp-course-left-btn-design">
                        <span class="me-2"><i class="ri-survey-fill"></i></span>Exam Pass Guarantee
                        <span class="me-2"><i class="ri-information-fill"></i></span>
                    </button>
                    <div class="tooltip-box">
                        {!! $courseDetails->exam_pass_guarantee !!}
                    </div>
                </div>
                @endif
                @if($courseDetails->money_back_guarantee != null)
                <div class="tooltip-container">
                    <button class="pmp-course-left-btn-design">
                        <span class="me-1"><i class="ri-money-dollar-circle-line"></i></span>100% Money Back
                        Guarantee
                        <span class="me-1"><i class="ri-information-fill"></i></span>
                    </button>
                    <div class="tooltip-box">
                        {!! $courseDetails->money_back_guarantee !!}
                    </div>
                </div>
                @endif
            </div>
            @if($courseDetails->keyFeatures->count() > 0)
            <h2 class="mt-5">Key Features</h2>
            <div class="Course-Key-Features mt-3 d-flex flex-wrap">
                @foreach($courseDetails->keyFeatures->chunk(ceil($courseDetails->keyFeatures->count()/2)) as $featuresChunk)
                <div class="Course-key-features-{{ $loop->first ? 'left' : 'right' }}">
                    @foreach($featuresChunk as $feature)
                    <p><span><i class="ri-checkbox-circle-line"></i></span> {{ $feature->feature }}</p>
                    @endforeach
                </div>
                @endforeach
            </div>
            @endif

            @if($courseDetails->skillsCovered->count() > 0)
            <h2 class="mt-4">Skills Covered</h2>
            <div class="d-flex flex-wrap">
                @foreach($courseDetails->skillsCovered->chunk(ceil($courseDetails->skillsCovered->count()/2)) as $skillsChunk)
                <div class="col-md-6 skills-covered">
                    @foreach($skillsChunk as $skill)
                    <p><span><i class="ri-checkbox-circle-line"></i></span> {{ $skill->skill_name }}</p>
                    @endforeach
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="pmp-course-table col-md-4">
           @php
            $classroomSchedule = $courseDetails->getCourseScheduleMany
                ->where('batche', 'Classroom')
                ->sortBy('start_date')
                ->first();

            $onlineSchedule = $courseDetails->getCourseScheduleMany
                ->where('batche', 'Live Online Class')
                ->sortBy('start_date')
                ->first();

            if ($classroomSchedule && $classroomSchedule->prices) {
                $discountPercentageOfClassroom = 
                    (($classroomSchedule->prices->original_price - $classroomSchedule->prices->discount_price) 
                    / $classroomSchedule->prices->original_price) * 100;
            }

            if ($onlineSchedule && $onlineSchedule->prices) {
                $discountPercentageOfOnline = 
                    (($onlineSchedule->prices->original_price - $onlineSchedule->prices->discount_price) 
                    / $onlineSchedule->prices->original_price) * 100;
            }
            @endphp

            {{-- Upcoming Classroom Card --}}
            @if($classroomSchedule != null)
                <div class="card px-2 py-2 position-relative rounded-3 border-0 card-nbg12 mb-4">
                    <div class="train_forms fs-6 fw-bold text-nowrap mb-0">
                        Upcoming Classroom Schedule
                    </div>
                    <img src="{{ asset('frontend-assets/img/all-img/line1.png') }}" alt="star" width="166" height="2">
                    <div class="ribbon-container position-absolute">
                        <img class="ribbon1 position-absolute" src="{{ asset('frontend-assets/img/all-img/stickbadge.png') }}" alt="ribbon" width="90" height="94">
                        <span class="ribbon-text position-absolute text-nowrap fw-bold text-white">{{ round($discountPercentageOfClassroom) }}% OFF</span>
                    </div>
                    <p class="mb-0 text-truncate-multiline1 w-90 trainer-fs1">{{ $courseDetails->title  }}</p>
                    <div class="d-flex gap-1">
                        <div class="d-flex flex-column crd-left-wdth">
                            <div class="d-flex align-items-start flex-column">
                                <div class="d-flex align-items-baseline gap-1">
                                    <i class="ri-time-line" style="color: #bf6022;"></i>
                                    <p id="dateValue" class="pt-0 slot-fs mb-0">
                                        {{ \Carbon\Carbon::parse($classroomSchedule->start_date)->format('M d') }} -
                                        {{ \Carbon\Carbon::parse($classroomSchedule->end_date)->format('M d, Y') }} |
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <div class="d-flex align-items-baseline gap-1">
                                    <i class="ri-calendar-line" style="color: #bf6022;"></i>
                                    <p id="dateValue" class="pt-0 slot-fs mb-0">
                                        @php
                                            $timezones = collect(json_decode($classroomSchedule->country->timezones, true));
                                            $timezone = $timezones->firstWhere('zoneName', $classroomSchedule->time_zone);
                                        @endphp
                                        {{ $timezone['abbreviation'] }}
                                        {{ \Carbon\Carbon::parse($classroomSchedule->starttime)->format('h:i A') }} -
                                        {{ \Carbon\Carbon::parse($classroomSchedule->end_time)->format('h:i A') }}
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <img id="trainer-fs-img" class="rounded-circle" 
                                    src="{{ $classroomSchedule->trainner_image 
                                            ? asset('uploads/trainners/'.$classroomSchedule->trainner_image) 
                                            : asset('frontend-assets/img/all-img/default.jpg') }}" 
                                    alt="trainer" width="40px" height="40px">
                                <a id="trainer-fs" href="#" class="">{{ $classroomSchedule->trainner_name ?? 'Trainer TBD' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <div id="orig-price" class="fs-65 fw-bold">
                            {{ $classroomSchedule->country->currency  }} {{ number_format($classroomSchedule->prices->discount_price, 2) }}
                        </div>
                        <del>{{ $classroomSchedule->country->currency  }} {{ number_format($classroomSchedule->prices->original_price, 2) }}</del>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2 gap-3">
                        <a href="{{ route('user.order.summary', $classroomSchedule->id) }}?participants=1" class="btn btn-primary fw-bold enroll-btn px-3 py-2"
                            style="border-radius: 5px; width:max-content">
                            ENROLL NOW
                        </a>
                        <a href="{{ route('user.course.schedule', $courseDetails->slug) }}" class="d-flex align-items-center text-nowrap gap-1 crds-12">
                            <span>View all Schedules <i class="fa-regular fa-chevrons-right fs-6 mt-1 crds-12"></i></span>
                        </a>
                    </div>
                </div>
            @endif

            {{-- Upcoming Online Bootcamp Card --}}
            @if($onlineSchedule)
                <div class="card px-2 py-2 position-relative rounded-3 border-0 card-nbg12 mb-4">
                    <div class="train_forms fs-6 fw-bold text-nowrap mb-0">
                        Upcoming Online Schedule
                    </div>
                    <img src="{{ asset('frontend-assets/img/all-img/line1.png') }}" alt="star" width="166" height="2">
                    <div class="ribbon-container position-absolute">
                        <img class="ribbon1 position-absolute" src="{{ asset('frontend-assets/img/all-img/stickbadge.png') }}" alt="ribbon" width="90" height="94">
                        <span class="ribbon-text position-absolute text-nowrap fw-bold text-white">{{ round($discountPercentageOfOnline) }}% OFF</span>
                    </div>
                    <p class="mb-0 text-truncate-multiline1 w-90 trainer-fs1">{{ $courseDetails->title }}</p>
                    <div class="d-flex gap-1">
                        <div class="d-flex flex-column crd-left-wdth">
                            <div class="d-flex align-items-start flex-column">
                                <div class="d-flex align-items-baseline gap-1">
                                    <i class="ri-time-line" style="color: #bf6022;"></i>
                                    <p id="dateValue" class="pt-0 slot-fs mb-0">
                                        {{ \Carbon\Carbon::parse($onlineSchedule->start_date)->format('M d') }} -
                                        {{ \Carbon\Carbon::parse($onlineSchedule->end_date)->format('M d, Y') }} |
                                    </p>
                                </div>
                            </div>
                        
                            <div class="d-flex align-items-start flex-column">
                                <div class="d-flex align-items-baseline gap-1">
                                    <i class="ri-calendar-line" style="color: #bf6022;"></i>
                                    <p id="dateValue" class="pt-0 slot-fs mb-0">
                                        <!-- {{ $onlineSchedule->time_zone }} -->
                                        @php
                                            $timezones = collect(json_decode($onlineSchedule->country->timezones, true));
                                            $timezone = $timezones->firstWhere('zoneName', $onlineSchedule->time_zone);
                                        @endphp
                                        {{ $timezone['abbreviation'] }}
                                        {{ \Carbon\Carbon::parse($onlineSchedule->starttime)->format('h:i A') }} -
                                        {{ \Carbon\Carbon::parse($onlineSchedule->end_time)->format('h:i A') }}
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <img id="trainer-fs-img" class="rounded-circle" 
                                    src="{{ $onlineSchedule->trainner_image 
                                            ? asset('uploads/trainners/'.$onlineSchedule->trainner_image) 
                                            : asset('frontend-assets/img/all-img/default.jpg') }}" 
                                    alt="trainer" width="40px" height="40px">
                                <a id="trainer-fs" href="#" class="">{{ $onlineSchedule->trainner_name ?? 'Trainer TBD' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <div id="orig-price" class="fs-65 fw-bold">
                            {{ $onlineSchedule->country->currency }} {{ number_format($onlineSchedule->prices->discount_price, 2) }}
                        </div>
                        <del>{{ $onlineSchedule->country->currency }} {{ number_format($onlineSchedule->prices->original_price, 2) }}</del>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2 gap-3">
                        <a href="{{ route('user.order.summary', $onlineSchedule->id) }}?participants=1" class="btn btn-primary fw-bold enroll-btn px-3 py-2" 
                            style="border-radius: 5px; width:max-content">
                            ENROLL NOW
                        </a>
                        <a href="{{ route('user.course.schedule', $courseDetails->slug) }}" class="d-flex align-items-center text-nowrap gap-1 crds-12">
                            <span>View all Schedules <i class="fa-regular fa-chevrons-right fs-6 mt-1 crds-12"></i></span>
                        </a>
                    </div>
                </div>
            @endif

            <div class="cohort-form">
                @if($courseDetails->getCourseSchedule != null)
                <div class="real-cohort-form" data-start-date="{{ $courseDetails->getCourseSchedule->start_date }}">
                    <h1>Next Cohort Starts on {{($courseDetails->getCourseSchedule->start_date)->format('d-m-Y')}}</h1>
                    <div class="countdown">
                        <div class="time-box">
                            <div class="heading">Days</div>
                            <div class="number days">00</div>
                        </div>
                        <div class="time-box">
                            <div class="heading">Hours</div>
                            <div class="number hours">00</div>
                        </div>
                        <div class="time-box">
                            <div class="heading">Minutes</div>
                            <div class="number minutes">00</div>
                        </div>
                        <div class="time-box">
                            <div class="heading">Seconds</div>
                            <div class="number seconds">00</div>
                        </div>
                    </div>
                </div>
                @endif
                <form method="POST" action="{{ route('lead') }}" class="courseLead">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $courseDetails->id }}">
                    <input type="hidden" name="type" value="lead">
                    <div class="form-group">
                        <input type="text" placeholder="Name*" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email*" name="email" required>
                    </div>
                    <div class="form-group">
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
                            <input type="text" class="form-control p-2" id="phone" name="phone" placeholder="9090909090" required>
                        </div>
                    </div>
                    <!-- Google reCAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}"></div>

                    <button type="submit" class="btn-primary">Submit</button>
                </form>

                <div class="form-group">
                    {{-- <button type="submit" class="btn-primary" data-bs-toggle="modal"
                            data-bs-target="#contactUsModal">Talk to Advisor</button> --}}

                </div>
                <div class="info-text">
                    <p>By providing your contact details, you agree to our
                        <a href="{{ route('privacy.policy') }}">
                            <span class="info-text-span">
                                Privacy Policy
                            </span>
                        </a>
                    </p>
                </div>
                <div class="form-group">
                    <a href="{{ route('user.course.schedule', $courseDetails->slug) }}" type="button" id="viewSchedulesBtn" class="btn rounded fw-light" style="border: 1px solid orangered; color: orangered">View Schedules</a>
                </div>
                </form>
            </div>

            <div class="skills-covered-right-content">
                <h4>Corporate Training</h4>
                <h6>Enterprise training for teams</h6>
                <button data-bs-toggle="modal" data-bs-target="#contactUsModal">Get a quote</button>

            </div>
        </div>
    </div>
</section>

<!-----------------benefits-section---------------->
@php
use Illuminate\Support\Str;

$benefitsData = [];
foreach ($courseDetails->getBenefits as $i => $benefit) {
$salary = json_decode($benefit->salary, true);
if (is_string($salary)) {
$salary = json_decode($salary, true);
}
$salary = is_array($salary) ? $salary : [];

$company = json_decode($benefit->company, true);
if (is_string($company)) {
$company = json_decode($company, true);
}
$company = is_array($company) ? $company : [];

$companies = array_map(function ($logo) {
return asset('uploads/company_images/' . ltrim($logo, '/'));
}, $company);

// key to reference this benefit in JS
$key = Str::slug($benefit->designation) ?: ('role' . $i);

$benefitsData[$key] = [
'designation' => $benefit->designation,
'salary' => [
'min' => $salary['min'] /1000 ?? 0 ,
'avg_min' => $salary['avg_min'] / 1000 ?? 0,
'average' => $salary['average'] / 1000 ?? 0,
'avg_max' => $salary['avg_max'] / 1000 ?? 0,
'max' => $salary['max'] /1000 ?? 0,
],
'companies' => $companies,
];
}
@endphp
@if($courseDetails->getBenefits->count() > 0)
<section class="container">
    <h2>Benefits</h2>
    <div class="col-md-8">
        {!! $courseDetails->benefits !!}
    </div>
    <div class="row text-center">
        <div class="col-md-4">
            <h4>Designation</h4>
            <ul class="designation-list">
                @foreach($courseDetails->getBenefits as $i => $benefit)
                @php $key = \Illuminate\Support\Str::slug($benefit->designation) ?: ('role' . $i); @endphp
                <li data-role="{{ $key }}">{{ $benefit->designation }}</li>
                @endforeach
            </ul>

        </div>

        <div class="col-md-4">
            <h4>Annual Salary</h4>
            <div class="chart-container mt-4">
                <canvas id="salaryChart"></canvas>
            </div>
        </div>

        <div class="col-md-4">
            <h4>Hiring Companies</h4>
            <div id="companyLogos" class="company-logos mt-5"></div>
        </div>
    </div>
</section>
@endif

<!--------------------Training-option-------------------->
@if($courseDetails->training_course != null)
<section class="container" id="view_schedule">
    <div class="d-flex justify-content-between mb-2">
        <h2>Training Option</h2>
        <div class="city d-flex justify-content-between align-items-center">
            <span class="cityName text-nowrap me-3"></span>
            <button class="btn btn-primary mb-0" id="chooseCityBtn">Change City</button>
        </div>
    </div>

  <div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 100%; max-width: 400px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="cityModalLabel">Select Your City</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="cityForm">
                    <div class="mb-3">
                        <label for="countrySelect" class="form-label">Country</label>
                        <select class="form-select" id="countrySelect" disabled></select>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="cityInput" class="form-label">City</label>
                        <input type="text" id="cityInput" class="form-control" placeholder="Type city name..." autocomplete="off" required>
                        <div id="citySuggestions" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveCity">Submit</button>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        @foreach(json_decode($courseDetails->training_course) as $key => $course)
        @if($course->status == 1)

        {{-- Handle each course type once --}}
        @switch($key)
            {{-- CLASSROOM --}}
            @case('classroom')
                 @if(!empty($price['Classroom']) && !empty($price['Classroom']->prices))
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $course->level_name }}</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $descriptionWithChecks = preg_replace(
                                    '/<(p|li)>(.*?)<\/(p|li)>/i',
                                    '<$1 class="d-flex pe-2"><span><i class="ri-checkbox-circle-line pe-2"></i></span> $2</$1>',
                                    $course->description
                                );
                            @endphp

                            {!! $descriptionWithChecks !!}


                                <h5>Batch starting from:</h5>
                                <p>
                                    {{ isset($price['Classroom']->start_date) 
                                        ? \Carbon\Carbon::parse($price['Classroom']->start_date)->format('jS M') 
                                        : '' }},
                                        {{ $price['Classroom']->type ?? '' }} Class
                                    </p>
                                    <a class="text-primary text-decoration-underline"
                                href="{{ route('user.course.schedule', $courseDetails->slug) . '?' . http_build_query([
                                        'type'   => '',
                                        'month'  => '',
                                        'batche' => 'Classroom'
                                ]) }}">
                                    View all schedules
                                </a>
                        </div>
                        <div class="card-footer">
                            @php
                                $original = $price['Classroom']->prices->original_price ?? '';
                                $discount = $price['Classroom']->prices->discount_price ?? 0;
                                $percentOff = ($original > 0)
                                    ? round((($original - $discount) / $original) * 100)
                                    : '';
                            @endphp
                            <div class="price-info">
                                @if($percentOff > 0)
                                    <p><i class="ri-discount-percent-fill"></i> {{ $percentOff }}% off</p>
                                @endif
                                <h5>
                                    <strong>
                                        {{ $courseDetails->getCourseSchedule->country->currency ?? '' }}  {{ $discount }}
                                    </strong>
                                    <span class="strike-price">
                                        {{ $courseDetails->getCourseSchedule->country->currency ?? '' }} {{ $original }}
                                    </span>
                                </h5>
                            </div>
                            <a  href="{{ route('user.course.schedule', $courseDetails->slug) . '?' . http_build_query([
                                        'type'   => '',
                                        'month'  => '',
                                        'batche' => 'Classroom'
                                ]) }}"
                                 class="btn enroll-button">Enroll Now</a>
                        </div>
                    </div>
                </div>
                @endif
            @break


            {{-- ONLINE BOOTCAMP --}}
            @case('online_bootcamp')
                @if(!empty($price['Live Online Class']) && !empty($price['Live Online Class']->prices))
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            <h4>{{ $course->level_name }}</h4>
                        </div>
                        <div class="card-body">
                             @php
                                $descriptionWithChecks = preg_replace(
                                    '/<(p|li)>(.*?)<\/(p|li)>/i',
                                    '<$1 class="d-flex"><span><i class="ri-checkbox-circle-line pe-2"></i></span> $2</$1>',
                                    $course->description
                                );
                            @endphp

                            {!! $descriptionWithChecks !!}

                                <h5>Batch starting from:</h5>
                                <p>
                                    {{ !empty($price['Live Online Class']->start_date) 
                                        ? \Carbon\Carbon::parse($price['Live Online Class']->start_date)->format('jS M') 
                                        : '' }},
                                    {{ $price['Live Online Class']->type ?? '' }} Class
                                </p>
                                <a class="text-primary text-decoration-underline"
                                href="{{ route('user.course.schedule', $courseDetails->slug) . '?' . http_build_query([
                                        'type'   => '',
                                        'month'  => '',
                                        'batche' => 'Live Online Class'
                                ]) }}">
                                    View all schedules
                                </a>
                        </div>
                        <div class="card-footer">
                            @php
                                $original = $price['Live Online Class']->prices->original_price ?? '';
                                $discount = $price['Live Online Class']->prices->discount_price ?? 0;
                                $percentOff = ($original > 0)
                                    ? round((($original - $discount) / $original) * 100)
                                    : 0;
                            @endphp
                            <div class="price-info">
                                @if($percentOff > 0)
                                    <p><i class="ri-discount-percent-fill"></i> {{ $percentOff }}% off</p>
                                @endif
                                <h5>
                                    <strong>{{ $courseDetails->getCourseSchedule->country->currency ?? '' }}  {{ $discount }}</strong>
                                    <span class="strike-price">{{ $courseDetails->getCourseSchedule->country->currency ?? '' }}  {{ $original }}</span>
                                </h5>
                            </div>
                            <a href="schedule.html">
                                <a href="{{ route('user.course.schedule', $courseDetails->slug) . '?' . http_build_query([
                                        'type'   => '',
                                        'month'  => '',
                                        'batche' => 'Live Online Class'
                                ]) }}" 
                                class="btn enroll-button">Enroll Now</a>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @break


            {{-- CORPORATE --}}
            @case('corporate')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $course->level_name }}</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $descriptionWithChecks = preg_replace(
                                    '/<(p|li)>(.*?)<\/(p|li)>/i',
                                    '<$1 class="d-flex"><span><i class="ri-checkbox-circle-line pe-2"></i></span> $2</$1>',
                                    $course->description
                                );
                            @endphp
                            {!! $descriptionWithChecks !!}
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactUsModal">
                                Know More
                            </button>
                        </div>
                    </div>  
                </div>
            @break

        @endswitch
        @endif
        @endforeach
    </div>
</section>
@endif

<!-------------------------faqssss---------------------->
<div class="container mt-5">
    <div class="row">
        <!-- Left Section -->
        <div class="col-md-8">
            <h2>{{ $courseDetails->short_title }} Curriculum</h2>
            <h4 class="mt-5">Eligibility</h4>
            {!! $courseDetails->eligibility !!}

            <h4 class="mt-3">Pre-requisites</h4>
            {!! $courseDetails->prerequisites !!}
            @if($courseDetails->getCourseCurriculum->count() > 0)
            <h4 class="mt-3 mb-2">Learning Path</h4>
            <div id="accordion">
                @foreach($courseDetails->getCourseCurriculum as $index => $curriculum)
                @php
                $headingId = 'heading' . $index;
                $collapseId = 'collapse' . $index;
                @endphp

                <div class="accordion-item {{ $index >= 3 ? 'd-none extra-curriculum' : '' }}">
                    <div class="accordion-item-header" id="{{ $headingId }}" data-bs-toggle="collapse"
                        data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="{{ $collapseId }}">
                        <p class="mb-0">
                            <span><i class="ri-add-line"></i></span>
                            {{ $curriculum->title }}
                            <button class="preview-btn">Preview</button>
                        </p>
                    </div>

                    <div id="{{ $collapseId }}"
                        class="collapse {{ $index === 0 ? 'show' : '' }}"
                        aria-labelledby="{{ $headingId }}"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            {!! $curriculum->description !!}
                        </div>
                    </div>
                </div>
                @endforeach

                @if($courseDetails->getCourseCurriculum->count() > 3)
                <div class="text-center mt-2">
                    <button class="view-more" id="toggleCurriculum">View More</button>
                </div>
                @endif

                <div class="schedule-btn d-flex flex-wrap">
                    @if($courseDetails->upload_curriculum != null)
                        <button class="schedule-btn-one"  data-bs-toggle="modal"
                            data-bs-target="#curriculumModal">Download Syllabus</button>
                    @endif
                    <a class="schedule-btn-two" href="{{ route('user.course.schedule', $courseDetails->slug) }}">View Schedules</a>
                </div>
            </div>
            @endif
        </div>

        <!-- Right Section -->
        <div class="col-md-4">
            @if($tollFreeNumber !=null)
                <div class="contact-box d-flex align-items-center justify-content-between bg-white border rounded shadow-sm p-4">
                    <div class="contact-box-left border-right">
                        <p class="mb-1 text-muted">Contact Us</p>
                        @php
                            $formattedNumber = substr($tollFreeNumber, 0, 3) . '-' . 
                                            substr($tollFreeNumber, 3, 3) . '-' . 
                                            substr($tollFreeNumber, 6);
                        @endphp
                        <h4 class="mb-1 text-nowrap fw-light" style="letter-spacing: 1.5px;"> {{ $formattedNumber }}</h4>
                        <p class="mb-1 text-muted">(Toll Free)</p>
                    </div>
                    <div class="contact-box-right d-flex align-items-center justify-content-center" style="border-left: 1px solid #abb2b8bf;padding-left: 10px">
                        <span class="text-primary d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                            <i class="ri-phone-fill fs-1"></i>
                        </span>
                    </div>
                </div>   
            @endif

            <div class="info-box">
                <h5 class="text-center">Request More Information</h5>
                <form method="POST" class="mt-3 courseLead" action="{{ route('lead') }}">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $courseDetails->id }}">
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

<!------------------pmp-certificate-section---------------------->
<div class="container mt-5">
    <div class="row">
        <!-- Left Section -->
        <div class="col-md-6">
            <h3>{{ $courseDetails->short_title }} Exam and Certification</h3>
            @if($courseDetails->getCourseCertificate->count() > 0)
            <div class="accordion mt-4" id="certificateExample">
                @foreach($courseDetails->getCourseCertificate as $index => $certificate)
                @php
                $headingId = 'heading' . $index;
                $collapseId = 'collapse' . $index;
                @endphp

                <div class="accordion-item course-certificate {{ $index >= 3 ? 'd-none extra-certificate' : '' }}">
                    <h2 class="accordion-header" id="{{ $headingId }}">
                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#{{ $collapseId }}"
                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-controls="{{ $collapseId }}">
                            {{ $certificate->title }}
                        </button>
                    </h2>
                    <!-- class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" -->
                    <div id="{{ $collapseId }}"
                        class="accordion-collapse collapse"
                        aria-labelledby="{{ $headingId }}"
                        data-bs-parent="#certificateExample">
                        <div class="accordion-body">
                            {!! $certificate->description !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($courseDetails->getCourseCertificate->count() > 3)
            <div class="d-flex justify-content-center mt-1">
                <button class="read-more-btn" id="toggleCertificates">Read More</button>
            </div>
            @endif
            @endif

        </div>
        <!-- Right Section -->
        <div class="col-md-6">
            <div class="asymmetric-box">
                <img src="{{ asset('uploads/certifications/'. $courseDetails->certification_image) }}" alt="PMP Certificate" class="certificate-img">
            </div>
        </div>
    </div>
</div>

<!---------------Trusted-companies-section----------------->
<div class="container">
    <div class="trusted-company-container">
        <div class="text-section">
            <h6>TRANSFORM YOUR WORKSPACE</h6>
            <h2 class="mt-4">Supercharge Your Business with Skilled Teams </h2>
            <p class="mt-4"> {{ $courseDetails->business_with_skilled }} </p>

            <button class="btn style-three border rounded" data-bs-toggle="modal" data-bs-target="#contactUsModal">Skill
                Up Your Teams ></button>

        </div>
        <div class="logo-section-wrapper">
            <div class="logo-section">
                @foreach($courseDetails->trustedPartners as $partner)
                <div class="logo-box">
                    <img src="{{ asset('uploads/partners/'. $partner->logo) }}" alt="{{ $partner->name }}">
                </div>
                @endforeach
            </div>
            <div class="trusted-message">
                <p class="mt-2"><span><i class="ri-building-line"></i></span>
                    Trusted by the world's leading companies</p>
            </div>
        </div>
    </div>
</div>

<!-------------pmp-certification-faqs---------------->
@if($courseDetails->faqs->count() > 0)
<div class="container">
    <div class="parent-container d-block">
        <h2>{{ $courseDetails->short_title }} FAQs</h2>
        <div class="accordion" id="faqsExample">
            @foreach($courseDetails->faqs as $index => $faq)
            @php
            $headingId = 'faqHeading' . $index;
            $collapseId = 'faqCollapse' . $index;
            @endphp
            <div class="accordion-item {{ $index >= 3 ? 'd-none extra-faq' : '' }}">
                <h2 class="accordion-header" id="{{ $headingId }}">
                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#{{ $collapseId }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="{{ $collapseId }}">
                        {{ $faq->title }}
                    </button>
                </h2>
                <div id="{{ $collapseId }}"
                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                    aria-labelledby="{{ $headingId }}"
                    data-bs-parent="#faqsExample">
                    <div class="accordion-body">
                        {!! $faq->description !!}
                    </div>
                </div>
            </div>
            @endforeach

            @if($courseDetails->faqs->count() > 3)
            <div class="text-center mt-2">
                <button class="view-more" id="toggleFaqs">View More</button>
            </div>
            @endif
        </div>
    </div>
</div>
@endif

@if($relatedCourses->count() > 0)
<div class="related-course py-5">
    <div class="container">
        <h2 class="text-center mb-4">Related Programs</h2>
        <div class="row g-4">

            {{-- First Program (special design) --}}
            @if($relatedCourses->first())
            @php $firstCourse = $relatedCourses->first(); @endphp
            <div class="col-md-4">
                <div class="program-box p-4 shadow-sm rounded">
                    <h5 class="fw-bold mb-2">{{ $firstCourse->title }}</h5>
                    <small class="fw-bold text-primary bg-light px-2 py-1">
                        {{ $firstCourse->getCategory->name ?? '' }}
                    </small>
                    <div class="rating mb-2 text-warning d-flex justify-content-between">
                        @php
                        $rating = round($firstCourse->average_rating); // uses accessor
                        $maxStars = 5;
                        @endphp

                        <ul class="d-flex list-unstyle customer-ratings">
                            @for ($i = 1; $i <= $maxStars; $i++)
                                @if ($i <=$rating)
                                <li><i class="ri-star-fill"></i></li>
                                @else
                                <li><i class="ri-star-line"></i></li>
                                @endif
                                @endfor
                                <li><span>({{ number_format($firstCourse->average_rating, 1) }})</span></li>
                        </ul>

                        <span>
                            {{ number_format($firstCourse->learner_field + $firstCourse->getRating->count()) }} Learners
                        </span>
                    </div>
                    <ul class="small ms-2" style="list-style: none;">
                        <li>✔ Rigorous curriculum</li>
                        <li>✔ Master’s certificate</li>
                        <li>✔ Authorized Training Partner</li>
                    </ul>
                </div>
            </div>
            @endif

            {{-- Rest of the Programs --}}
            <div class="col-md-8">
                <div class="row g-4">
                    @foreach($relatedCourses->skip(1) as $course)
                    <div class="col-md-6">
                        <div class="program-box p-3 shadow-sm rounded">
                            <h6 class="fw-bold mb-2">{{ $course->title }}</h6>
                            <small class="fw-bold text-primary bg-light px-2 py-1">
                                {{ $course->getCategory->name }}
                            </small>

                            <div class="rating text-warning d-flex justify-content-between">
                                @php
                                $rating = round($course->average_rating); // uses accessor
                                $maxStars = 5;
                                @endphp

                                <ul class="d-flex list-unstyle customer-ratings">
                                    @for ($i = 1; $i <= $maxStars; $i++)
                                        @if ($i <=$rating)
                                        <li><i class="ri-star-fill"></i></li>
                                        @else
                                        <li><i class="ri-star-line"></i></li>
                                        @endif
                                        @endfor
                                        <li><span>({{ number_format($course->average_rating, 1) }})</span></li>
                                </ul>

                                <span>
                                    {{ number_format($course->learner_field + $course->getRating->count()) }} Learners
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endif

<!------------------why-bootcamp-section---------------------->
<div class="container">
    <div class="container-for-bootcamp">
        <section class="why-bootcamp">
            <h2>Why Choose Our Online {{ $courseDetails->short_title }} Bootcamp?</h2>
            <div class="bootcamp-content">
                <div class="video-frame">
                    <!-- <iframe src="{{ $courseDetails->video_url }}" frameborder="0"
                        allowfullscreen></iframe> -->
                    <!-- {!! $courseDetails->video_url !!} -->
                    <iframe width="560" height="315"
                        src="{{ $courseDetails->video_url }}"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen></iframe>
                </div>
                <div class="info-sections">
                    @if($courseDetails->getCourseVideo->count() > 0)
                    @foreach($courseDetails->getCourseVideo as $course)
                    <div class="info-section">
                        <h3>{{ $course->title }}</h3>
                        {!! $course->description !!}
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
@endsection


@push('modal')
<div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content overflow-hidden" style="border-radius: 10px;">
            <!-- <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <form method="post" action="{{ route('lead') }}" class="courseLead">
                @csrf
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <!-- Left Section -->
                        <div class="d-none col-md-6 d-lg-flex flex-column justify-content-between bg-primary text-white">
                            <div class="p-4">
                                <h3 class="text-center" style="color: #012833">Corporate Training</h3>
                                <p class="mb-4 text-center" style="color: #012833">Upskill or reskill your teams</p>
                                <ul class="list-unstyled" style="list-style: none;">
                                    <li><i class="ri-arrow-right-s-fill"></i> Flexible pricing & billing options</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Private cohorts available</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Training progress dashboards</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Skills assessment & benchmarking</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Platform integration capabilities</li>
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
                            <input type="hidden" name="course_id" value="{{ $courseDetails->id }}">
                            <input type="hidden" name="type" value="enquiry">

                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="First Name *" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email *" required>
                            </div>
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
                            <div class="mb-3">
                                <input type="number" class="form-control" name="learners" placeholder="Number of Learners (2 or above) *" required>
                            </div>
                            <div class="mb-3 d-block">
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                                <label class="form-check-label small" for="privacyPolicy">
                                    By providing your contact details, you agree to our
                                    <a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a>.
                                </label>
                            </div>
                            <!-- Google reCAPTCHA -->
                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}"></div>

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

<div class="modal fade" id="talktoOurAdvisor" tabindex="-1" aria-labelledby="talktoOurAdvisorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content overflow-hidden" style="border-radius: 10px;">
            <form method="post" action="{{ route('lead') }}" class="courseLead">
                @csrf
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <!-- Left Section -->
                        <div class="d-none col-md-6 d-lg-flex flex-column justify-content-between bg-primary text-white">
                            <div class="p-4">
                                <h3 class="text-center" style="color: #012833">Talk to our Advisor</h3>
                                <p class="mb-4 text-center" style="color: #012833">Upskill or reskill your teams</p>
                                <ul class="list-unstyled" style="list-style: none;">
                                    <li><i class="ri-arrow-right-s-fill"></i> Flexible pricing & billing options</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Private cohorts available</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Training progress dashboards</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Skills assessment & benchmarking</li>
                                    <li><i class="ri-arrow-right-s-fill"></i> Platform integration capabilities</li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend-assets/img/all-img/meeting.png') }}" alt="Meeting" class="img-fluid mt-3">
                        </div>

                        <!-- Right Section -->
                        <div class="col-md-6 bg-white p-4">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="fw-bold text-center" id="talktoOurAdvisorLabel" style="color: rgba(33, 37, 41, 0.75);">Get a Quote</h4>
                            <p class="small text-muted mb-3">Fill in the details to get a callback from our team</p>
                            <input type="hidden" name="course_id" value="{{ $courseDetails->id }}">
                            <input type="hidden" name="type" value="enquiry">

                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="First Name *" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email *" required>
                            </div>
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
                            <div class="mb-3">
                                <input type="number" class="form-control" name="learners" placeholder="Number of Learners (2 or above) *" required>
                            </div>
                            <div class="mb-3 d-block">
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                                <label class="form-check-label small" for="privacyPolicy">
                                    By providing your contact details, you agree to our
                                    <a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a>.
                                </label>
                            </div>
                            <!-- Google reCAPTCHA -->
                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_CAPTCHA_SITE_KEY') }}"></div>

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

<div class="modal fade" id="curriculumModal" tabindex="-1" aria-labelledby="curriculumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 500px !important; width: 90%; margin: 0 auto">
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

        if (storedCountryId) {
            $(".modal-phone-flag option").each(function() {
                if ($(this).data("id") == storedCountryId) {
                    $(this).prop("selected", true);
                }
            });
        }
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

    var benefitsData = @json($benefitsData);
    var salaryChart;

    // update data
    function updateData(role) {
        var benefit = benefitsData[role];
        if (!benefit) return;
        updateChart(benefit.salary);
        updateCompanies(benefit.companies);
    }

    // update chart
    function updateChart(salary) {
        var data = [salary.min, salary.avg_min, salary.average, salary.avg_max, salary.max];

        if (salaryChart) salaryChart.destroy();

        var ctx = document.getElementById('salaryChart').getContext('2d');
        salaryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Min', 'Avg Min', 'Average', 'Avg Max', 'Max'],
                datasets: [{
                    label: 'Annual Salary',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw; // raw number from dataset
                                return '$' + value.toFixed(2) + 'k';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value + 'k';
                            }
                        }
                    }
                }
            }
        });
    }

    // update companies
    function updateCompanies(companies) {
        var wrap = document.getElementById('companyLogos');
        wrap.innerHTML = '';
        companies.forEach(function(url) {
            var img = document.createElement('img');
            img.src = url;
            img.alt = 'Company Logo';
            wrap.appendChild(img);
        });
    }

    // handle clicks
    document.querySelectorAll('.designation-list li').forEach(function(item) {
        item.addEventListener('click', function() {
            // reset inline styles on all
            document.querySelectorAll('.designation-list li').forEach(function(li) {
                li.style.backgroundColor = '';
                li.style.color = '';
            });

            // highlight clicked one
            this.style.backgroundColor = '#007bff';
            this.style.color = '#fff';

            updateData(this.getAttribute('data-role'));
        });
    });

    // highlight + load first item on default
    var firstLi = document.querySelector('.designation-list li');
    if (firstLi) {
        firstLi.style.backgroundColor = '#007bff';
        firstLi.style.color = '#fff';
        updateData(firstLi.getAttribute('data-role'));
    }

    $(document).ready(function() {
        let expanded = false;
        $("#toggleCertificates").on("click", function() {
            expanded = !expanded;

            if (expanded) {
                $(".extra-certificate").removeClass("d-none");
                $(this).text("Read Less");
            } else {
                $(".extra-certificate").addClass("d-none");
                $(this).text("Read More");
            }
        });
    });

    $(document).ready(function() {
        let expandedCurriculum = false;

        $("#toggleCurriculum").on("click", function() {
            expandedCurriculum = !expandedCurriculum;

            if (expandedCurriculum) {
                $(".extra-curriculum").removeClass("d-none");
                $(this).text("View Less");
            } else {
                $(".extra-curriculum").addClass("d-none");
                $(this).text("View More");

                // Optional: Smooth scroll back to the accordion top
                $('html, body').animate({
                    scrollTop: $("#accordion").offset().top - 100
                }, 400);
            }
        });
  
        let expandedFaqs = false;

        $("#toggleFaqs").on("click", function() {
            expandedFaqs = !expandedFaqs;

            if (expandedFaqs) {
                $(".extra-faq").removeClass("d-none");
                $(this).text("View Less");
            } else {
                $(".extra-faq").addClass("d-none");
                $(this).text("View More");

                // Optional smooth scroll back to FAQs top
                $('html, body').animate({
                    scrollTop: $("#faqsExample").offset().top - 100
                }, 400);
            }
        });

        $('.modal-phone-flag').select2({
            dropdownParent: $('#curriculumModal')
        });

         $('.modal-phone-flag').select2({
            dropdownParent: $('#contactUsModal')
        });
        
        $('.modal-phone-flag').select2({
            dropdownParent: $('#talktoOurAdvisor')
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

    $(document).on("submit", ".courseLead", function (e) {
        e.preventDefault();

        let form = $(this);
        let formData = form.serialize();

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: formData,
            success: function (response) {
                if (response.status === "success") {
                    toastr.success(response.message);
                    form[0].reset(); 
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error(response.message || "Something went wrong!");
                }
            },
            error: function (xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    toastr.error("Something went wrong. Please try again.");
                }
            },
        });
    });

    $(document).ready(function(){
        const selectedCountryId = localStorage.getItem('selected_country_id');
        const selectedCityId = localStorage.getItem('selected_city_id');
        const selectedCityName = localStorage.getItem('selected_city_name'); // store city name when selected

        const chooseCityBtn = $('#chooseCityBtn');
        const countrySelect = $('#countrySelect');
        const cityInput = $('#cityInput');
        const citySuggestions = $('#citySuggestions');
        const cityNameSpan = $('.cityName');

        // Display previously selected city on page load
        if (selectedCityName) {
            cityNameSpan.html(` <i class="fa-solid fa-location-dot text-danger fs-5"></i> ${selectedCityName}`);
        }

        // Show modal and load country when button is clicked
        chooseCityBtn.on('click', function () {
            if (!selectedCountryId) {
                alert('No country selected in localStorage.');
                return;
            }

            $('#cityModal').modal('show');
            loadCountry(selectedCountryId);

            // Clear previous input and suggestions
            cityInput.val('');
            citySuggestions.empty();
        });

        // Load Country
        function loadCountry(countryId) {
            $.ajax({
                url: "{{ route('get.country') }}",
                type: 'POST',
                data: { id: countryId },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    countrySelect.html(`<option value="${data.id}" selected>${data.name}</option>`);
                },
                error: function (err) {
                    console.error(err.responseText);
                    alert('Failed to load country.');
                }
            });
        }

        // City input AJAX search
        cityInput.on('input', function() {
            const query = $(this).val();

            if (query.length < 3) {
                citySuggestions.empty();
                return;
            }

            $.ajax({
                url: "{{ route('get.cities') }}",
                type: 'POST',
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { country_id: selectedCountryId, term: query },
                success: function(cities) {
                    citySuggestions.empty();
                    if (cities.length === 0) {
                        citySuggestions.append('<div class="list-group-item">No cities found</div>');
                        return;
                    }

                    $.each(cities, function(i, city) {
                        citySuggestions.append(`<div class="list-group-item list-group-item-action city-item" data-id="${city.id}" data-name="${city.name}">${city.name}</div>`);
                    });
                },
                error: function(err) {
                    console.error(err.responseText);
                }
            });
        });

        // Select city from suggestions
        $(document).on('click', '.city-item', function() {
            const cityName = $(this).data('name');
            const cityId = $(this).data('id');

            cityInput.val(cityName);
            citySuggestions.empty();

            // Save to localStorage
            localStorage.setItem('selected_city_id', cityId);
            localStorage.setItem('selected_city_name', cityName);
        });

        // Hide suggestions when clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest('#cityInput, #citySuggestions').length) {
                citySuggestions.empty();
            }
        });

        // Save selected city
        $('#saveCity').on('click', function() {
            const cityName = cityInput.val().trim();
            if (!cityName) {
                toastr.error('Please select a city.');
                return;
            }

            cityNameSpan.html(`<i class="fa-solid fa-location-dot text-danger fs-5"></i> ${cityName}`);
            $('#cityModal').modal('hide');
            location.reload();

            // Save again in case user typed city manually
            localStorage.setItem('selected_city_name', cityName);
        });
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

    /* .modal span.select2-selection.select2-selection--single {
        width: 75px;
    } */
    .modal-dialog {
        max-width: 800px !important;
    }

    .courseLead span.select2.select2-container.select2-container--default {
        width: 65px !important;
    }

    .left-course-container ul,
    .left-course-container ol {
        list-style: none;
    }

    /* upcoming schedule */
    .card-nbg12 {
        background: linear-gradient(to bottom, rgb(211 237 255 / 33%) 22%, rgba(240, 249, 255, 0) 99%);
    }

    .ribbon-container {
        position: absolute;
        top: -5px;
        right: -1px;
        z-index: 1;
        width: 90px;
        height: 94px;
    }

    .ribbon1 {
        width: 110%;
        height: auto;
        top: -3px;
        left: 3px;
    }

    .ribbon-text {
        top: 24px;
        left: 61%;
        transform: translateX(-50%) rotate(45deg);
        color: #fff;
        font-size: 12px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
        z-index: 2;
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

    .left-course-container > h1{
        font-size: 2.125rem;
    }

</style>
@endpush