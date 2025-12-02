<div class="row">
    @forelse($courses as $course)
        <div class="col-lg-6 col-sm-6">
            <div class="single-courses-box mb-25 box-shadow-2">
                <div class="image mb-20 position-relative">
                    <a href="{{ route('course.details', $course->slug) }}">
                        <img src="{{ asset('uploads/courses/'. $course->image) }}" alt="image">
                    </a>
                    <div class="cr-tag">
                        <a href="{{ $course->getCategory->name ?? '' }}">{{ $course->getCategory->name ?? '' }}</a>
                    </div>
                </div>
                <div class="content">
                    <div class="meta-info mb-20 d-flex align-items-center justify-content-between">
                        <h3 class="mb-1 fs-20">
                            <a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                        </h3>
                        @if($course->getCourseSchedule && $course->getCourseSchedule->prices)
                            <div class="cr-price px-2">
                                <h5 class="fs-16 text-nowrap">
                                    <span class="price">
                                        {{ $course->getCourseSchedule->country->currency }}  
                                        {{ $course->getCourseSchedule->prices->discount_price ?? 0 }}
                                    </span> 
                                </h5>
                                <span class="old-price">
                                    {{ $course->getCourseSchedule->country->currency }}  
                                    {{ $course->getCourseSchedule->prices->original_price }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center rating-section">
                    @php
                        $rating = round($course->average_rating);
                        $maxStars = 5;
                    @endphp

                    <ul class="d-flex list-unstyle customer-ratings">
                        @for ($i = 1; $i <= $maxStars; $i++)
                            @if ($i <= $rating)
                                <li><i class="ri-star-fill"></i></li>
                            @else
                                <li><i class="ri-star-line"></i></li>
                            @endif
                        @endfor
                        <li><span>({{ number_format($course->average_rating, 1) }})</span></li>
                    </ul>

                    <ul class="cr-items d-flex align-items-center justify-content-center gap-2 list-unstyle">
                        <li class="mr-15">
                            <i class="ri-team-fill"></i> 
                            <span>{{ number_format($course->learner_field + $course->getRating->count()) }} Learners</span>
                        </li>
                        <li><i class="ri-time-line"></i> <span>{{ round($course->duration/60, 2) }} Hrs</span></li>
                    </ul>
                </div>
                <div class="curriculum-certificate">
                    <a href="{{ route('course.details', $course->slug) }}" class="view-certification">View Program</a>
                    @if($course->upload_curriculum != null)
                        <button class="view-curiculum" data-bs-toggle="modal" data-course-id="{{ $course->id }}" data-bs-target="#curriculumModal"><i class="ri-download-line"></i><span>Curriculum</span></button>
                    @endif
                </div>
            </div>
        </div>
    @empty
    <div class="d-flex justify-content-center align-items-center">
        <p>No Course found</p>
    </div>
    @endforelse
</div>

@if ($courses->count() > 0)
    <ul class="page-nav list-style text-end p-0 mt-40">
        @if ($courses->onFirstPage())
            <li><span><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></span></li>
        @else
            <li><a href="{{ $courses->previousPageUrl() }}"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></a></li>
        @endif

        @for ($i = 1; $i <= $courses->lastPage(); $i++)
            <li>
                <a class="{{ $courses->currentPage() == $i ? 'active' : '' }}"
                href="{{ $courses->url($i) }}">
                {{ $i }}
                </a>
            </li>
        @endfor

        @if ($courses->hasMorePages())
            <li><a href="{{ $courses->nextPageUrl() }}"><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></a></li>
        @else
            <li><span><img src="{{ asset('frontend-assets/img/icon/long-arrow.svg')}}" alt="icon"></span></li>
        @endif
    </ul>
@endif
