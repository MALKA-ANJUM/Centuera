@extends('user.layouts.layout')
@section('title', 'Course Details')
@section('content')

<!-- Courses Section Start -->
<div class="container-fluid px-3" id="course-section-start">
    <div class="row courses-demo-container">
        <div class="col-md-6 left-course-container">
            <h1>{{ $courseDetails->title ?? '' }}</h1>
            <h6>{!! $courseDetails->short_description !!}</h6>
            <!-- <p><span><i class="ri-checkbox-circle-line"></i></span> Guaranteed PMP Exam Success on Your First Try
            </p>
            <p><span><i class="ri-checkbox-circle-line"></i></span> Specialized Master Classes for Project
                Management Using Generative AI</p>
            <p><span><i class="ri-checkbox-circle-line"></i></span> Get 12 simulated assessments | Earn 35 PDUs |
                500+ premium questions</p>
            <p><span><i class="ri-checkbox-circle-line"></i></span> Study Plan with 1000 Questions | Cheat Sheet |
                Guaranteed Exam Pass</p>
            <p><span><i class="ri-checkbox-circle-line"></i></span> Guarantee to Run More than 30 Live Cohorts in
                the Next 90 Days</p> -->
            {!! $courseDetails->description !!}

            <div class="demo-course-btn d-flex flex-wrap">
                <a class="demo-course-btn-one text-center" href="#view_schedule">View Training Options</a>
                <button class="demo-course-btn-two" data-bs-toggle="modal" data-bs-target="#contactUsModal">Talk to
                    our advisor</button>


                <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title " id="contactUsModalLabel">Connect us</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="submitForm" method="post" action="https://centuera.com/Home/ContactForma">

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="fname" id="firstName"
                                            placeholder="First Name*" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="lname" id="lastName"
                                            placeholder="Last Name*" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <select class="form-select" id="countryCode">
                                                <option value="IN">IN +91</option>
                                                <option value="US">US +1</option>
                                                <option value="UK">UK +44</option>
                                            </select>
                                            <input type="text" class="form-control" name="mobile" id="mobile"
                                                placeholder="Phone Number*" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 enquiry-field">
                                        <label>Enquiry for:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="enquiryFor" id="myself" value="myself" checked>
                                            <label class="form-check-label" for="myself">Myself</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="enquiryFor" id="company" value="company">
                                            <label class="form-check-label" for="company">My Company</label>
                                        </div>
                                    </div>
                                    <div class="mb-3" id="companyMembers" style="display:none;">
                                        <input type="text" class="form-control" name="members" id="membersCount"
                                            placeholder="How many members?*">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="privacyPolicy">
                                        <label class="form-check-label" for="privacyPolicy">By providing your
                                            contact details,
                                            you agree to our privacy policy</label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" data-animation="fadeInRight" data-delay=".8s" type="submit" id="submitBtn" name="submit-form"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="training-team">
                <a>Want to Train your team? : <span class="get-quote" data-bs-toggle="modal"
                        data-bs-target="#contactUsModal">Get a quote</span></a>
                <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title " id="contactUsModalLabel">Connect us</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="submitForm" method="post" action="https://centuera.com/Home/ContactForma">

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="fname" id="firstName"
                                            placeholder="First Name*" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="lname" id="lastName"
                                            placeholder="Last Name*" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <select class="form-select" id="countryCode">
                                                <option value="IN">IN +91</option>
                                                <option value="US">US +1</option>
                                                <option value="UK">UK +44</option>
                                            </select>
                                            <input type="text" class="form-control" name="mobile" id="mobile"
                                                placeholder="Phone Number*" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 enquiry-field">
                                        <label>Enquiry for:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="enquiryFor" id="myself" value="myself" checked>
                                            <label class="form-check-label" for="myself">Myself</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="enquiryFor" id="company" value="company">
                                            <label class="form-check-label" for="company">My Company</label>
                                        </div>
                                    </div>
                                    <div class="mb-3" id="companyMembers" style="display:none;">
                                        <input type="text" class="form-control" name="members" id="membersCount"
                                            placeholder="How many members?*">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="privacyPolicy">
                                        <label class="form-check-label" for="privacyPolicy">By providing your
                                            contact details,
                                            you agree to our privacy policy</label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" data-animation="fadeInRight" data-delay=".8s" type="submit" id="submitBtn" name="submit-form"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="patp-course">
                <p class="patp-course-text">Premier Authorized Training Partner</p>
            </div>
            <div class="project-institute">
                <img src="{{ asset('frontend-assets/img/logo/PMP%20LOGO%20(1).png') }}" style="width: 150px; height: auto;"
                    alt="Project Management Institute">
                <h4 class="project-institute-text">Project Management<br>Institute</h4>
            </div>
        </div>

        <div class="col-md-6 right-course-container">
            <img src="{{ asset('frontend-assets/img/all-img/Desktop%20-%201-half.png') }}" alt="Course Image">
            <div class="right-course d-flex flex-wrap">
                <button class="right-course-btn-1 d-flex align-items-center"><span><i
                            class="ri-user-2-fill text-primary"></i></span>&nbsp;85,396 Learners</button>
                <button class="right-course-btn-2 d-flex align-items-center"><span><i
                            class="ri-star-fill text-warning"></i></span>&nbsp;<span class="">4.5</span>&nbsp;37,329
                    Ratings</button>
            </div>
        </div>
    </div>
