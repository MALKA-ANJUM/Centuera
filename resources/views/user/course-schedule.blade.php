@extends('user.layouts.layout')
@section('title', 'Course Details')
@section('content')
<section class="course-container-pmp">
    <div class="container p-0">
        <h2 class="schedule-heading">Schedule for {{ $course->title ?? 'Course' }}</h2>
        <h4 class="sparkling-box"><span><i class="ri-checkbox-circle-line"></i></span> Live Online Classes</h4>
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
                    <div class="total-box-schedule">
                        <div class="main-box-schedule">
                            <div class="scdule-left">
                                {{-- Date & Batch --}}
                                <div class="date-batch">
                                    <div class="date-one">
                                        <h3>
                                            {{ \Carbon\Carbon::parse($schedule->start_date)->format('M d') }}
                                            <sup>{{ \Carbon\Carbon::parse($schedule->start_date)->format('S') }}</sup>
                                            -
                                            {{ \Carbon\Carbon::parse($schedule->end_date)->format('M d') }}
                                            <sup>{{ \Carbon\Carbon::parse($schedule->end_date)->format('S') }}</sup>
                                        </h3>
                                    </div>
                                    <div class="batch-one">
                                        <h4>
                                            <span class='w3-text-red bold500'>
                                                {{ ucfirst($schedule->type ?? '') }} Batch
                                            </span>
                                        </h4>
                                    </div>
                                </div>

                                {{-- Time & Duration --}}
                                <p class="evening">
                                    <i class="ri-sun-line"></i>
                                    <span>{{ ucfirst($schedule->type) }}</span>
                                    {{ $schedule->starttime }} - {{ $schedule->end_time }} {{ $schedule->time_zone }}
                                    | {{ \Carbon\Carbon::parse($schedule->start_date)->diffInDays(\Carbon\Carbon::parse($schedule->end_date)) + 1 }} Days
                                </p>

                                {{-- Class Type Display --}}
                                <p>
                                    <i class="{{ $schedule->type === 'online' ? 'ri-computer-fill' : 'ri-user-fill' }}"></i>
                                    <span>{{ $schedule->batche === 'Classroom' ? 'Classroom' : 'Live Online Class' }}</span>
                                </p>
                            </div>

                            {{-- Price section loaded via AJAX --}}
                         @foreach($schedule->prices as $price)
    <div class="scdule-ctr">
        <div class="off-prixe">
            <p>₹ {{ $price->discount_price }}
               <del>₹ {{ $price->original_price }}</del>
            </p>
        </div>
        <div class="offer">
            <p>{{ round(100 - ($price->discount_price / $price->original_price * 100)) }}% off</p>
        </div>
    </div>
    <div class="scdule-right">
        <div class="sedule-entroll">
            <a href="{{ $price->enroll_link ?? '#' }}" class="btn enroll-orange btn-md">Enroll Now</a>
        </div>
    </div>
@endforeach

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
@push('script')
<script>
   $(document).ready(function() { debugger;
    var countryId = localStorage.getItem('selected_country_id') || 0;

    $.ajax({
        url: '{{ route("user.set.country") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            country_id: countryId
        },
        success: function(response) {debugger;
            console.log("Country stored in session:", response);
        }
    });
});
</script>
@endpush