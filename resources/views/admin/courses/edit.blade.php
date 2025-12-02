@extends('admin.layouts.layout')
@section('title', 'Edit Course')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@lang('Edit Course')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.course.index') }}">Home</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }} text-center fs-3">
                    {{ Session::get('error') }}
                </p>
            @endif

            <div class="content-body">
                <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> <!-- Start row -->
                        {{-- Left Column --}}
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    {{-- Title --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Title') <span class="text-danger">*</span></label>
                                        <input type="text" name="title" value="{{ old('title', $course->title) }}" class="form-control">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Slug') <span class="text-danger">*</span></label>
                                        <input type="text" name="slug" value="{{ old('slug', $course->slug) }}" class="form-control">
                                        @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Short Title --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Short Title') <span class="text-danger">*</span></label>
                                        <input type="text" name="short_title" value="{{ $course->short_title }}" class="form-control">
                                        @error('short_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Logo --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Logo')</label>
                                        <input type="file" name="logo" class="form-control">
                                        @if (!empty($course->logo))
                                            <div class="mb-1">
                                                <a href="{{ asset('uploads/logo/' . $course->logo) }}" target="_blank">
                                                    <span style="font-size: 13px;">View Image</span>
                                                </a>
                                            </div>
                                        @endif
                                        @error('logo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Category --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Category') <span class="text-danger">*</span></label>
                                        <select name="category" class="form-select">
                                            <option value="">@lang('Select Category')</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $course->category == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Short Description --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Short Description')</label>
                                        <textarea name="short_description" id="editor1" class="form-control" rows="3">{{ old('short_description', $course->short_description) }}</textarea>
                                        @error('short_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Description')</label>
                                        <textarea name="description" id="editor2" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Overview --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Course Overview')</label>
                                        <textarea name="overview" id="editor3" class="form-control" rows="3">{{ old('overview', $course->overview) }}</textarea>
                                        @error('overview')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">@lang('Duration(In Minutes)')</label>
                                        <input type="text" name="duration" value="{{ old('duration', $course->duration) }}" oninput="restrictToNumbers(this)" class="form-control">
                                        @error('duration')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Learners')</label>
                                        <input type="number" name="learner_field" value="{{ old('learner_field', $course->learner_field) }}" oninput="restrictToNumbers(this)" class="form-control">
                                        @error('learner_field')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    

                                    {{-- Business with Skilled --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Business With Skilled')</label>
                                        <input type="text" name="business_with_skilled" value="{{ old('business_with_skilled', $course->business_with_skilled) }}" class="form-control">
                                        @error('business_with_skilled')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Course Image --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Thumbnail Image')</label>
                                        <input type="file" name="image" class="form-control">
                                        @if (!empty($course->image))
                                            <div class="mb-1">
                                                <a href="{{ asset('uploads/courses/' . $course->image) }}" target="_blank">
                                                    <span style="font-size: 13px;">View Image</span>
                                                </a>
                                            </div>
                                        @endif
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Cover Image')</label>
                                        <input type="file" name="cover_image" class="form-control">
                                        @if (!empty($course->cover_image))
                                            <div class="mb-1">
                                                <a href="{{ asset('uploads/cover_image/' . $course->cover_image) }}" target="_blank">
                                                    <span style="font-size: 13px;">View Image</span>
                                                </a>
                                            </div>
                                        @endif
                                        @error('cover_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Certification Image --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Certification Image')</label>
                                        <input type="file" name="certification_image" class="form-control">
                                        @if (!empty($course->certification_image))
                                            <div class="mb-1">
                                                <a href="{{ asset('uploads/certifications/' . $course->certification_image) }}" target="_blank">
                                                    <span style="font-size: 13px;">View Image</span>
                                                </a>
                                            </div>
                                        @endif
                                        @error('certification_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">@lang('Upload Curriculum')</label>
                                        <input type="file" name="upload_curriculum" class="form-control">
                                        @if (!empty($course->upload_curriculum))
                                            <div class="mb-1">
                                                <a href="{{ asset('uploads/curriculum/' . $course->upload_curriculum) }}" target="_blank">
                                                    <span style="font-size: 13px;">View Image</span>
                                                </a>
                                            </div>
                                        @endif
                                        @error('upload_curriculum')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Video URL')</label>
                                        <input type="text" name="video_url" class="form-control" value="{{ old('video_url', $course->video_url) }}">
                                        <small class="text-danger">Add Embed Url 
                                            (e.g., https://www.youtube.com/embed/vakdDdP8hvw?si=nXKAPDSDNZa1rQNU)</small>
                                        @error('video_url')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            {{-- Course Curriculum Card --}}
                            <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Course Curriculum')</h3>
                                    <div id="curriculum-container">
                                        {{-- Eligibility --}}
                                        <div class="mb-2">
                                            <label class="form-label">@lang('Eligibility')</label>
                                            <textarea name="eligibility" id="editor4" class="form-control" rows="2">{{ old('eligibility', $course->eligibility) }}</textarea>
                                            @error('eligibility')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Prerequisites --}}
                                        <div class="mb-2">
                                            <label class="form-label">@lang('Prerequisites')</label>
                                            <textarea name="prerequisites" id="editor5" class="form-control" rows="2">{{ old('prerequisites', $course->prerequisites) }}</textarea>
                                            @error('prerequisites')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @php
                                            $oldTitles = old('curriculum_title');
                                            $oldDescriptions = old('curriculum_description');
                                        @endphp
                                        @if($oldTitles)
                                            @foreach($oldTitles as $i => $title)
                                                <div class="curriculum-item mb-2 border p-2 rounded">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Title')</label>
                                                        <input type="text" name="curriculum_title[]" value="{{ $title }}" class="form-control" placeholder="Enter title">
                                                        @error('curriculum_title.' . $i)
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Description')</label>
                                                        <textarea name="curriculum_description[]" class="form-control" id="curriculum-editor-{{ $i }}" rows="2" placeholder="Enter description">{{ $oldDescriptions[$i] ?? '' }}</textarea>
                                                        @error('curriculum_description.' . $i)
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm remove-curriculum" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @elseif(isset($curriculums) && count($curriculums))
                                            @foreach($curriculums as $i => $curriculum)
                                                <div class="curriculum-item mb-2 border p-2 rounded">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Title')</label>
                                                        <input type="text" name="curriculum_title[]" value="{{ $curriculum->title }}" class="form-control" placeholder="Enter title">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Description')</label>
                                                        <textarea name="curriculum_description[]" class="form-control" id="curriculum-editor-{{ $i }}" rows="2" placeholder="Enter description">{{ $curriculum->description }}</textarea>
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm remove-curriculum" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="curriculum-item mb-2 border p-2 rounded">
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Title')</label>
                                                    <input type="text" name="curriculum_title[]" value="" class="form-control" placeholder="Enter title">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Description')</label>
                                                    <textarea name="curriculum_description[]" class="form-control" id="curriculum-editor-0" rows="2" placeholder="Enter description"></textarea>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-curriculum" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                        <button type="button" id="add-curriculum" class="btn btn-sm btn-primary">
                                            + @lang('Add More Curriculum')
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Course trainning Card -->
                            <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Training Course Types')</h3>
                                    @php
                                        $trainingTypes = [
                                            'classroom' => 'Classroom Training',
                                            'online_bootcamp' => 'Online Bootcamp',
                                            'corporate' => 'Corporate Training'
                                        ];
                                        $oldTraining = old('training_course');
                                        $dbTraining = [];
                                        if (!empty($course->training_course)) {
                                            $dbTraining = json_decode($course->training_course, true);
                                        }
                                    @endphp
                                    @foreach ($trainingTypes as $type => $label)
                                        @php
                                            $status = $oldTraining[$type]['status'] ?? $dbTraining[$type]['status'] ?? null;
                                            $desc = $oldTraining[$type]['description'] ?? $dbTraining[$type]['description'] ?? '';
                                        @endphp
                                        <div class="curriculum-item mb-1 border p-2 rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h5>{{ $label }}</h5>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="training_course[{{ $type }}][status]" value="1" @if($status) checked @endif>
                                                </div>
                                            </div>
                                            <input type="hidden" name="training_course[{{ $type }}][level_name]" value="{{ $label }}">
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Description')</label>
                                                <textarea name="training_course[{{ $type }}][description]" class="form-control ckeditor" rows="3">{{ $desc }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- Rating Section Card --}}
                            <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-1">@lang('Rating')</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Rating</label>
                                            <input type="number" step="0.1" min="0" max="5" name="rating" value="{{ old('rating', $course->rating ?? '') }}" class="form-control" placeholder="Enter rating (0-5)">
                                            @error('rating')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Number of User Ratings</label>
                                            <input type="number" min="0" name="number_of_user_rating" value="{{ old('number_of_user_rating', $course->number_of_user_rating ?? '') }}" class="form-control" placeholder="Enter number of user ratings">
                                            @error('number_of_user_rating')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Guarantee Section Card -->
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h3 class="mb-1">Guarantee</h3>
                                    <div class="mb-2">
                                        <label class="form-label">Exam Pass Guarantee</label>
                                        <textarea name="exam_pass_guarantee" id="exam_pass_guarantee_editor" class="form-control ckeditor" rows="2" placeholder="Enter exam pass guarantee">{{ old('exam_pass_guarantee', $course->exam_pass_guarantee ?? '') }}</textarea>
                                        @error('exam_pass_guarantee')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">100% Money Back Guarantee</label>
                                        <textarea name="money_back_guarantee" id="money_back_guarantee_editor" class="form-control ckeditor" rows="2" placeholder="Enter 100% money back guarantee">{{ old('money_back_guarantee', $course->money_back_guarantee ?? '') }}</textarea>
                                        @error('money_back_guarantee')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                             <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Frequently Asked Questions')</h3>
                                    <div id="faq-container">
                                        @php
                                            $oldFaqs = old('faqs');
                                            $dbFaqs = isset($course) && $course->id ? $course->faqs ?? [] : [];
                                            if (isset($dbFaqs) && method_exists($dbFaqs, 'toArray')) {
                                                $dbFaqs = $dbFaqs->toArray();
                                            }
                                            $faqs = $oldFaqs ?? $dbFaqs;
                                        @endphp
                                        @if($faqs && count($faqs))
                                            @foreach($faqs as $i => $faq)
                                                <div class="faq-item mb-3 border p-2 rounded">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Question')</label>
                                                        <input type="text" name="faqs[{{ $i }}][title]" class="form-control" value="{{ is_array($faq) ? $faq['title'] ?? '' : $faq->title ?? '' }}" placeholder="Enter question">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Answer')</label>
                                                        <textarea name="faqs[{{ $i }}][description]" class="form-control faq-answer-editor" id="faq-answer-editor-{{ $i }}" rows="2" placeholder="Enter answer">{{ is_array($faq) ? $faq['description'] ?? '' : $faq->description ?? '' }}</textarea>
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm remove-faq" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="faq-item mb-3 border p-2 rounded">
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Question')</label>
                                                    <input type="text" name="faqs[0][title]" class="form-control" value="" placeholder="Enter question">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Answer')</label>
                                                    <textarea name="faqs[0][description]" class="form-control faq-answer-editor" id="faq-answer-editor-0" rows="2" placeholder="Enter answer"></textarea>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-faq" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-faq" class="btn btn-sm btn-primary mt-1">
                                        + @lang('Add More FAQ')
                                    </button>
                                </div>
                            </div>  
                        </div>

                        {{-- Right Column (Features) --}}
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Courses Key Features')</h3>
                                    <div id="feature-container" class="flex-grow-1">
                                        @php
                                            $oldFeatures = old('feature');
                                            $dbFeatures = isset($course) && $course->id ? $course->keyFeatures ?? [] : [];
                                            if (isset($dbFeatures) && method_exists($dbFeatures, 'toArray')) {
                                                $dbFeatures = $dbFeatures->toArray();
                                            }
                                        @endphp
                                        @if($oldFeatures)
                                            @foreach($oldFeatures as $i => $feature)
                                                <div class="input-group mb-2">
                                                    <input type="text" name="feature[]" value="{{ $feature }}" class="form-control" placeholder="Enter feature">
                                                    @error('feature.' . $i)
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <button type="button" class="btn btn-danger remove-feature" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @elseif(isset($dbFeatures) && count($dbFeatures))
                                            @foreach($dbFeatures as $i => $feature)
                                                <div class="input-group mb-2">
                                                    <input type="text" name="feature[]" value="{{ is_array($feature) ? $feature['feature'] : $feature->feature ?? $feature }}" class="form-control" placeholder="Enter feature">
                                                    <button type="button" class="btn btn-danger remove-feature" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="input-group mb-2">
                                                <input type="text" name="feature[]" value="" class="form-control" placeholder="Enter feature">
                                                <button type="button" class="btn btn-danger remove-feature" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-feature" class="btn btn-sm btn-primary mt-auto">
                                        + @lang('Add More Feature')
                                    </button>
                                </div>
                            </div>

                            {{-- Card 2: Skills Covered --}}
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Skills Covered')</h3>
                                    <div id="skills-container" class="flex-grow-1">
                                        @php
                                            $oldSkills = old('skill_name');
                                            $dbSkills = isset($course) && $course->id ? $course->skillsCovered ?? [] : [];
                                            if (isset($dbSkills) && method_exists($dbSkills, 'toArray')) {
                                                $dbSkills = $dbSkills->toArray();
                                            }
                                        @endphp
                                        @if($oldSkills)
                                            @foreach($oldSkills as $i => $skill)
                                                <div class="input-group mb-2">
                                                    <input type="text" name="skill_name[]" value="{{ $skill }}" class="form-control" placeholder="Enter skill">
                                                    @error('skill_name.' . $i)
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <button type="button" class="btn btn-danger remove-skill" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @elseif(isset($dbSkills) && count($dbSkills))
                                            @foreach($dbSkills as $i => $skill)
                                                <div class="input-group mb-2">
                                                    <input type="text" name="skill_name[]" value="{{ is_array($skill) ? $skill['skill_name'] : $skill->skill_name ?? $skill }}" class="form-control" placeholder="Enter skill">
                                                    <button type="button" class="btn btn-danger remove-skill" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="input-group mb-2">
                                                <input type="text" name="skill_name[]" value="" class="form-control" placeholder="Enter skill">
                                                <button type="button" class="btn btn-danger remove-skill" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-skill" class="btn btn-sm btn-primary mt-auto">
                                        + @lang('Add More Skill')
                                    </button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Exam and Certification')</h3>
                                    <div id="certification-container" class="flex-grow-1">
                                        @php
                                            $oldCerts = old('certifications');
                                            $dbCerts = isset($course) && $course->id ? $course->certifications ?? [] : [];
                                            if (isset($dbCerts) && method_exists($dbCerts, 'toArray')) {
                                                $dbCerts = $dbCerts->toArray();
                                            }
                                        @endphp
                                        @if($oldCerts)
                                            @foreach($oldCerts as $i => $cert)
                                                <div class="border rounded p-2 mb-2 certification-group">
                                                    <input type="text" name="certifications[{{ $i }}][title]" class="form-control mb-2" value="{{ $cert['title'] ?? '' }}" placeholder="Title">
                                                    @error('certifications.' . $i . '.title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <textarea name="certifications[{{ $i }}][description]" class="form-control certification-description-editor" id="certification-description-editor-{{ $i }}" rows="3" placeholder="Description">{{ $cert['description'] ?? '' }}</textarea>
                                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-certification" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @elseif(isset($dbCerts) && count($dbCerts))
                                            @foreach($dbCerts as $i => $cert)
                                                <div class="border rounded p-2 mb-2 certification-group">
                                                    <input type="text" name="certifications[{{ $i }}][title]" class="form-control mb-2" value="{{ is_array($cert) ? $cert['title'] : $cert->title ?? $cert }}" placeholder="Title">
                                                    <textarea name="certifications[{{ $i }}][description]" class="form-control certification-description-editor" id="certification-description-editor-{{ $i }}" rows="3" placeholder="Description">{{ is_array($cert) ? $cert['description'] : $cert->description ?? '' }}</textarea>
                                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-certification" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="border rounded p-2 mb-2 certification-group">
                                                <input type="text" name="certifications[0][title]" class="form-control mb-2" value="" placeholder="Title">
                                                <textarea name="certifications[0][description]" class="form-control certification-description-editor" id="certification-description-editor-0" rows="3" placeholder="Description"></textarea>
                                                <button type="button" class="btn btn-danger btn-sm mt-2 remove-certification" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-certification" class="btn btn-sm btn-primary mt-auto">
                                        + @lang('Add More Certification')
                                    </button>
                                </div>
                            </div>
                            {{-- Card 4: Trusted Partners --}}
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Trusted Partners')</h3>
                                    <div id="partner-container" class="flex-grow-1">
                                        @php
                                            $oldPartners = old('partners');
                                            $dbPartners = isset($course) && $course->id ? $course->trustedPartners ?? [] : [];
                                            if (isset($dbPartners) && method_exists($dbPartners, 'toArray')) {
                                                $dbPartners = $dbPartners->toArray();
                                            }
                                        @endphp
                                        @if($oldPartners)
                                            @foreach($oldPartners as $i => $partner)
                                                <div class="border rounded p-2 mb-2 partner-group">
                                                    <input type="text" name="partners[{{ $i }}][name]" value="{{ $partner['name'] ?? '' }}" class="form-control mb-2" placeholder="Partner Name">
                                                    @error('partners.' . $i . '.name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <input type="file" name="partners[{{ $i }}][logo]" class="form-control partner-logo" placeholder="Logo">
                                                    @if(!empty($partner['logo']))
                                                        <div class="mb-1">
                                                            <a href="{{ asset('uploads/partners/' . $partner['logo']) }}" target="_blank">
                                                                <span style="font-size: 13px;">View Image</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <small class="text-danger mb-2 partner-logo-error">Partner logo must be up to 200×200 pixels.</small><br>
                                                    @error('partners.' . $i . '.logo')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <button type="button" class="btn btn-danger btn-sm remove-partner mt-2" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @elseif(isset($dbPartners) && count($dbPartners))
                                            @foreach($dbPartners as $i => $partner)
                                                @php 
                                                    $logo = is_array($partner) ? ($partner['logo'] ?? null) : ($partner->logo ?? null);
                                                    $id = is_array($partner) ? ($partner['id'] ?? null) : ($partner->id ?? null);
                                                @endphp
                                                <div class="border rounded p-2 mb-2 partner-group">
                                                    <input type="hidden" name="partners[{{ $i }}][id]" value="{{ $id }}">
                                                    <input type="text" name="partners[{{ $i }}][name]" value="{{ is_array($partner) ? $partner['name'] : $partner->name ?? '' }}" class="form-control mb-2" placeholder="Partner Name">
                                                    <input type="file" name="partners[{{ $i }}][logo]" class="form-control partner-logo" placeholder="Logo">
                                                    <input type="hidden" name="partners[{{ $i }}][existing_logo]" value="{{ $logo }}">
                                                    
                                                    @if(!empty($logo))
                                                        <div class="mb-1">
                                                            <a href="{{ asset('uploads/partners/' . $logo) }}" target="_blank">
                                                                <span style="font-size: 13px;">View Image</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <small class="text-danger mb-2 partner-logo-error">Partner logo must be up to 200×200 pixels.</small><br>
                                                    <button type="button" class="btn btn-danger btn-sm remove-partner mt-2" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach

                                        @else
                                            <div class="border rounded p-2 mb-2 partner-group">
                                                <input type="text" name="partners[0][name]" value="" class="form-control mb-2" placeholder="Partner Name">
                                                <input type="file" name="partners[0][logo]" class="form-control partner-logo" placeholder="Logo">
                                                <small class="text-danger mb-2 partner-logo-error">Partner logo must be up to 200×200 pixels.</small><br>
                                                <button type="button" class="btn btn-danger btn-sm remove-partner mt-2" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-partner" class="btn btn-sm btn-primary mt-1">
                                        + @lang('Add More Partner')
                                    </button>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Why Choose Our Online Bootcamp?')</h3>
                                    <div id="video-container">
                                        @php
                                            $oldVideos = old('videos');
                                            $dbVideos = isset($course) && $course->id ? $course->videos ?? [] : [];
                                            if (isset($dbVideos) && method_exists($dbVideos, 'toArray')) {
                                                $dbVideos = $dbVideos->toArray();
                                            }
                                            $videos = $oldVideos ?? $dbVideos;
                                        @endphp
                                        @if($videos && count($videos))
                                            @foreach($videos as $i => $video)
                                                <div class="video-item mb-3 border p-2 rounded">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Title')</label>
                                                        <input type="text" name="videos[{{ $i }}][title]" value="{{ is_array($video) ? $video['title'] ?? '' : $video->title ?? '' }}" class="form-control" placeholder="Enter video title">
                                                        @error('videos.' . $i . '.title')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Description')</label>
                                                        <textarea name="videos[{{ $i }}][description]" class="form-control video-description-editor" id="video-description-editor-{{ $i }}" rows="2" placeholder="Enter description">{{ is_array($video) ? $video['description'] ?? '' : $video->description ?? '' }}</textarea>
                                                        @error('videos.' . $i . '.description')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm remove-video" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="video-item mb-3 border p-2 rounded">
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Title')</label>
                                                    <input type="text" name="videos[0][title]" value="" class="form-control" placeholder="Enter video title">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Description')</label>
                                                    <textarea name="videos[0][description]" class="form-control video-description-editor" id="video-description-editor-0" rows="2" placeholder="Enter description"></textarea>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-video" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-video" class="btn btn-sm btn-primary mt-1">
                                        + @lang('Add More')
                                    </button>
                                </div>
                            </div>
                            {{-- Card: Benefits --}}
                            <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Benefits')</h3>
                                    {{-- Common benefits description --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Course Benefits')</label>
                                        <textarea name="benefit_description" id="editor6" class="form-control" rows="2">{{ old('benefit_description', $course->benefits ?? $course->benefit_description ?? '') }}</textarea>
                                        @error('benefit_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="benefit-container">
                                        @php
                                            $oldBenefits = old('benefits');
                                        @endphp
                                        @if(is_array($oldBenefits) && count($oldBenefits))
                                            @foreach($oldBenefits as $i => $benefit)
                                                <div class="benefit-item border rounded p-2 mb-2">
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Designation')</label>
                                                        <input type="text" name="benefits[{{ $i }}][designation]" value="{{ $benefit['designation'] ?? '' }}" class="form-control" placeholder="Enter designation">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Salary Range')</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="number" step="0.01" name="benefits[{{ $i }}][salary_min]" value="{{ $benefit['salary_min'] ?? '' }}" class="form-control" placeholder="Min Salary">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" step="0.01" name="benefits[{{ $i }}][salary_max]" value="{{ $benefit['salary_max'] ?? '' }}" class="form-control" placeholder="Max Salary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">@lang('Company Images')</label>
                                                        <input type="file" name="benefits[{{ $i }}][company_images][]" class="form-control" multiple>
                                                        <small class="text-danger mb-2 partner-logo-error">Company Images must be up to 200×200 pixels.</small><br>
                                                        @php
                                                            $companyImages = [];
                                                            if (isset($benefit->company_images)) {
                                                                if (is_array($benefit->company_images)) {
                                                                    $companyImages = $benefit->company_images;
                                                                } else {
                                                                    $companyImages = json_decode($benefit->company_images, true) ?? [];
                                                                }
                                                            }
                                                        @endphp
                                                        @if(!empty($companyImages) && is_array($companyImages))
                                                            <div class="mt-2">
                                                                @foreach($companyImages as $img)
                                                                    <a href="{{ asset('uploads/premier_partner/' . $img) }}" target="_blank" style="margin-right:8px;">
                                                                        <img src="{{ asset('uploads/premier_partner/' . $img) }}" alt="Company Image" style="height:40px; width:40px; object-fit:cover; border-radius:4px; border:1px solid #ccc;" />
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm remove-benefit" @if($i == 0) disabled @endif>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @elseif(isset($benefits) && count($benefits))
                                         @foreach($benefits as $i => $benefit)
                                            @php
                                                $salary = is_array($benefit->salary) ? $benefit->salary : (json_decode($benefit->salary, true) ?? []);
                                            @endphp
                                            <div class="benefit-item border rounded p-2 mb-2">
                                                <input type="hidden" name="benefits[{{ $i }}][id]" value="{{ $benefit->id ?? '' }}">

                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Designation')</label>
                                                    <input type="text" name="benefits[{{ $i }}][designation]" value="{{ $benefit->designation ?? '' }}" class="form-control" placeholder="Enter designation">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Salary Range')</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="number" step="0.01" name="benefits[{{ $i }}][salary_min]" value="{{ $salary['min'] ?? '' }}" class="form-control" placeholder="Min Salary">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" step="0.01" name="benefits[{{ $i }}][salary_max]" value="{{ $salary['max'] ?? '' }}" class="form-control" placeholder="Max Salary">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Company Images')</label>
                                                    <input type="file" name="benefits[{{ $i }}][company_images][]" class="form-control" multiple>
                                                    @php
                                                        $companyImages = is_array($benefit->company) ? $benefit->company : json_decode($benefit->company, true);
                                                    @endphp
                                                    @if(!empty($companyImages))
                                                        <div class="mt-2">
                                                            @foreach($companyImages as $img)
                                                                <a href="{{ asset('uploads/company_images/' . $img) }}" target="_blank" style="margin-right:8px;">
                                                                    <img src="{{ asset('uploads/company_images/' . $img) }}" style="height:40px;width:40px;object-fit:cover;border-radius:4px;border:1px solid #ccc;">
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-benefit" @if($i == 0) disabled @endif>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        @endforeach

                                        @else
                                            <div class="benefit-item border rounded p-2 mb-2">
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Designation')</label>
                                                    <input type="text" name="benefits[0][designation]" class="form-control" placeholder="Enter designation">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Salary Range')</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="number" step="0.01" name="benefits[0][salary_min]" class="form-control" placeholder="Min Salary">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" step="0.01" name="benefits[0][salary_max]" class="form-control" placeholder="Max Salary">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">@lang('Company Images')</label>
                                                    <input type="file" name="benefits[0][company_images][]" class="form-control" multiple>
                                                    <small class="text-danger mb-2 partner-logo-error">Company Images must be up to 200×200 pixels.</small><br>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-benefit" disabled>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-benefit" class="btn btn-sm btn-primary mt-1">
                                        + @lang('Add More Benefit')
                                    </button>
                                </div>
                            </div>

                            {{-- SEO Section Card --}}
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h3 class="mb-2">SEO Section</h3>
                                    <div class="mb-2">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" value="{{ old('meta_title', (isset($course->meta_title) ? $course->meta_title : (isset($seo) ? $seo->meta_title : ''))) }}" class="form-control" placeholder="Enter meta title">
                                        @error('meta_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description_editor" class="form-control ckeditor" rows="2" placeholder="Enter meta description">{{ old('meta_description', (isset($course->meta_description) ? $course->meta_description : (isset($seo) ? $seo->meta_description : ''))) }}</textarea>
                                        @error('meta_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', (isset($course->meta_keywords) ? $course->meta_keywords : (isset($seo) ? $seo->meta_keyword : ''))) }}" class="form-control" placeholder="Enter meta keywords">
                                        @error('meta_keywords')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Premier Authorized Training Partner Card --}}
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h3 class="mb-2">Premier Authorized Training Partner</h3>
                                    <div id="premier-partner-container">
                                        @php
                                            $oldPremier = old('premier_partner');
                                            $dbPremier = [];
                                            if (!empty($course->authorized_training_partner)) {
                                                $dbPremier = json_decode($course->authorized_training_partner, true) ?? [];
                                            }
                                            $premierPartners = $oldPremier ?? $dbPremier;
                                        @endphp
                                        @if($premierPartners && count($premierPartners))
                                            @foreach($premierPartners as $i => $partner)
                                                <div class="premier-partner-item border rounded p-2 mb-2">
                                                    <div class="mb-2">
                                                        <label class="form-label">Image</label>
                                                        <input type="file" name="premier_partner[{{ $i }}][image]" class="form-control" accept="image/*">
                                                        @if(!empty($partner['image']))
                                                            <div class="mb-1">
                                                                <a href="{{ asset('uploads/premier_partner/' . $partner['image']) }}" target="_blank">
                                                                    <span style="font-size: 13px;">View Image</span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Text</label>
                                                        <input type="text" name="premier_partner[{{ $i }}][text]" class="form-control" placeholder="Enter text" value="{{ $partner['text'] ?? '' }}">
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm remove-premier-partner" @if($i == 0) disabled @endif><i class="fas fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="premier-partner-item border rounded p-2 mb-2">
                                                <div class="mb-2">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" name="premier_partner[0][image]" class="form-control" accept="image/*">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Text</label>
                                                    <input type="text" name="premier_partner[0][text]" class="form-control" placeholder="Enter text">
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-premier-partner" disabled><i class="fas fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-premier-partner" class="btn btn-sm btn-primary mt-1">
                                        + Add More
                                    </button>
                                </div>
                            </div>

                            <!-- Related Course -->
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h3 class="mb-2">Related Courses</h3>
                                    @php
                                        $oldRelated = old('related_courses');
                                        $dbRelated = [];
                                        if (!empty($course->related_courses)) {
                                            $dbRelated = is_array($course->related_courses) ? $course->related_courses : json_decode($course->related_courses, true);
                                        }
                                        $selectedRelated = $oldRelated ?? $dbRelated ?? [];
                                    @endphp
                                    <select name="related_courses[]" id="related_courses" class="form-select select2" multiple>
                                        <option value="">Select</option>
                                        @php
                                            // Ensure $selectedRelated is a flat array of string IDs only
                                            $selectedRelatedIds = collect($selectedRelated)
                                                ->map(function($item) {
                                                    if (is_array($item)) {
                                                        return isset($item['id']) ? (string)$item['id'] : (isset($item['value']) ? (string)$item['value'] : null);
                                                    }
                                                    return is_scalar($item) ? (string)$item : null;
                                                })
                                                ->filter(function($v) { return is_string($v) && $v !== ''; })
                                                ->values()
                                                ->all();
                                        @endphp
                                        @foreach($courses as $c)
                                            <option value="{{ $c->id }}" @if(in_array((string)$c->id, $selectedRelatedIds)) selected @endif>{{ $c->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End row -->
                    <button type="submit" class="btn btn-primary mt-2">@lang('Update Course')</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
@endpush
@push('script')
    <script>
        // Set curriculumEditorIndex to the next available index based on existing fields
        let curriculumEditorIndex = (function() {
            let max = 0;
            document.querySelectorAll('[id^="curriculum-editor-"]').forEach(function(el) {
                let match = el.id.match(/curriculum-editor-(\d+)/);
                if (match && parseInt(match[1]) > max) max = parseInt(match[1]);
            });
            return max + 1;
        })();

        window.addEventListener("load", function() {
            // Initialize CKEditor for all curriculum description fields and other editors
            const selectors = ['#editor1', '#editor2', '#editor3', '#editor4', '#editor5', '#editor6'];
            selectors.forEach(function(selector) {
                const el = document.querySelector(selector);
                if (el && !el.classList.contains('ck-editor__editable')) {
                    ClassicEditor.create(el).catch(console.error);
                }
            });
            // Initialize CKEditor for all curriculum description fields present on load
            document.querySelectorAll('[id^="curriculum-editor-"]').forEach(function(el) {
                if (el && !el.classList.contains('ck-editor__editable')) {
                    ClassicEditor.create(el).catch(console.error);
                }
            });
            // Initialize CKEditor for all .ckeditor textareas (including training course descriptions)
            document.querySelectorAll('textarea.ckeditor').forEach(function(el) {
                if (el && !el.classList.contains('ck-editor__editable')) {
                    ClassicEditor.create(el).catch(console.error);
                }
            });
            // Initialize CKEditor for all certification description fields present on load
            document.querySelectorAll('textarea.certification-description-editor').forEach(function(el) {
                if (el && !el.classList.contains('ck-editor__editable')) {
                    ClassicEditor.create(el).catch(console.error);
                }
            });
        });

        $(document).ready(function() {
            // Features
            $('#add-feature').on('click', function() {
                let lastInput = $('#feature-container input[name="feature[]"]').last();
                if (lastInput.length && !lastInput.val().trim()) {
                    lastInput.focus();
                    return;
                }
                let inputGroup = `
                <div class="input-group mb-2">
                    <input type="text" name="feature[]" class="form-control" placeholder="Enter feature">
                    <button type="button" class="btn btn-danger remove-feature"><i class="fas fa-trash"></i></button>
                </div>`;
                $('#feature-container').append(inputGroup);
            });
            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.input-group').remove();
            });
            // Skills
            $('#add-skill').on('click', function() {
                let lastInput = $('#skills-container input[name="skill_name[]"]').last();
                if (lastInput.length && !lastInput.val().trim()) {
                    lastInput.focus();
                    return;
                }
                let inputGroup = `
                <div class="input-group mb-2">
                    <input type="text" name="skill_name[]" class="form-control" placeholder="Enter skill">
                    <button type="button" class="btn btn-danger remove-skill"><i class="fas fa-trash"></i></button>
                </div>`;
                // Insert new input just before the add button so button stays at the bottom
                $('#add-skill').before(inputGroup);
            });
            $(document).on('click', '.remove-skill', function() {
                $(this).closest('.input-group').remove();
            });
            // Curriculum
            $('#add-curriculum').on('click', function() {
                let newEditorId = `curriculum-editor-${curriculumEditorIndex}`;
                let curriculumItem = `
                <div class="curriculum-item mb-2 border p-2 rounded">
                    <div class="mb-2">
                        <label class="form-label">@lang('Title')</label>
                        <input type="text" name="curriculum_title[]" class="form-control" placeholder="Enter title">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">@lang('Description')</label>
                        <textarea name="curriculum_description[]" id="${newEditorId}" class="form-control" rows="2" placeholder="Enter description"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-curriculum"><i class="fas fa-trash"></i></button>
                </div>`;
                $('#curriculum-container').find('#add-curriculum').before(curriculumItem);
                setTimeout(function() {
                    const newEditor = document.getElementById(newEditorId);
                    if (newEditor && !newEditor.classList.contains('ck-editor__editable')) {
                        ClassicEditor.create(newEditor).then(editor => {
                            newEditor._ckInstance = editor;
                        }).catch(console.error);
                    }
                }, 100);
                curriculumEditorIndex++;
            });
            $(document).on('click', '.remove-curriculum', function() {
                let item = $(this).closest('.curriculum-item');
                let textarea = item.find('textarea');
                if (textarea.length && textarea.attr('id')) {
                    let el = document.getElementById(textarea.attr('id'));
                    if (el && el._ckInstance) {
                        el._ckInstance.destroy().then(() => {
                            item.remove();
                        });
                        return;
                    }
                }
                item.remove();
            });
            $(document).on('click', '.remove-curriculum', function() {
                let item = $(this).closest('.curriculum-item');
                let textarea = item.find('textarea');
                if (textarea.length && textarea.attr('id')) {
                    let el = document.getElementById(textarea.attr('id'));
                    if (el && el._ckInstance) {
                        el._ckInstance.destroy().then(() => {
                            item.remove();
                        });
                        return;
                    }
                }
                item.remove();
            });

            // Set certIndex to the next available index based on existing fields
            let certIndex = $('#certification-container .certification-group').length;
            $(document).on('click', '#add-certification', function() {
                let html = `
                <div class="border rounded p-2 mb-2 certification-group">
                    <input type="text" name="certifications[${certIndex}][title]" class="form-control mb-2" placeholder="Title" value="{{ old('certifications.${certIndex}.title') }}">
                    <textarea name="certifications[${certIndex}][description]" class="form-control certification-description-editor" id="certification-description-editor-${certIndex}" rows="3" placeholder="Description">{{ old('certifications.${certIndex}.description') }}</textarea>
                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-certification"><i class="fas fa-trash"></i></button>
                </div>`;
                $('#certification-container').append(html);
                // Wait for DOM to update, then initialize CKEditor for the new textarea
                setTimeout(function() {
                    const newEditor = document.getElementById(`certification-description-editor-${certIndex}`);
                    if (newEditor && !newEditor.classList.contains('ck-editor__editable')) {
                        ClassicEditor.create(newEditor).catch(console.error);
                    }
                }, 100);
                certIndex++;
            });

            $(document).on('click', '.remove-certification', function() {
                $(this).closest('.certification-group').remove();
            });
            let partnerIndex = 1;

            $('#add-partner').on('click', function() {
                const group = $(`
                <div class="border rounded p-2 mb-2 partner-group">
                    <input type="text" name="partners[${partnerIndex}][name]" class="form-control mb-2" placeholder="Partner Name">
                    <input type="file" name="partners[${partnerIndex}][logo]" class="form-control mb-2" placeholder="Logo">
                    <button type="button" class="btn btn-danger btn-sm remove-partner"><i class="fas fa-trash"></i></button>
                </div>
            `);

                $('#partner-container').append(group);
                partnerIndex++;
            });

            $(document).on('click', '.remove-partner', function() {
                $(this).closest('.partner-group').remove();
            });
            // Video Section: Add/Remove & CKEditor
            let videoIndex = $('#video-container .video-item').length;
            $('#add-video').click(function() {
                let newIndex = videoIndex;
                const newVideo = `
                <div class="video-item mb-3 border p-2 rounded">
                    <div class="mb-2">
                        <label class="form-label">@lang('Title')</label>
                        <input type="text" name="videos[${newIndex}][title]" class="form-control" placeholder="Enter video title">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">@lang('Description')</label>
                        <textarea name="videos[${newIndex}][description]" class="form-control video-description-editor" id="video-description-editor-${newIndex}" rows="2" placeholder="Enter description"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-video"><i class="fas fa-trash"></i></button>
                </div>
                `;
                $('#video-container').append(newVideo);
                setTimeout(function() {
                    ClassicEditor.create(document.getElementById(`video-description-editor-${newIndex}`)).catch(console.error);
                }, 100);
                videoIndex++;
            });

            $(document).on('click', '.remove-video', function() {
                if($('#video-container .video-item').length > 1) {
                    $(this).closest('.video-item').remove();
                }
            });

            // Initialize CKEditor for all video description editors on load
            $('#video-container .video-description-editor').each(function() {
                if (!$(this).hasClass('ck-editor__editable')) {
                    ClassicEditor.create(this).catch(console.error);
                }
            });
            // Inside the script section
            // FAQ Section: Add/Remove & CKEditor
            let faqIndex = $('#faq-container .faq-item').length;
            // Initialize CKEditor for all FAQ answer editors on load
            $('#faq-container .faq-answer-editor').each(function() {
                if (!$(this).hasClass('ck-editor__editable')) {
                    ClassicEditor.create(this).catch(console.error);
                }
            });
            $('#add-faq').click(function() {
                let newIndex = faqIndex;
                const newFaq = `
                <div class="faq-item mb-3 border p-2 rounded">
                    <div class="mb-2">
                        <label class="form-label">@lang('Question')</label>
                        <input type="text" name="faqs[${newIndex}][title]" class="form-control" placeholder="Enter question">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">@lang('Answer')</label>
                        <textarea name="faqs[${newIndex}][description]" class="form-control faq-answer-editor" id="faq-answer-editor-${newIndex}" rows="2" placeholder="Enter answer"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-faq"><i class="fas fa-trash"></i></button>
                </div>
                `;
                $('#faq-container').append(newFaq);
                setTimeout(function() {
                    ClassicEditor.create(document.getElementById(`faq-answer-editor-${newIndex}`)).catch(console.error);
                }, 100);
                faqIndex++;
            });
            $(document).on('click', '.remove-faq', function() {
                if($('#faq-container .faq-item').length > 1) {
                    $(this).closest('.faq-item').remove();
                }
            });
            let benefitIndex = $('#benefit-container .benefit-item').length;
            $('#add-benefit').on('click', function() {
                let html = `<div class="benefit-item border rounded p-2 mb-2">
                    <div class="mb-2">
                        <label class="form-label">@lang('Designation')</label>
                        <input type="text" name="benefits[${benefitIndex}][designation]" class="form-control" placeholder="Enter designation">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">@lang('Salary Range')</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" step="0.01" name="benefits[${benefitIndex}][salary_min]" class="form-control" placeholder="Min Salary">
                            </div>
                            <div class="col-md-6">
                                <input type="number" step="0.01" name="benefits[${benefitIndex}][salary_max]" class="form-control" placeholder="Max Salary">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">@lang('Company Images')</label>
                        <input type="file" name="benefits[${benefitIndex}][company_images][]" class="form-control" multiple>
                        <small class="text-danger mb-2 partner-logo-error">Company Images must be up to 200×200 pixels.</small><br>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-benefit">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>`;

                $('#benefit-container').append(html);
                benefitIndex++;
            });

            $(document).on('click', '.remove-benefit', function() {
                if($('#benefit-container .benefit-item').length > 1) {
                    $(this).closest('.benefit-item').remove();
                }
            });
            $('#add-premier-partner').on('click', function() {
                var container = $('#premier-partner-container');
                var items = container.find('.premier-partner-item');
                var lastItem = items.last();
                var newIndex = items.length;
                var newItem = lastItem.clone();

                // Clear file input and text
                newItem.find('input[type="file"]').val("");
                newItem.find('input[type="text"]').val("");
                newItem.find('a').remove(); // Remove view image link

                // Update input names
                newItem.find('input[type="file"]').attr('name', 'premier_partner[' + newIndex + '][image]');
                newItem.find('input[type="text"]').attr('name', 'premier_partner[' + newIndex + '][text]');

                // Enable remove button except for first
                newItem.find('.remove-premier-partner').prop('disabled', false);

                container.append(newItem);
            });

            // Remove item
            $(document).on('click', '.remove-premier-partner', function() {
                if (!$(this).is(':disabled')) {
                    $(this).closest('.premier-partner-item').remove();
                }
            });
        });
    </script>
@endpush