</div>

<!-------------------section-2 ------------------->

<section class="course-container-pmp container">
    <div class="row">
        <div class="pmp-course-left-text col-md-8">
            <h2>Course Overview</h2>
            <p>{!! $courseDetails->overview !!}</p>

            <div class="pmp-course-left-btn">
                <div class="tooltip-container">
                    <button class="pmp-course-left-btn-design">
                        <span class="me-2"><i class="ri-survey-fill"></i></span>Exam Pass Guarantee
                        <span class="me-2"><i class="ri-information-fill"></i></span>
                    </button>
                    <div class="tooltip-box">
                        <p>Our training course comes with a 100% exam pass guarantee. Centuera believes in our
                            highly effective blended learning methodology and its ability to provide learners with
                            the knowledge and confidence to pass the PMP exam in the first attempt. If you do not
                            clear the PMP exam on the first attempt, we will refund the course fee to you.</p>
                    </div>
                </div>
                <div class="tooltip-container">
                    <button class="pmp-course-left-btn-design">
                        <span class="me-1"><i class="ri-money-dollar-circle-line"></i></span>100% Money Back
                        Guarantee
                        <span class="me-1"><i class="ri-information-fill"></i></span>
                    </button>
                    <div class="tooltip-box">
                        <p>100% money-back guarantee*</p>
                        <b>No questions asked refund*</b>
                        <p>At Centuera, we value the trust of our patrons immensely. But, if you feel that a
                            course does not meet your expectations, we offer a 7-day money-back guarantee. Just send
                            us a refund request via email within 7 days of purchase and we will refund 100% of your
                            payment, no questions asked!</p>
                    </div>
                </div>
            </div>




            <h2 class="mt-5">PMP Courses Key Features</h2>

            <div class="Course-Key-Features mt-3 d-flex flex-wrap">
                @if($courseDetails->keyFeatures && $courseDetails->keyFeatures->count())
                    @foreach($courseDetails->keyFeatures->chunk(ceil($courseDetails->keyFeatures->count()/2)) as $featuresChunk)
                        <div class="Course-key-features-{{ $loop->first ? 'left' : 'right' }}">
                            @foreach($featuresChunk as $feature)
                                <p><span><i class="ri-checkbox-circle-line"></i></span> {{ $feature->feature }}</p>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>No key features listed for this course.</p>
                    </div>
                @endif
            </div>
            <h2 class="mt-4">Skills Covered</h2>
            <div class="d-flex flex-wrap">
                @if($courseDetails->skillsCovered && $courseDetails->skillsCovered->count())
                    @foreach($courseDetails->skillsCovered->chunk(ceil($courseDetails->skillsCovered->count()/2)) as $skillsChunk)
                        <div class="col-md-6 skills-covered">
                            @foreach($skillsChunk as $skill)
                                <p><span><i class="ri-checkbox-circle-line"></i></span> {{ $skill->skill_name }}</p>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>No skills listed for this course.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="pmp-course-table col-md-4">
            <div class="cohort-form">
                <div class="real-cohort-form" data-start-date="2025-08-24T00:00:00">
                    <h1>Next Cohort Starts on 20th August</h1>
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
                <form method="POST" action="{{ route('user.lead') }}">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $courseDetails->id }}">
                    <div class="form-group">
                        <input type="text" placeholder="Name*" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email*" name="email" required>
                    </div>
                    <div class="form-group">
                        <div class="dropdown">
                            <select>
                                <option>GB</option>
                                <option>+91</option>
                                <option>+1</option>
                                <option>+44</option>
                            </select>
                        </div>
                        <input type="tel" name="phone" placeholder="Phone Number*" required>
                    </div>
                    <button type="submit" class="btn-primary">Submit</button>
                </form>
                    <div class="form-group">
                        {{-- <button type="submit" class="btn-primary" data-bs-toggle="modal"
                            data-bs-target="#contactUsModal">Talk to Advisor</button> --}}

                                <div class="modal fade" id="contactUsModal" tabindex="-1"
                                    aria-labelledby="contactUsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title " id="contactUsModalLabel">Connect us</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                  
                                  
                
            </div>
        </div>
    </div>
    </div>
    <div class="info-text">
        <p>By providing your contact details, you agree to our <span class="info-text-span">Privacy
                Policy</span></p>
    </div>
    <div class="form-group">
        <button type="button" id="viewSchedulesBtn" class="btn-secondary">View Schedules</button>
    </div>
    </form>
    </div>

    <div class="skills-covered-right-content">
        <h4>Corporate Training</h4>
        <h6>Enterprise training for teams</h6>
        <button data-bs-toggle="modal" data-bs-target="#contactUsModal">Get a quote</button>

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
                        <form id="submitForm" method="post" action="https://centuera.com/Home/ContactForma">

                            <div class="mb-3">
                                <input type="text" class="form-control" name="fname" id="firstName"
                                    placeholder="First Name*" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="lname" id="lastName"
                                    placeholder="Last Name*" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email*"
                                    required>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <select class="form-select" id="countryCode">
                                        <option value="IN">IN +91</option>
                                        <option value="US">US +1</option>
                                        <option value="UK">UK +44</option>
                                    </select>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                        placeholder="Phone Number*" required>
                                </div>
                            </div>

                            <div class="mb-3 enquiry-field">
                                <label>Enquiry for:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="enquiryFor" id="myself" value="myself" checked>
                                    <label class="form-check-label" for="myself">Myself</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="enquiryFor" id="company" value="company">
                                    <label class="form-check-label" for="company">My Company</label>
                                </div>
                            </div>
                            <div class="mb-3" id="companyMembers" style="display:none;">
                                <input type="text" class="form-control" name="members" id="membersCount"
                                    placeholder="How many members?*">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="privacyPolicy">
                                <label class="form-check-label" for="privacyPolicy">By providing your
                                    contact details,
                                    you agree to our privacy policy</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" data-animation="fadeInRight" data-delay=".8s" type="submit" id="submitBtn" name="submit-form"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<!-----------------benefits-section---------------->

