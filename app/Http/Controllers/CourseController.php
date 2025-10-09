<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Course;
use App\Models\Benefit;
use App\Models\Category;
use App\Models\CourseVideo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseCurriculum;
use App\Models\CourseKeyFeature;
use App\Models\CourseCertification;
use App\Models\CourseSkillsCovered;
use App\Models\CourseTrustedPartner;

class CourseController extends Controller
{
    public function index()
    {
        $query = Course::query();
        if (request()->has('search')) {
            $search = request()->get('search');
            $query->where('title', 'like', '%' . $search . '%');
        }
        $courses = $query->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $course = new Course();
            $course->title                   = $request->title;
            $course->short_description       = $request->short_description;
            $course->description             = $request->description;
            $course->duration                = $request->duration;
            $course->overview                = $request->overview;
            $course->eligibility             = $request->eligibility;
            $course->prerequisites           = $request->prerequisites;
            $course->business_with_skilled   = $request->business_with_skilled;
            $course->video_url               = $request->video_url;
            $course->category                = $request->category;
            $course->benefits                = $request->benefits_description;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_image.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/courses'), $imageName);
                $course->image = $imageName;
            }
            if ($request->hasFile('cover_image')) {
                $image = $request->file('cover_image');
                $imageName = time() . '_cover.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/courses'), $imageName);
                $course->cover_image = $imageName;
            }

            if ($request->hasFile('certification_image')) {
                $certImage = $request->file('certification_image');
                $certImageName = time() . '_cert.' . $certImage->getClientOriginalExtension();
                $certImage->move(public_path('uploads/certifications'), $certImageName);
                $course->certification_image = $certImageName;
            }

            $baseSlug   = Str::slug($request->title);
            $slug       = $baseSlug;
            $counter    = 1;
            while (Course::where('slug', $slug)->exists()) {
                $slug   = $baseSlug . '-' . $counter++;
            }
            $course->slug = $slug;
            $course->save();

            if ($request->feature) {
                foreach ($request->feature as $feature) {
                    CourseKeyFeature::create([
                        'course_id'     => $course->id,
                        'feature'       => $feature
                    ]);
                }
            }

            if ($request->skill_name) {
                foreach ($request->skill_name as $skill) {
                    CourseSkillsCovered::create([
                        'course_id'     => $course->id,
                        'skill_name'    => $skill
                    ]);
                }
            }

           
            if ($request->curriculum_title) {
                foreach ($request->curriculum_title as $index => $title) {
                    CourseCurriculum::create([
                        'course_id'     => $course->id,
                        'title'         => $title,
                        'description'   => $request->curriculum_description[$index] ?? null
                    ]);
                }
            }

           
            if ($request->certifications) {
                foreach ($request->certifications as $cert) {
                    CourseCertification::create([
                        'course_id'     => $course->id,
                        'title'         => $cert['title'] ?? null,
                        'description'   => $cert['description'] ?? null
                    ]);
                }
            }

            if ($request->partners) {
                foreach ($request->partners as $partner) {
                    $logoPath           = null;
                    if (isset($partner['logo']) && $partner['logo']->isValid()) {
                        $logo           = $partner['logo'];
                        $logoName       = time() . '_' . $logo->getClientOriginalName();
                        $logo->move(public_path('uploads/partners'), $logoName);
                        $logoPath       = $logoName;
                    }

                    CourseTrustedPartner::create([
                        'course_id'     => $course->id,
                        'name'          => $partner['name'] ?? null,
                        'logo'          => $logoPath
                    ]);
                }
            }

            if ($request->videos) {
                foreach ($request->videos as $video) {
                    CourseVideo::create([
                        'course_id'     => $course->id,
                        'title'         => $video['title'] ?? null,
                        'description'   => $video['description'] ?? null
                    ]);
                }
            }

            if ($request->faqs) {
                foreach ($request->faqs as $faq) {
                    Faq::create([
                        'course_id'     => $course->id,
                        'title'         => $faq['title'] ?? null,
                        'description'   => $faq['description'] ?? null
                    ]);
                }
            }
            if ($request->benefits) {
                foreach ($request->benefits as $benefitData) {
                    $companyImages = [];
                    if (isset($benefitData['company_images']) && is_array($benefitData['company_images'])) {
                        foreach ($benefitData['company_images'] as $image) {
                            if ($image->isValid()) {
                                $imgName = time() . '_' . $image->getClientOriginalName();
                                $image->move(public_path('uploads/company_images'), $imgName);
                                $companyImages[] = $imgName;
                            }
                        }
                    }

                    $min = isset($benefitData['salary_min']) ? (float) $benefitData['salary_min'] : null;
                    $max = isset($benefitData['salary_max']) ? (float) $benefitData['salary_max'] : null;

                    $average = ($min !== null && $max !== null) ? ($min + $max) / 2 : null;
                    $avgMin = ($min !== null && $average !== null) ? ($min + $average) / 2 : null;
                    $avgMax = ($max !== null && $average !== null) ? ($max + $average) / 2 : null;

                    Benefit::create([
                        'course_id'    => $course->id,
                        'designation'  => $benefitData['designation'] ?? null,
                        'salary'       => json_encode([
                            'min'      => $min,
                            'max'      => $max,
                            'average'  => $average,
                            'avg_min'  => $avgMin,
                            'avg_max'  => $avgMax
                        ]),
                        'company'      => json_encode($companyImages)
                    ]);
                }
            }
            return redirect()->route('admin.course.index')->with('success', 'Course created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the course: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        // Code to update a course
    }

    public function destroy($id)
    {
        // Code to delete a course
    }
}
