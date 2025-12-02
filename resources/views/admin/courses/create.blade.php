@extends('admin.layouts.layout')
@section('title', 'Add Course')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@lang('Add Course')</h2>
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
                <form id="course-form" action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="" id="courseId">

                    <div class="row"> <!-- Start row -->
                        {{-- Left Column --}}
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    {{-- Title --}}
                                     <h3 class="mb-2">@lang('Course Details')</h3>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Title') <span class="text-danger">*</span></label>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Short Title --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Short Title') <span class="text-danger">*</span></label>
                                        <input type="text" name="short_title" value="{{ old('short_title') }}" class="form-control">
                                        @error('short_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Logo --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Logo')</label>
                                       <input type="file" name="logo" class="form-control">
                                        @error('short_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Category --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Category') <span class="text-danger">*</span></label>
                                        <select name="category" class="form-select">
                                            <option value="">@lang('Select Category')</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
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
                                        <textarea name="short_description" id="editor1" class="form-control" rows="3">{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Description')</label>
                                        <textarea name="description" id="editor2" class="form-control" rows="4">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Overview --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Course Overview')</label>
                                        <textarea name="overview" id="editor3" class="form-control" rows="3">{{ old('overview') }}</textarea>
                                        @error('overview')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Business with Skilled --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Business With Skilled')</label>
                                        <input type="text" name="business_with_skilled" value="{{ old('business_with_skilled') }}" class="form-control">
                                        @error('business_with_skilled')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Duration(In Minutes)')</label>
                                        <input type="text" name="duration" value="{{ old('duration') }}" oninput="restrictToNumbers(this)" class="form-control">
                                        @error('duration')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Learners')</label>
                                        <input type="number" name="learner_field" value="{{ old('learner_field') }}" oninput="restrictToNumbers(this)" class="form-control">
                                        @error('learner_field')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Course Image --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Thumbnail Image')</label>
                                        <input type="file" name="image" class="form-control">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Cover Image')</label>
                                        <input type="file" name="cover_image" class="form-control">
                                        @error('cover_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Certification Image --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Certification Image')</label>
                                        <input type="file" name="certification_image" class="form-control">
                                        @error('certification_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">@lang('Upload Curriculum')</label>
                                        <input type="file" name="upload_curriculum" class="form-control">
                                        @error('upload_curriculum')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">@lang('Video URL')</label>
                                        <input type="text" name="video_url" class="form-control">
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
                                        <textarea name="eligibility" id="editor4" class="form-control" rows="2">{{ old('eligibility') }}</textarea>
                                        @error('eligibility')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Prerequisites --}}
                                    <div class="mb-2">
                                        <label class="form-label">@lang('Pre-requisites')</label>
                                        <textarea name="prerequisites" id="editor5" class="form-control" rows="2">{{ old('prerequisites') }}</textarea>
                                        @error('prerequisites')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                        <div class="curriculum-item mb-2 border p-2 rounded">
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Title')</label>
                                                <input type="text" name="curriculum_title[]" value="{{ old('curriculum_title.0') }}" class="form-control"
                                                    placeholder="Enter title">
                                                @error('curriculum_title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Description')</label>
                                                <textarea name="curriculum_description[]" class="form-control" id="curriculum-editor-0" rows="2"
                                                    placeholder="Enter description">{{ old('curriculum_description.0') }}</textarea>
                                                @error('curriculum_description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-curriculum"
                                                disabled><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <button type="button" id="add-curriculum" class="btn btn-sm btn-primary">
                                        + @lang('Add More Curriculum')
                                    </button>
                                </div>
                            </div>

                           <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Training Course Types')</h3>
                                    @php
                                        $trainingTypes = [
                                            'classroom' => 'Classroom Training',
                                            'online_bootcamp' => 'Online Bootcamp',
                                            'corporate' => 'Corporate Training'
                                        ];
                                    @endphp
                                    @foreach ($trainingTypes as $type => $label)
                                        <div class="curriculum-item mb-1 border p-2 rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h5>{{ $label }}</h5>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="training_course[{{ $type }}][status]" value="1" checked>
                                                </div>
                                            </div>
                                                <input type="hidden" name="training_course[{{ $type }}][level_name]" value="{{ $label }}">
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Description')</label>
                                                <textarea name="training_course[{{ $type }}][description]" class="form-control ckeditor" rows="3"></textarea>
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
                                            <input type="number" step="0.1" min="0" max="5" name="rating" value="{{ old('rating') }}" class="form-control" placeholder="Enter rating (0-5)">
                                            @error('rating')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Number of User Ratings</label>
                                            <input type="number" min="0" name="number_of_user_rating" value="{{ old('number_of_user_rating') }}" class="form-control" placeholder="Enter number of user ratings">
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
                                        <textarea name="exam_pass_guarantee" id="exam_pass_guarantee_editor" class="form-control ckeditor" rows="2" placeholder="Enter exam pass guarantee">{{ old('exam_pass_guarantee') }}</textarea>
                                        @error('exam_pass_guarantee')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">100% Money Back Guarantee</label>
                                        <textarea name="money_back_guarantee" id="money_back_guarantee_editor" class="form-control ckeditor" rows="2" placeholder="Enter 100% money back guarantee">{{ old('money_back_guarantee') }}</textarea>
                                        @error('money_back_guarantee')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Frequently Asked Questions -->
                             <div class="card mt-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Frequently Asked Questions')</h3>
                                    <div id="faq-container">
                                        <div class="faq-item mb-3 border p-2 rounded">
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Question')</label>
                                                <input type="text" name="faqs[0][title]" class="form-control" value="{{ old('faqs.0.title') }}" placeholder="Enter question">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Answer')</label>
                                                <textarea name="faqs[0][description]" class="form-control faq-answer-editor" id="faq-answer-editor-0" rows="2" placeholder="Enter answer">{{ old('faqs.0.description') }}</textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-faq" disabled><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <button type="button" id="add-faq" class="btn btn-sm btn-primary mt-1">
                                        + @lang('Add More FAQ')
                                    </button>
                                </div>
                            </div>

                            <!-- Course Videos Card -->
                        </div>

                        {{-- Right Column (Features) --}}
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h3 class="mb-2">@lang('Courses Key Features')</h3>
                                    <div id="feature-container" class="flex-grow-1">
                                        <div class="input-group mb-2">
                                            <input type="text" name="feature[]" value="{{ old('feature.0') }}" class="form-control"
                                                placeholder="Enter feature">
                                                @error('feature.*')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            <button type="button" class="btn btn-danger remove-feature" disabled><i
                                                    class="fas fa-trash"></i></button>
                                        </div>
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
                                        <div class="input-group mb-2">
                                            <input type="text" name="skill_name[]" value="{{ old('skill_name.0') }}" class="form-control"
                                                placeholder="Enter skill">
                                            @error('skill_name.*')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <button type="button" class="btn btn-danger remove-skill" disabled><i
                                                    class="fas fa-trash"></i></button>
                                        </div>
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
                                        <div class="border rounded p-2 mb-2 certification-group">
                                            <input type="text" name="certifications[0][title]"
                                                class="form-control mb-2" value="{{ old('certifications.0.title') }}" placeholder="Title">
                                            @error('certifications.0.title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <textarea name="certifications[0][description]" class="form-control certification-description-editor" id="certification-description-editor-0" rows="3" placeholder="Description">{{ old('certifications.0.description') }}</textarea>
                                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-certification"
                                                disabled><i class="fas fa-trash"></i></button>
                                        </div>
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
                                        <div class="border rounded p-2 mb-2 partner-group">
                                            <input type="text" name="partners[0][name]" value="{{ old('partners.0.name') }}" class="form-control mb-2"
                                                placeholder="Partner Name">
                                            @error('partners.0.name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="file" name="partners[0][logo]" class="form-control partner-logo"
                                                placeholder="Logo">
                                            <small class="text-danger mb-2 partner-logo-error">Partner logo must be up to 200×200 pixels.</small><br>
                                            <!-- <div class="error text-danger small logo-error"></div> -->
                                            @error('partners.0.logo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <button type="button" class="btn btn-danger btn-sm remove-partner mt-2"
                                                disabled><i class="fas fa-trash"></i></button>
                                        </div>
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
                                        <div class="video-item mb-3 border p-2 rounded">
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Title')</label>
                                                <input type="text" name="videos[0][title]" value="{{ old('videos.0.title') }}" class="form-control"
                                                    placeholder="Enter video title">
                                                @error('videos.0.title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">@lang('Description')</label>
                                                <textarea name="videos[0][description]" class="form-control video-description-editor" id="video-description-editor-0" rows="2" placeholder="Enter description">{{ old('videos.0.description') }}</textarea>
                                                @error('videos.0.description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-video" disabled><i
                                                    class="fas fa-trash"></i></button>
                                        </div>
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
                                    <textarea name="benefit_description" id="editor6" class="form-control" rows="2">{{ old('benefit_description') }}</textarea>
                                    @error('benefit_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div id="benefit-container">
                                    <div class="benefit-item border rounded p-2 mb-2">
                                        {{-- Designation --}}
                                        <div class="mb-2">
                                            <label class="form-label">@lang('Designation')</label>
                                            <input type="text" name="benefits[0][designation]" value="{{ old('benefits.0.designation') }}" class="form-control" placeholder="Enter designation">
                                        </div>

                                        {{-- Salary Min/Max --}}
                                        <div class="mb-2">
                                            <label class="form-label">@lang('Salary Range')</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" name="benefits[0][salary_min]" value="{{ old('benefits.0.salary_min') }}" class="form-control" placeholder="Min Salary">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" name="benefits[0][salary_max]" value="{{ old('benefits.0.salary_max') }}" class="form-control" placeholder="Max Salary">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Company Images --}}
                                        <div class="mb-2">
                                            <label class="form-label">@lang('Company Images')</label>
                                            <input type="file" name="benefits[0][company_images][]" class="form-control" multiple>
                                            <small class="text-danger mb-2 partner-logo-error">Company Images must be up to 200×200 pixels.</small><br>

                                        </div>

                                        <button type="button" class="btn btn-danger btn-sm remove-benefit" disabled>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
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
                                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control" placeholder="Enter meta title">
                                    @error('meta_title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description_editor" class="form-control ckeditor" rows="2" placeholder="Enter meta description">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="form-control" placeholder="Enter meta keywords">
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
                                    <select name="related_courses[]" id="related_courses" class="form-select select2" multiple>
                                        <option value="">Select</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End row -->
                    <button type="submit" class="btn btn-primary mt-2" id="submitBtn">@lang('Add Course')</button>
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
        h3{
            color: black;
            font-family: emoji;
        }
        .form-label{
            font-size: 1rem;
        }
    </style>
@endpush
@push('script')
    <script>
        $(document).ready(function () {
            $('.ckeditor').each(function () {
                ClassicEditor.create(this).catch(error => console.error(error));
            });
        });
        let curriculumEditorIndex = 1;

        window.addEventListener("load", function() {
            const editors = ['#editor1', '#editor2', '#editor3', '#editor4', '#editor5', '#editor6', '#curriculum-editor-0'];
            editors.forEach(function(selector) {
                const el = document.querySelector(selector);
                if (el && !el.classList.contains('ck-editor__editable')) {
                    ClassicEditor.create(el).catch(console.error);
                }
            });
        });

        $(document).ready(function() {
            // Initialize CKEditor for the first FAQ answer
            if (typeof ClassicEditor !== 'undefined') {
                ClassicEditor.create(document.querySelector('#faq-answer-editor-0')).catch(console.error);
            }
            // Features
            $('#add-feature').on('click', function() {
                let inputGroup = `
                <div class="input-group mb-2">
                    <input type="text" name="feature[]" class="form-control" value="{{ old('feature.0') }}" placeholder="Enter feature">
                    <button type="button" class="btn btn-danger remove-feature"><i class="fas fa-trash"></i></button>
                </div>`;
                $('#feature-container').append(inputGroup);
            });

            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.input-group').remove();
            });

            // Skills
            $('#add-skill').on('click', function() {
                let inputGroup = `
                <div class="input-group mb-2">
                    <input type="text" name="skill_name[]" class="form-control" value="{{ old('skill_name.0') }}" placeholder="Enter skill">
                    <button type="button" class="btn btn-danger remove-skill"><i class="fas fa-trash"></i></button>
                </div>`;
                $('#skills-container').append(inputGroup);
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
                        <input type="text" name="curriculum_title[]" class="form-control" placeholder="Enter title" value="{{ old('curriculum_title.0') }}">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">@lang('Description')</label>
                        <textarea name="curriculum_description[]" id="${newEditorId}" class="form-control" rows="2" placeholder="Enter description">{{ old('curriculum_description.0') }}</textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-curriculum"><i class="fas fa-trash"></i></button>
                </div>`;

                $('#curriculum-container').append(curriculumItem);

                const newEditor = document.querySelector('#' + newEditorId);
                if (newEditor && !newEditor.classList.contains('ck-editor__editable')) {
                    ClassicEditor.create(newEditor).catch(console.error);
                }

                curriculumEditorIndex++;
            });

            $(document).on('click', '.remove-curriculum', function() {
                $(this).closest('.curriculum-item').remove();
            });

            let certIndex = 1;
            // Initialize CKEditor for the first certification description
            if (typeof ClassicEditor !== 'undefined') {
                ClassicEditor.create(document.querySelector('#certification-description-editor-0')).catch(console.error);
            }

            $(document).on('click', '#add-certification', function() {
                const newCertId = `certification-description-editor-${certIndex}`;
                let html = `
                <div class="border rounded p-2 mb-2 certification-group">
                    <input type="text" name="certifications[${certIndex}][title]" class="form-control mb-2" placeholder="Title" value="{{ old('certifications.${certIndex}.title') }}">
                    <textarea name="certifications[${certIndex}][description]" class="form-control certification-description-editor" id="${newCertId}" rows="3" placeholder="Description">{{ old('certifications.${certIndex}.description') }}</textarea>
                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-certification"><i class="fas fa-trash"></i></button>
                </div>`;
                $('#certification-container').append(html);
                // Initialize CKEditor for the new certification description
                setTimeout(function() {
                    if (typeof ClassicEditor !== 'undefined') {
                        ClassicEditor.create(document.querySelector('#' + newCertId)).catch(console.error);
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

            let videoIndex = 1;

            // Initialize CKEditor for the first video description
            if (typeof ClassicEditor !== 'undefined') {
                ClassicEditor.create(document.querySelector('#video-description-editor-0')).catch(console.error);
            }

            $('#add-video').click(function() {
                const newVideoId = `video-description-editor-${videoIndex}`;
                const newVideo = `
                <div class="video-item mb-3 border p-2 rounded">
                    <div class="mb-2">
                        <label class="form-label">Title</label>
                        <input type="text" name="videos[${videoIndex}][title]" class="form-control" placeholder="Enter video title">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Description</label>
                        <textarea name="videos[${videoIndex}][description]" class="form-control video-description-editor" id="${newVideoId}" rows="2" placeholder="Enter description"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-video"><i class="fas fa-trash"></i></button>
                </div>
                `;
                $('#video-container').append(newVideo);
                // Initialize CKEditor for the new video description
                setTimeout(function() {
                    if (typeof ClassicEditor !== 'undefined') {
                        ClassicEditor.create(document.querySelector('#' + newVideoId)).catch(console.error);
                    }
                }, 100);
                videoIndex++;
            });

            $(document).on('click', '.remove-video', function() {
                $(this).closest('.video-item').remove();
            });
            // Inside the script section

            let faqIndex = 1;

            $('#add-faq').click(function() {
                const newFaqId = `faq-answer-editor-${faqIndex}`;
                const newFaq = `
                <div class="faq-item mb-3 border p-2 rounded">
                    <div class="mb-2">
                        <label class="form-label">@lang('Question')</label>
                        <input type="text" name="faqs[${faqIndex}][title]" class="form-control" placeholder="Enter question">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">@lang('Answer')</label>
                        <textarea name="faqs[${faqIndex}][description]" class="form-control faq-answer-editor" id="${newFaqId}" rows="2" placeholder="Enter answer"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-faq"><i class="fas fa-trash"></i></button>
                </div>
                `;
                $('#faq-container').append(newFaq);
                // Initialize CKEditor for the new FAQ answer
                setTimeout(function() {
                    if (typeof ClassicEditor !== 'undefined') {
                        ClassicEditor.create(document.querySelector('#' + newFaqId)).catch(console.error);
                    }
                }, 100);
                faqIndex++;
            });

            $(document).on('click', '.remove-faq', function() {
                $(this).closest('.faq-item').remove();
            });
            let benefitIndex = 1;
            $('#add-benefit').click(function() {
                const newBenefit = `
                    <div class="benefit-item border rounded p-2 mb-2">
                        <div class="mb-2">
                            <label class="form-label">Designation</label>
                            <input type="text" name="benefits[${benefitIndex}][designation]" class="form-control" placeholder="Enter designation">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Salary Range</label>
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
                            <label class="form-label">Company Images</label>
                            <input type="file" name="benefits[${benefitIndex}][company_images][]" class="form-control" multiple>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm remove-benefit"><i class="fas fa-trash"></i></button>
                    </div>
                `;
                $('#benefit-container').append(newBenefit);
                benefitIndex++;
            });

            $(document).on('click', '.remove-benefit', function() {
                $(this).closest('.benefit-item').remove();
            });

            let premierPartnerIndex = 1;
            $('#add-premier-partner').on('click', function() {
                const item = `
                <div class="premier-partner-item border rounded p-2 mb-2">
                    <div class="mb-2">
                        <label class="form-label">Image</label>
                        <input type="file" name="premier_partner[${premierPartnerIndex}][image]" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Text</label>
                        <input type="text" name="premier_partner[${premierPartnerIndex}][text]" class="form-control" placeholder="Enter text">
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-premier-partner"><i class="fas fa-trash"></i></button>
                </div>
                `;
                $('#premier-partner-container').append(item);
                premierPartnerIndex++;
            });
            $(document).on('click', '.remove-premier-partner', function() {
                $(this).closest('.premier-partner-item').remove();
            });

        });
        
    </script>
    <script>
        // Auto-save functionality
        let autoSaveInterval;
        let isAutoSaving = false;
        let hasUnsavedChanges = false;

        $(document).ready(function() {
            // Start auto-save when the page loads
            startAutoSave();
            
            // Track form changes
            $('#course-form').on('change input', function() {
                hasUnsavedChanges = true;
            });

            // Manual save button (if exists)
            $('#save-draft-btn').click(function(e) {
                e.preventDefault();
                autoSaveForm();
            });
        });

        function startAutoSave() {
            if (autoSaveInterval) {
                clearInterval(autoSaveInterval);
            }

            // Set up new interval (10 seconds = 10000 milliseconds)
            autoSaveInterval = setInterval(function() {
                if (hasUnsavedChanges && !isAutoSaving) {
                    autoSaveForm();
                }
            }, 60000);
        }

        function autoSaveForm() {
            if (isAutoSaving) return;
            
            isAutoSaving = true;
            hasUnsavedChanges = false;

            // Sync CKEditor data back into textareas before saving
            if (typeof ClassicEditor !== 'undefined') {
                document.querySelectorAll('.ck-editor__editable')
                    .forEach(editable => {
                        let editorInstance = editable.ckeditorInstance;
                        if (editorInstance) {
                            let textarea = editable.closest('.ck-editor').previousElementSibling;
                            if (textarea) {
                                textarea.value = editorInstance.getData();
                            }
                        }
                    });
            }

            
            let formData = new FormData($('#course-form')[0]);
            formData.append('auto_save', true);
            
            $.ajax({
                url: $('#course-form').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) { 
                    Toastify({
                        text: "Auto-saved sucessfully!!",
                        duration: 2000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#4fbe87",
                    }).showToast();

                    
                    // If first save returns ID → switch to update mode
                    if (response.id) {
                        $('#courseId').val(response.id);
                    }
                },
                error: function(xhr) {
                    let errorMessage = "Error auto-saving course data";
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).join('\n');
                        }
                    }
                    Toastify({
                        text: errorMessage,
                        duration: 5000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#f3616d",
                    }).showToast();
                    Toastify({
                        text: "Auto-saving failed!",
                        duration: 2000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "rgb(243, 97, 109)",
                    }).showToast();
                    $("#submitBtn").on("click", function (e) {
                        if (hasUnsavedChanges) {
                            e.preventDefault();
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Please fill all required fields!",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    hasUnsavedChanges = false;
                                }
                            });
                        }
                    });
                    hasUnsavedChanges = true; // allow retry
                },
                complete: function() {
                    isAutoSaving = false;
                }
            });
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