<section class="benefits-section container">
    <h2>Benefits</h2>
    <p>Acquiring a globally recognized PMP® certification can assist you in securing profitable positions in IT,
        manufacturing, finance, healthcare, and other fascinating sectors. Project managers that hold the PMP®
        certification improve project performance and are frequently rewarded with significant salary increases, as
        indicated below.
    </p>

    <div class="row text-center">
        <div class="col-md-4">
            <h4>Designation</h4>
            <ul class="designation-list">
                <li data-role="softwareEngineer">Project Director</li>
                <li data-role="softwareDeveloper">Senior Project Manager</li>
                <li data-role="projectManager">Team Leads/Team Managers</li>
                <li data-role="dataScientist">Project Management Officer (PMO)</li>
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
            <div id="companyLogos" class="company-logos mt-5">
            </div>
        </div>
    </div>
</section>

<!--------------------Training-option-------------------->
<section class="container" id="view_schedule">
    <h2>Training Option</h2>
    <div class="card-container">
        <!-- Card 1: Classroom -->
        <div class="card">
            <div class="card-header">
                <h4>Classroom Training</h4>
            </div>
            <div class="card-body">
                <p><span><i class="ri-checkbox-circle-line"></i></span> 4 Days Classroom Training</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Free On-Demand Course by Industry Experts
                </p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> 5-Week Mentor-Led Study Plan</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> 2K+ Question Bank, 5 Exams, 5 Mock Tests,
                    More!</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Learner support and assistance available
                    24/7</p>

                <h5>Batch starting from:</h5>
                <p>7<sup>th</sup> May, Weekday Class | 14<sup>th</sup> May, Weekday Class</p>
                <a class="text-primary text-decoration-underline" href="schedule.html">View all schedules</a>
            </div>
            <div class="card-footer">
                <div class="price-info">
                    <p><span><i class="ri-discount-percent-fill"></i></span>25% off</p>
                    <h5><strong>$1899</strong> <span class="strike-price">$2499</span></h5>
                </div>
                <a href="schedule.html">
                    <button type="button" id="viewSchedulesBtn" class="btn enroll-button">Enroll Now</button></a>
            </div>
        </div>
        <!-- Card 2: Online Bootcamp -->
        <div class="card">
            <div class="card-header bg-primary text-light">
                <h4>Online Bootcamp</h4>
            </div>
            <div class="card-body">
                <p><span><i class="ri-checkbox-circle-line"></i></span> 36 Contact Hrs with Live Training</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Free On-Demand Course by Industry Experts
                </p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> 5-Week Mentor-Led Study Plan</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> 2K+ Question Bank, 5 Exams, 5 Mock Tests,
                    More!</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Learner support and assistance available
                    24/7</p>


                <h5>Batch starting from:</h5>
                <p>7<sup>th</sup> May, Weekday Class | 14<sup>th</sup> May, Weekday Class</p>
                <a class="text-primary text-decoration-underline" href="schedule.html">View all schedules</a>

            </div>
            <div class="card-footer">
                <div class="price-info">
                    <p><span><i class="ri-discount-percent-fill"></i></span>45% off</p>
                    <h5><strong>$799</strong> <span class="strike-price">$1499</span></h5>
                </div>
                <button class="btn enroll-button">Enroll Now</button>
            </div>
        </div>
        <!-- Card 3: Corporate Training -->
        <div class="card">
            <div class="card-header">
                <h4>Corporate Training</h4>
            </div>
            <div class="card-body">
                <p><span><i class="ri-checkbox-circle-line"></i></span> Customize the learning model according to
                    your team's needs. Get digital material, instructor-led classes or both.</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Get flexible pricing options according to
                    your company's needs</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Simple and interactive Learning Management
                    System (LMS)</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Enterprise dashboard for individual learners
                    or teams</p>
                <p><span><i class="ri-checkbox-circle-line"></i></span> Learner support and assistance available
                    24/7</p>

            </div>
            <div class="card-footer p-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactUsModal">Know
                    More</button>
            </div>
        </div>
        <!-- Modal Structure -->
        <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactUsModalLabel">Contact Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="submitForm" method="post" action="https://centuera.com/Home/ContactForma">

                            <div class="mb-3">
                                <input type="text" class="form-control" name="fname" id="firstName"
                                    placeholder="First Name*" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="lname" id="lastName"
                                    placeholder="Last Name*" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email*"
                                    required>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <select class="form-select" id="countryCode">
                                        <option value="IN">IN +91</option>
                                        <option value="US">US +1</option>
                                        <option value="UK">UK +44</option>
                                    </select>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                        placeholder="Phone Number*" required>
                                </div>
                            </div>

                            <div class="mb-3 enquiry-field">
                                <label>Enquiry for:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="enquiryFor" id="myself" value="myself" checked>
                                    <label class="form-check-label" for="myself">Myself</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="enquiryFor" id="company" value="company">
                                    <label class="form-check-label" for="company">My Company</label>
                                </div>
                            </div>
                            <div class="mb-3" id="companyMembers" style="display:none;">
                                <input type="text" class="form-control" name="members" id="membersCount"
                                    placeholder="How many members?*">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="privacyPolicy">
                                <label class="form-check-label" for="privacyPolicy">By providing your
                                    contact details,
                                    you agree to our privacy policy</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" data-animation="fadeInRight" data-delay=".8s" type="submit" id="submitBtn" name="submit-form"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-------------------------faqssss---------------------->
<div class="container mt-5">
    <div class="row">
        <!-- Left Section -->
        <div class="col-md-8">
            <h2>PMP Certification Course Curriculum</h2>
            <h4 class="mt-5">Eligibility</h4>
            <p>The PMP® certification is an essential professional requirement for senior project manager roles
                across all industries. This course is best suited for: Project Managers, Associate/Assistant Project
                Managers, Team Leads/Team Managers, Project Executives/Project Engineers, Software Developers, Any
                professional aspiring to be a Project Manager.</p>

            <h4 class="mt-3">Pre-requisites</h4>
            <p>Attending the PMP Certification Training offered by Centuera does not require any prior knowledge or
                expertise. A secondary degree (high school diploma, associate's degree, or worldwide equivalent)
                with 7,500 hours of project leading and directing experience and 35 hours of project management
                instruction are requirements to sit for the PMP exam.
                OR
                You should have a four-year degree with 4,500 hours leading and directing projects along with 35
                hours of project management education.
            </p>

            <div id="accordion">
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingOne" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 01: Course Introduction
                            <button class="preview-btn">Preview</button>
                        </p>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            1.01 Course Introduction <br>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingTwo" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 02: Business Environment
                            <button class="preview-btn">Preview</button>
                        </p>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01: Foundation <br>
                            Lesson 02: Strategic Alignment <br>
                            Lesson 03: Project Benefits and Value <br>
                            Lesson 04: Organizational Culture and Change Management <br>
                            Lesson 05: Project Governance <br>
                            Lesson 06: Project Compliance <br>
                            Lesson 07: Case Study <br>
                        </div>
                    </div>
                </div>
                <!-- Add more sections as needed -->
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingThree" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 03: Start the project
                            <button class="preview-btn">Preview</button>
                        </p>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01: Identify and Engage Stakeholders <br>
                            Lesson 02: Form the Team <br>
                            Lesson 03: Build Shared Understanding <br>
                            Lesson 04: Determine Project Approach <br>
                            Lesson 05: Case Study <br>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingFour" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 04: Plan the project
                            <button class="preview-btn">Preview</button>
                        <p>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01: Planning Projects <br>
                            Lesson 02: Scope <br>
                            Lesson 03: Schedule <br>
                            Lesson 04: Resources <br>
                            Lesson 05: Budget<br>
                            Lesson 06: Risks<br>
                            Lesson 07: Quality<br>
                            Lesson 08: Integrate Plans<br>
                            Lesson 09: Case Study<br>
                        </div>
                    </div>
                </div>
                <!-- Add more sections as needed -->
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingFive" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 05: Lead the project
                            <button class="preview-btn">Preview</button>
                        </p>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01: Craft Your Leadership Skills <br>
                            Lesson 02: Create a Collaborative Project Team Environment<br>
                            Lesson 03: Empower the Team<br>
                            Lesson 04: Support Team Member Performance<br>
                            Lesson 05: Communicate and Collaborate with Stakeholders<br>
                            Lesson 06: Training Coaching and Mentoring<br>
                            Lesson 07: Manage Conflict<br>
                            Lesson 08: Case Study<br>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingSix" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 06: Support Project
                            Team Performance <button class="preview-btn">Preview</button></p>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01: Implement Ongoing Improvements<br>
                            Lesson 02: Support Team Performance<br>
                            Lesson 03: Evaluate Project Progress<br>
                            Lesson 04: Manage Project Issues and Impediments<br>
                            Lesson 05: Manage Project Changes<br>
                            Lesson 06: Case Study<br>
                        </div>
                    </div>
                </div>
                <!-- Add more sections as needed -->
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingSeven" data-bs-toggle="collapse"
                        data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 07: Close The Project
                            Phase <button class="preview-btn">Preview</button>
                        </p>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01: Project or Phase Closure<br>
                            Lesson 02: Benefits Realization<br>
                            Lesson 03: Knowledge Transfer<br>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingEight" data-bs-toggle="collapse"
                        data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 08: PMI LO-Choice Walk
                            Through <button class="preview-btn">Preview</button></p>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01: PMI LO - Choice Walk-Through<br>
                        </div>
                    </div>
                </div>
                <!-- Add more sections as needed -->
                <div class="accordion-item">
                    <div class="accordion-item-header" id="headingNine" data-bs-toggle="collapse"
                        data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        <p class="mb-0"><span><i class="ri-add-line"></i></span> Section 09: Online Video Lectures
                            <button class="preview-btn">Preview</button>
                        </p>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                        data-bs-parent="#accordion">
                        <div class="accordion-item-body">
                            Lesson 01 : Online Video Lectures <br>
                        </div>
                    </div>
                </div>
                <button class="view-more">View More</button>

                <div class="schedule-btn d-flex flex-wrap">
                    <button class="schedule-btn-one" data-bs-toggle="modal"
                        data-bs-target="#contactUsModal">Download Syllabus</button>

                    <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title " id="contactUsModalLabel">Connect us</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="submitForm" method="post" action="https://centuera.com/Home/ContactForma">

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="fname" id="firstName"
                                                placeholder="First Name*" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="lname" id="lastName"
                                                placeholder="Last Name*" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email*"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <select class="form-select" id="countryCode">
                                                    <option value="IN">IN +91</option>
                                                    <option value="US">US +1</option>
                                                    <option value="UK">UK +44</option>
                                                </select>
                                                <input type="text" class="form-control" name="mobile" id="mobile"
                                                    placeholder="Phone Number*" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 enquiry-field">
                                            <label>Enquiry for:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="enquiryFor" id="myself" value="myself" checked>
                                                <label class="form-check-label" for="myself">Myself</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="enquiryFor" id="company" value="company">
                                                <label class="form-check-label" for="company">My Company</label>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="companyMembers" style="display:none;">
                                            <input type="text" class="form-control" name="members" id="membersCount"
                                                placeholder="How many members?*">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="privacyPolicy">
                                            <label class="form-check-label" for="privacyPolicy">By providing your
                                                contact details,
                                                you agree to our privacy policy</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" data-animation="fadeInRight" data-delay=".8s" type="submit" id="submitBtn" name="submit-form"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="schedule-btn-two" href="schedule.html">View Schedules</a>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-md-4">
            <div class="contact-box d-flex">
                <div class="contact-box-left">
                    <p>Contact Us</p>
                    <h4>Toll Free: 713-900-9709 </h4>
                    <p>(Toll Free)</p>
                </div>
                <div class="contact-box-right mt-5 m-5">
                    <span><i class="ri-phone-fill"></i></span>
                </div>
            </div>

            <div class="info-box">
                <h5 class="text-center">Request more information</h5>
                <form id="submitForms" method="POST" class="mt-5" action="https://centuera.com/Home/ContactForma">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="fname" id="firstName" placeholder="Name*" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*" required>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <select class="form-select" id="countryCode">
                                <option value="IN">IN +91</option>
                                <option value="US">US +1</option>
                                <option value="UK">UK +44</option>
                            </select>
                            <input type="text" class="form-control" name="mobile" id="phoneNumber" placeholder="Phone Number*"
                                required>
                        </div>
                    </div>

                    <div class="mb-3 enquiry-field">
                        <label for="enquiryFor">Enquiry for :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="enquiryFor" id="myself"
                                value="myself" checked>
                            <label class="form-check-label" for="myself">Myself</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="enquiryFor" id="company"
                                value="company">
                            <label class="form-check-label" for="company">My Company</label>
                        </div>
                    </div>
                    <div class="mb-3" id="companyMembers" style="display:none;">
                        <input type="text" name="members" class="form-control" id="membersCount" placeholder="How many members?">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="privacyPolicy">
                        <label class="form-check-label" for="privacyPolicy">By providing your contact details,
                            you agree to our privacy policy</label>
                    </div>
                    <!--  <div class="form-group mt-3">
                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                        </div> -->
                    <div class="text-center">
                        <button class="btn btn-primary mt-4" data-animation="fadeInRight" data-delay=".8s" type="submit" id="submitBtn" name="submit-form"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
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
            <h3>PMP Exam and Certification</h3>
            <div class="accordion mt-4" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            How to get PMP Certification?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>A professional certification in project management necessitates the completion of
                                several important steps that must be taken sequentially. The following are the steps
                                involved in becoming a certified PMP:</p>
                            <ul>
                                <li>Fulfil the prerequisites</li>
                                <li>submit your application</li>
                                <li>Application review</li>
                                <li>Pay the exam fee</li>
                                <li>Schedule the exam</li>
                                <li>Prepare for the exam</li>
                                <li>Take the exam</li>
                                <li>Receive your results</li>
                            </ul>
                            <h5>Maintain your Certification:</h5>
                            <p>Meet the qualifying requirements: To be eligible for the
                                Project Management Professional certification, candidates must have a secondary
                                degree
                                (high school diploma, associate's degree, or equivalent) and at least five years of
                                project management experience, or a four-year degree and at least three years of
                                project
                                management experience. You also need to have completed 35 hours of project
                                management
                                training.</p>

                            <h5>Submit your application:</h5>
                            <p>As soon as you meet the qualifying conditions, you must submit
                                your application to take the PMP certification exam. You can do this online at the
                                Project Management Institute's website. You will have to provide details about your
                                schooling, work experience, and project management training.
                                Application review: The PMI will examine your application. Once your job history and
                                educational background have been verified, you will be informed if you are eligible
                                to
                                take the exam. They will notify you and request more information if they discover
                                any
                                discrepancies.</p>
                            <h5>Pay the exam fee:</h5>
                            <p>Once your application has been accepted, you will need to pay the test
                                fee. The price is $425 for PMI members and $595 for non-members.
                                Schedule the exam: Once you have paid the exam fee, you may schedule your exam. You
                                can
                                finish this online by visiting the PMI website. You are allowed to choose the time
                                and
                                day that are most convenient for you.</p>
                            <h5>Prepare for the exam:</h5>
                            <p>You can prepare for the test by going over the PMBOK (Project
                                Management Body of Knowledge) manual and other study materials. You may find a
                                number of
                                study materials and online courses to help you prepare.</p>
                            <h5>Take the exam:</h5>
                            <p>On exam day, you have to be at the testing site promptly and provide a
                                valid ID. The test consists of 200 multiple-choice questions that you have four
                                hours to
                                complete.</p>
                            <h5>Receive your results:</h5>
                            <p>Your test results will be sent to you immediately once it is over.
                                If you pass, you will receive your PMP certification in a few weeks. If you fail the
                                test, you can take it again.</p>
                            <h5>Maintain your Certification:</h5>
                            <p>You must complete sixty hours of professional development
                                activities to maintain your project management professional certification, which is
                                valid for three years after you receive it.</p>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What is Project Management Professional Certification?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            It is the Project Management Institute (PMI) that grants the widely accepted
                            professional designation of PMP Certification, or "Project Management Professional." The
                            Project Management Professional certification attests to your expertise as a trained
                            associate in project leadership and your adeptness in handling urgent situations. It
                            covers agile, predictive, and hybrid approaches. Individuals who have obtained the PMP
                            certification are acknowledged as exceptional leaders who possess the ability to inspire
                            their teams to work more efficiently.<br>
                            The Project Management Professional (PMP) certification is a worldwide recognized
                            certificate for anyone aspiring to work in project management. It is awarded to those
                            who meet the Project Management Institute's (PMI) stringent requirements for education,
                            employment history, and project management proficiency. You also need to receive the
                            necessary minimum score on the PMP exam in order to be certified.

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What are the Career Opportunities for PMP® Certified Professionals?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            You can pursue a variety of professional paths with a PMP certification, such as project
                            manager, program manager, portfolio manager, PMO Lead, and many more. You will find it
                            much simpler to move into the following jobs after completing Centuera's PMP
                            Certification program.
                            <ul>
                                <li>Project Coordinator</li>
                                <li>New Product Development Project Manager</li>
                                <li>Construction Project Manager</li>
                                <li>Information Technology Project Manager</li>
                                <li>Environmental Research Project Manager</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            How to apply for this PMP Certification training program?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            In order to be eligible to apply for this project management training program leading to
                            the PMP credential, you must meet the following requirements.

                            <h6>Step 1: Confirm Your Eligibility</h6>
                            <p>Ascertain that you possess the necessary coursework, instruction, and practical
                                experience to take the PMP Certification exam. Check to see if any of the following
                                describe you:
                                possess a four-year college or university degree, a CAPM® certification, and 35
                                hours of project management study or training. Additionally, throughout the last
                                eight years, you should have accumulated 36 months of project leadership experience.
                                OR
                                Hold a CAPM® certification, 35 hours of project management education or training,
                                and a high school or secondary school diploma. It is also required that you have led
                                projects for 60 months within the previous eight years.
                            </p>
                            <h6>Step 2: Gather Your Information</h6>
                            <p>Record the pertinent experience you have gained from previous training sessions and
                                assignments. Think about using specifics like:</p>
                            <ul>
                                <li>Projects you've led</li>
                                <li>Previous employers</li>
                                <li>Your specific role and duties</li>
                                <li>Duration of each project</li>
                                <li>Institutions where you received training</li>
                                <li>Courses completed</li>
                                <li>Qualifying hours</li>

                            </ul>
                            <h6>Step 3: Complete and Submit Your PMP Certification Application</h6>
                            <p>Create a PMI account to start the process, either now or at the application stage. To
                                ensure a smooth application procedure for the PMP Certification, heed these tips:
                            </p>
                            <ul>
                                <li>Acquaint yourself with techniques and resources for preparing for the PMP
                                    certification to make the process easier.</li>
                                <li>Keep your training materials and project management experience (Step 2) close at
                                    hand.</li>
                                <li>Take your time filling out the PMP Certification application, since you may save
                                    your work and come back to it at a later time if needed.</li>
                                <li>Make sure you have created a user account on PMI.org before to submitting your
                                    application.</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-1">
                <button class="read-more-btn">Read More</button>
            </div>
        </div>
        <!-- Right Section -->
        <div class="col-md-6">
            <div class="asymmetric-box">
                <img src="{{ asset('frontend-assets/img/all-img/PMP_certificate.jpg') }}" alt="PMP Certificate" class="certificate-img">
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
            <p class="mt-4"> The Project Management Professional (PMP) certification is designed to provide you with
                the knowledge and skills necessary to lead and manage projects effectively. Whether you're an
                experienced project manager or aspiring to become one, obtaining a PMP certification can transform
                your career and significantly benefit your organization.</p>

            <button class="transform-class-btn mt-4" data-bs-toggle="modal" data-bs-target="#contactUsModal">Skill
                Up Your Teams ></button>


            <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="contactUsModalLabel">Connect us</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="submitForm" method="post" action="https://centuera.com/Home/ContactForma">

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="fname" id="firstName"
                                        placeholder="First Name*" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="lname" id="lastName"
                                        placeholder="Last Name*" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email*"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <select class="form-select" id="countryCode">
                                            <option value="IN">IN +91</option>
                                            <option value="US">US +1</option>
                                            <option value="UK">UK +44</option>
                                        </select>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            placeholder="Phone Number*" required>
                                    </div>
                                </div>

                                <div class="mb-3 enquiry-field">
                                    <label>Enquiry for:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="enquiryFor" id="myself" value="myself" checked>
                                        <label class="form-check-label" for="myself">Myself</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="enquiryFor" id="company" value="company">
                                        <label class="form-check-label" for="company">My Company</label>
                                    </div>
                                </div>
                                <div class="mb-3" id="companyMembers" style="display:none;">
                                    <input type="text" class="form-control" name="members" id="membersCount"
                                        placeholder="How many members?*">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="privacyPolicy">
                                    <label class="form-check-label" for="privacyPolicy">By providing your
                                        contact details,
                                        you agree to our privacy policy</label>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" data-animation="fadeInRight" data-delay=".8s" type="submit" id="submitBtn" name="submit-form"><span>Submit<i class="fa fa-spinner fa-spin" id="submitSpin" style="display:none;"></i></span></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-section-wrapper">
            <div class="logo-section">
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-1.png') }}" alt="Company Logo 1"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-2.png') }}" alt="Company Logo 2"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-3.png') }}" alt="Company Logo 3"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-4.png') }}" alt="Company Logo 4"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-5.png') }}" alt="Company Logo 5"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-6.png') }}" alt="Company Logo 6"></div>

                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-7.png') }}" alt="Company Logo 7"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-8.png') }}" alt="Company Logo 8"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-9.png') }}" alt="Company Logo 9"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-10.png') }}" alt="Company Logo 10"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-11.png') }}" alt="Company Logo 11"></div>
                <div class="logo-box"><img src="{{ asset('frontend-assets/img/all-img/cmp-log-12.png') }}" alt="Company Logo 12"></div>
            </div>
            <div class="trusted-message">
                <p class="mt-2"><span><i class="ri-building-line"></i></span>
                    Trusted by the world's leading companies</p>
            </div>
        </div>
    </div>
</div>

<!-------------pmp-certification-faqs---------------->
<div class="container">
    <div class="parent-container">
        <div class="left-section">
            <h2>PMP Certification FAQs</h2>
            <div class="accordion">
                @if(isset($courseDetails) && $courseDetails->faqs && count($courseDetails->faqs))
                    @foreach($courseDetails->faqs as $faq)
                        <div class="accordion-item">
                            <button class="accordion-button">{{ $faq->title }}</button>
                            <div class="accordion-content">
                                {!! $faq->description !!}
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="accordion-item">
                        <button class="accordion-button">No FAQs available for this course.</button>
                        <div class="accordion-content">
                            <p>Please check back later.</p>
                        </div>
                    </div>
                @endif
                <button class="view-more">View More</button>
            </div>
        </div>
        <div class="right-section">
            <h2>Related Programs</h2>
            <div class="program-box">
                <h3>PRINCE2® Certification</h3>
                <small>Advanced</small>
                <div class="rating">
                    ★★★★☆ 4.5 (1000 learners)
                </div>
            </div>
            <div class="program-box">
                <h3>Lean Green Belt</h3>
                <small>Advanced</small>
                <div class="rating">
                    ★★★★☆ 4.6 (800 learners)
                </div>
            </div>
            <div class="program-box">
                <h3>CSM Certification</h3>
                <small>Advanced</small>
                <div class="rating">
                    ★★★★☆ 4.7 (600 learners)
                </div>
            </div>

        </div>
    </div>
</div>

<!------------------why-bootcamp-section---------------------->
<div class="container">
    <div class="container-for-bootcamp">
        <section class="why-bootcamp">
            <h2>Why Choose Our Online PMP Bootcamp?</h2>
            <div class="bootcamp-content">
                <div class="video-frame">
                    <iframe src="https://www.youtube.com/embed/x1POqDjbqmU" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <div class="info-sections">
                    <div class="info-section">
                        <h3>Comprehensive Curriculum</h3>
                        <p>Our bootcamp covers all aspects of the PMP certification, including the latest PMBOK
                            guidelines, ensuring you have the knowledge to succeed.</p>
                    </div>
                    <div class="info-section">
                        <h3>Flexible Learning</h3>
                        <p>With our online format, you can study at your own pace and fit your learning around your
                            schedule, making it ideal for busy professionals.</p>
                    </div>
                    <div class="info-section">
                        <h3>Expert Instructors</h3>
                        <p>Learn from experienced PMP-certified instructors who bring real-world project management
                            experience and insights to the course.</p>
                    </div>
                    <div class="info-section">
                        <h3>Interactive Experience</h3>
                        <p>Engage with interactive content, participate in live Q&A sessions, and join a community
                            of
                            fellow learners to enhance your learning experience.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!----------------------after-bootcamp-faqs--------------------------->
{{-- <div class="container">
    <div class="pmp-certification-last-faqs">
        <h2>PMP Certification FAQs</h2>
        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-button">Can I cancel my enrollment for the PMP Certification? Will I get a
                    refund?</button>
                <div class="accordion-content">
                    <p>It is possible to withdraw from the PMP Certification program if needed. After deducting the
                        PMP Certification exam fee, we will reimburse the full cost of the certification. You may
                        see our Refund Policy to find out more.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button">If I fail the PMP® Exam after completing the PMP Certification, how
                    soon can I retake it?</button>
                <div class="accordion-content">
                    <p>Following the completion of the PMP test course, you are given a year to pass the test. You
                        are allowed to take the PMP Certification test three times while you are eligible. Let's say
                        that throughout the course of your one-year eligibility term, you fail the test three times.
                        If so, you are not eligible to reapply for the certification for a year following the date
                        of your most recent exam. On the other hand, applicants may choose to apply for any other
                        PMI® certification following three unsuccessful attempts at the certification test.
                        You can seek a review of the PMI® Certification Department's decision in writing when
                        requesting for revaluation.
                    </p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button">Is the PMP® Exam fee included in the PMP Certification
                    fee?</button>
                <div class="accordion-content">
                    <p>PMP Certification is not applicable. The PMP Certification training we offer does not include
                        exam expenses. To take the test, you must pay the exam cost to Project Management Institute
                        (PMI)®. Customers who want assistance can get in touch with us via chat or phone if they
                        need help filling out the application.</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-button">How long is the PMP Certification valid?</button>
                <div class="accordion-content">
                    <p>For three years, the PMP Certification is valid. In a three-year cycle, you must earn 60
                        Professional Development Units (PDUs) in order to keep your PMP certification current.</p>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button">How can I download the PMP Certification?</button>
                <div class="accordion-content">
                    <p>Within six to eight weeks of passing the PMP Certification test, you will get your
                        certificate packet. Additionally, Credly will send you a digital badge that you can use to
                        celebrate your accomplishment on social media.</p>
                </div>
            </div>

            <button class="view-more">View More</button>
        </div>
    </div>
</div> --}}

<!-- Courses Section End -->
@endsection