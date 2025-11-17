<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Seo;
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
use App\Http\Controllers\Controller;
use App\Models\CourseTrustedPartner;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        $query = Course::query();
        if (request()->has('search')) {
            $search = request()->get('search');
            $query->where('title', 'like', '%' . $search . '%');
        }
        $courses = $query->orderBy('id', 'desc')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        $courses = Course::orderBy('id', 'desc')->get();
        return view('admin.courses.create', compact('categories', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'short_title'     => 'required',
            'category'  => 'required',
        ]);

        try {
            $courseId = $request->course_id;
            $course = $courseId ? Course::findOrFail($courseId) : new Course();

            $course->title                   = $request->title;
            $course->short_title             = $request->short_title;
            $course->short_description       = $request->short_description;
            $course->description             = $request->description;
            $course->duration                = $request->duration;
            $course->overview                = $request->overview;
            $course->eligibility             = $request->eligibility;
            $course->prerequisites           = $request->prerequisites;
            $course->business_with_skilled   = $request->business_with_skilled;
            $course->video_url               = $request->video_url;
            $course->category                = $request->category;
            $course->learner_field           = $request->learner_field;
            $course->exam_pass_guarantee     = $request->exam_pass_guarantee;
            $course->money_back_guarantee    = $request->money_back_guarantee;
            $course->rating                  = $request->rating;
            $course->number_of_user_rating   = $request->number_of_user_rating;
            $course->benefits                = $request->benefit_description;
            $course->related_courses         = json_encode($request->related_courses);

            // ✅ Premier Partners (images + text)
            $premierPartners = [];
            if ($request->premier_partner) {
                foreach ($request->premier_partner as $partner) {
                    if (empty($partner['image'])) {
                        continue;
                    }
                    $img = $partner['image'];
                    $imgName = time() . '_' . $img->getClientOriginalName();
                    $img->move(public_path('uploads/premier_partner'), $imgName);
                    $premierPartners[] = [
                        'image' => $imgName,
                        'text'  => $partner['text'] ?? null,
                    ];
                }
            }
            $course->authorized_training_partner = json_encode($premierPartners);

            // ✅ Images
            if ($request->hasFile('image')) {
                $imageName = time() . '_image.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/courses'), $imageName);
                $course->image = $imageName;
            }
            if ($request->hasFile('cover_image')) {
                $imageName = time() . '_cover.' . $request->cover_image->getClientOriginalExtension();
                $request->cover_image->move(public_path('uploads/cover_image'), $imageName);
                $course->cover_image = $imageName;
            }
            if ($request->hasFile('certification_image')) {
                $certImageName = time() . '_cert.' . $request->certification_image->getClientOriginalExtension();
                $request->certification_image->move(public_path('uploads/certifications'), $certImageName);
                $course->certification_image = $certImageName;
            }
            if ($request->hasFile('upload_curriculum')) {
                $currImageName = time() . '_curr.' . $request->upload_curriculum->getClientOriginalExtension();
                $request->upload_curriculum->move(public_path('uploads/curriculum'), $currImageName);
                $course->upload_curriculum = $currImageName;
            }


            // ✅ Slug (only if new course OR title changed)
            if (!$course->id || $course->isDirty('title')) {
                $baseSlug   = Str::slug($request->title);
                $slug       = $baseSlug;
                $counter    = 1;
                while (Course::where('slug', $slug)->where('id', '!=', $course->id)->exists()) {
                    $slug   = $baseSlug . '-' . $counter++;
                }
                $course->slug = $slug;
            }

            // ✅ Training course
            if ($request->has('training_course') && is_array($request->training_course)) {
                $trainingData = [];
                foreach ($request->training_course as $type => $data) {
                    $trainingData[$type] = [
                        'status'      => !empty($data['status']) ? 1 : 0,
                        'level_name'  => $data['level_name'] ?? '',
                        'description' => $data['description'] ?? '',
                    ];
                }
                $course->training_course = json_encode($trainingData);
            }

            $course->save();

            // ✅ Related Data (clear old if updating)
            if ($request->course_id) {
                CourseKeyFeature::where('course_id', $course->id)->delete();
                CourseSkillsCovered::where('course_id', $course->id)->delete();
                CourseCurriculum::where('course_id', $course->id)->delete();
                CourseCertification::where('course_id', $course->id)->delete();
                CourseTrustedPartner::where('course_id', $course->id)->delete();
                CourseVideo::where('course_id', $course->id)->delete();
                Faq::where('course_id', $course->id)->delete();
                Benefit::where('course_id', $course->id)->delete();
                Seo::where('course_id', $course->id)->delete();
            }

            // ✅ Save Features
            if ($request->feature) {
                foreach ($request->feature as $feature) {
                    if (empty($feature)) {
                        continue;
                    }
                    CourseKeyFeature::create([
                        'course_id' => $course->id,
                        'feature'   => $feature
                    ]);
                }
            }

            // ✅ Save Skills
            if ($request->skill_name) {
                foreach ($request->skill_name as $skill) {
                    if (empty($skill)) {
                        continue;
                    }
                    CourseSkillsCovered::create([
                        'course_id'  => $course->id,
                        'skill_name' => $skill
                    ]);
                }
            }

            // ✅ SEO
            if ($request->meta_title || $request->meta_description || $request->meta_keywords) {
                Seo::create([
                    'course_id'       => $course->id,
                    'meta_title'      => $request->meta_title,
                    'meta_description'=> $request->meta_description,
                    'meta_keyword'    => $request->meta_keywords,
                ]);
            }

            // ✅ Curriculum
            if ($request->curriculum_title) {
                foreach ($request->curriculum_title as $index => $title) {
                    if (empty($title) && empty($description)) {
                        continue;
                    }
                    CourseCurriculum::create([
                        'course_id'   => $course->id,
                        'title'       => $title,
                        'description' => $request->curriculum_description[$index] ?? null
                    ]);
                }
            }

            // ✅ Certifications
            if ($request->certifications) {
                foreach ($request->certifications as $cert) {
                    if (empty($cert['title']) && empty($cert['description'])) {
                        continue;
                    }
                    CourseCertification::create([
                        'course_id'   => $course->id,
                        'title'       => $cert['title'] ?? null,
                        'description' => $cert['description'] ?? null
                    ]);
                }
            }

            // ✅ Trusted Partners
            if ($request->partners) {
                foreach ($request->partners as $partner) {
                    $logoPath = null;
                    if (isset($partner['logo']) && $partner['logo']->isValid()) {
                        $logoName = time() . '_' . $partner['logo']->getClientOriginalName();
                        $partner['logo']->move(public_path('uploads/partners'), $logoName);
                        $logoPath = $logoName;
                    }
                    // Skip if both name and logo are null/empty
                    if (empty($partner['name']) && empty($logoPath)) {
                        continue;
                    }
                    CourseTrustedPartner::create([
                        'course_id' => $course->id,
                        'name'      => $partner['name'] ?? null,
                        'logo'      => $logoPath
                    ]);
                }
            }

            // ✅ Videos
            if ($request->videos) {
                foreach ($request->videos as $video) {
                    if (empty($video['title']) && empty($video['description'])) {
                        continue;
                    }
                    CourseVideo::create([
                        'course_id'   => $course->id,
                        'title'       => $video['title'] ?? null,
                        'description' => $video['description'] ?? null
                    ]);
                }
            }

            // ✅ FAQs
            if ($request->faqs) {
                foreach ($request->faqs as $faq) {
                    if (empty($faq['title']) && empty($faq['description'])) {
                        continue;
                    }
                    Faq::create([
                        'course_id'   => $course->id,
                        'title'       => $faq['title'] ?? null,
                        'description' => $faq['description'] ?? null
                    ]);
                }
            }

            // ✅ Benefits
            if ($request->benefits) {
                foreach ($request->benefits as $benefitData) {
                    if (
                        empty($benefitData['designation']) &&
                        empty($benefitData['salary_min']) &&
                        empty($benefitData['salary_max'])
                    ) {
                        continue; // don't insert this benefit
                    }
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
                        'course_id'   => $course->id,
                        'designation' => $benefitData['designation'] ?? null,
                        'salary'      => json_encode([
                            'min'      => $min,
                            'max'      => $max,
                            'average'  => $average,
                            'avg_min'  => $avgMin,
                            'avg_max'  => $avgMax
                        ]),
                        'company'     => json_encode($companyImages)
                    ]);
                }
            }
            if($request->auto_save == true){
                return response()->json([
                    'id' => $course->id,
                ]);
            }
            return redirect()->route('admin.course.index')
                ->with('success', $request->course_id ? 'Course updated successfully' : 'Course created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
    $course = Course::findOrFail($id);
    $curriculums = $course->curriculum()->get();
    $courses = Course::orderBy('id', 'desc')->get();
    $seo = $course->getSeoData()->first();
    $benefits = $course->getBenefits()->get();
    $categories = Category::orderby('id', 'desc')->get();
    return view('admin.courses.edit', compact('course', 'curriculums', 'courses', 'seo', 'benefits', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required',
            'short_title'   => 'required',
            'category'      => 'required',
            'slug'        => [
                'required',
                Rule::unique('courses', 'slug')->ignore($id)
            ],
        ]);
        try {
            $course = Course::findOrFail($id);

            $course->title                   = $request->title;
            $course->short_title             = $request->short_title;
            $course->short_description       = $request->short_description;
            $course->description             = $request->description;
            $course->duration                = $request->duration;
            $course->overview                = $request->overview;
            $course->eligibility             = $request->eligibility;
            $course->prerequisites           = $request->prerequisites;
            $course->business_with_skilled   = $request->business_with_skilled;
            $course->video_url               = $request->video_url;
            $course->category                = $request->category;
            $course->learner_field           = $request->learner_field;
            $course->exam_pass_guarantee     = $request->exam_pass_guarantee;
            $course->money_back_guarantee    = $request->money_back_guarantee;
            $course->rating                  = $request->rating;
            $course->number_of_user_rating   = $request->number_of_user_rating;
            // Use benefit_description if present, else fallback to benefits (save as JSON if array)
            if ($request->filled('benefit_description')) {
                $course->benefits = $request->benefit_description;
            } elseif (is_array($request->benefits)) {
                $course->benefits = json_encode($request->benefits);
            } else {
                $course->benefits = $request->benefits;
            }
            $course->related_courses         = json_encode($request->related_courses);

            // ✅ Premier Partners (images + text)
            $premierPartners = [];
            $existingPartners = json_decode($course->authorized_training_partner, true) ?? [];

            if ($request->premier_partner) {
                foreach ($request->premier_partner as $index => $partner) {
                    $imagePath = $existingPartners[$index]['image'] ?? null; // Keep old image if not replaced

                    // If new image uploaded, replace it
                    if (
                        isset($partner['image']) &&
                        $partner['image'] instanceof \Illuminate\Http\UploadedFile &&
                        $partner['image']->isValid()
                    ) {
                        $img = $partner['image'];
                        $imgName = time() . '_' . $img->getClientOriginalName();
                        $img->move(public_path('uploads/premier_partner'), $imgName);
                        $imagePath = $imgName;
                    }

                    $premierPartners[] = [
                        'image' => $imagePath,
                        'text'  => $partner['text'] ?? null
                    ];
                }
            }

            $course->authorized_training_partner = json_encode($premierPartners);


            // ✅ Images
            if ($request->hasFile('image')) {
                $imageName = time() . '_image.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/courses'), $imageName);
                $course->image = $imageName;
            }
            if ($request->hasFile('cover_image')) {
                $imageName = time() . '_cover.' . $request->cover_image->getClientOriginalExtension();
                $request->cover_image->move(public_path('uploads/cover_image'), $imageName);
                $course->cover_image = $imageName;
            }
            if ($request->hasFile('certification_image')) {
                $certImageName = time() . '_cert.' . $request->certification_image->getClientOriginalExtension();
                $request->certification_image->move(public_path('uploads/certifications'), $certImageName);
                $course->certification_image = $certImageName;
            }
            if ($request->hasFile('upload_curriculum')) {
                $currImageName = time() . '_curr.' . $request->upload_curriculum->getClientOriginalExtension();
                $request->upload_curriculum->move(public_path('uploads/curriculum'), $currImageName);
                $course->upload_curriculum = $currImageName;
            }

            // ✅ Slug (only if title changed)
            if ($course->isDirty('title')) {
                $baseSlug   = Str::slug($request->title);
                $slug       = $baseSlug;
                $counter    = 1;
                while (Course::where('slug', $slug)->where('id', '!=', $course->id)->exists()) {
                    $slug   = $baseSlug . '-' . $counter++;
                }
                $course->slug = $slug;
            }

            // ✅ Training course
            if ($request->has('training_course') && is_array($request->training_course)) {
                $trainingData = [];
                foreach ($request->training_course as $type => $data) {
                    $trainingData[$type] = [
                        'status'      => !empty($data['status']) ? 1 : 0,
                        'level_name'  => $data['level_name'] ?? '',
                        'description' => $data['description'] ?? '',
                    ];
                }
                $course->training_course = json_encode($trainingData);
            }

            $saved = $course->save();
            if ($request->course_id) {
                    CourseKeyFeature::where('course_id', $course->id)->delete();
                    CourseSkillsCovered::where('course_id', $course->id)->delete();
                    CourseCurriculum::where('course_id', $course->id)->delete();
                    CourseCertification::where('course_id', $course->id)->delete();
                    // CourseTrustedPartner::where('course_id', $course->id)->delete();
                    CourseVideo::where('course_id', $course->id)->delete();
                    Faq::where('course_id', $course->id)->delete();
                    // Benefit::where('course_id', $course->id)->delete();
                    Seo::where('course_id', $course->id)->delete();
            }

            // ...existing code for saving features, skills, SEO, curriculum, certifications, partners, videos, faqs, benefits...
            if ($request->feature) {
                foreach ($request->feature as $feature) {
                    if (empty($feature)) {
                        continue;
                    }
                    CourseKeyFeature::create([
                        'course_id' => $course->id,
                        'feature'   => $feature
                    ]);
                }
            }

            if ($request->skill_name) {
                foreach ($request->skill_name as $skill) {
                    if (empty($skill)) {
                        continue;
                    }
                    CourseSkillsCovered::create([
                        'course_id'  => $course->id,
                        'skill_name' => $skill
                    ]);
                }
            }

            if ($request->meta_title || $request->meta_description || $request->meta_keywords) {
                Seo::create([
                    'course_id'       => $course->id,
                    'meta_title'      => $request->meta_title,
                    'meta_description'=> $request->meta_description,
                    'meta_keyword'    => $request->meta_keywords,
                ]);
            }

            if ($request->curriculum_title) {
                foreach ($request->curriculum_title as $index => $title) {
                    if (empty($title) && empty($description)) {
                        continue;
                    }
                    CourseCurriculum::create([
                        'course_id'   => $course->id,
                        'title'       => $title,
                        'description' => $request->curriculum_description[$index] ?? null
                    ]);
                }
            }

            if ($request->certifications) {
                foreach ($request->certifications as $cert) {
                    if (empty($cert['title']) && empty($cert['description'])) {
                        continue;
                    }
                    CourseCertification::create([
                        'course_id'   => $course->id,
                        'title'       => $cert['title'] ?? null,
                        'description' => $cert['description'] ?? null
                    ]);
                }
            }

            if ($request->has('partners')) {
                $existingPartnerIds = [];

                foreach ($request->partners as $partnerData) {
                    $partner = isset($partnerData['id']) 
                        ? CourseTrustedPartner::find($partnerData['id']) 
                        : new CourseTrustedPartner();

                    // Handle logo
                    $logoPath = $partner->logo ?? null;
                    if (!empty($partnerData['logo']) && $partnerData['logo'] instanceof \Illuminate\Http\UploadedFile && $partnerData['logo']->isValid()) {
                        $logoName = time() . '_' . $partnerData['logo']->getClientOriginalName();
                        $partnerData['logo']->move(public_path('uploads/partners'), $logoName);
                        $logoPath = $logoName;
                    }

                    // Skip if no name and no logo
                    if (empty($partnerData['name']) && empty($logoPath)) {
                        continue;
                    }

                    // Save/update
                    $partner->course_id = $course->id;
                    $partner->name = $partnerData['name'] ?? null;
                    $partner->logo = $logoPath;
                    $partner->save();

                    $existingPartnerIds[] = $partner->id;
                }

                // Delete records not in submitted list
                CourseTrustedPartner::where('course_id', $course->id)
                    ->whereNotIn('id', $existingPartnerIds)
                    ->delete();
            }

            if ($request->videos) {
                foreach ($request->videos as $video) {
                    if (empty($video['title']) && empty($video['description'])) {
                        continue;
                    }
                    CourseVideo::create([
                        'course_id'   => $course->id,
                        'title'       => $video['title'] ?? null,
                        'description' => $video['description'] ?? null
                    ]);
                }
            }

            if ($request->faqs) {
                foreach ($request->faqs as $faq) {
                    if (empty($faq['title']) && empty($faq['description'])) {
                        continue;
                    }
                    Faq::create([
                        'course_id'   => $course->id,
                        'title'       => $faq['title'] ?? null,
                        'description' => $faq['description'] ?? null
                    ]);
                }
            }

            if ($request->benefits) {
                $existingIds = []; // Track which benefits to keep

                foreach ($request->benefits as $benefitData) {
                    // 🔹 Skip empty benefits
                    if (
                        empty($benefitData['designation']) &&
                        empty($benefitData['salary_min']) &&
                        empty($benefitData['salary_max'])
                    ) {
                        continue;
                    }

                    // 🔹 Find existing or create new
                    $benefit = isset($benefitData['id']) 
                        ? Benefit::find($benefitData['id']) 
                        : new Benefit();

                    if ($benefit && $benefit->id) {
                        $existingIds[] = $benefit->id;
                    }

                    // 🔹 Handle company images
                    $companyImages = is_array(json_decode($benefit->company, true))
                        ? json_decode($benefit->company, true)
                        : [];

                    if (!empty($benefitData['company_images']) && is_array($benefitData['company_images'])) {
                        foreach ($benefitData['company_images'] as $image) {
                            if ($image instanceof \Illuminate\Http\UploadedFile && $image->isValid()) {
                                $imgName = time() . '_' . $image->getClientOriginalName();
                                $image->move(public_path('uploads/company_images'), $imgName);
                                $companyImages[] = $imgName;
                            }
                        }
                    }

                    // 🔹 Salary Calculation
                    $min = isset($benefitData['salary_min']) ? (float) $benefitData['salary_min'] : null;
                    $max = isset($benefitData['salary_max']) ? (float) $benefitData['salary_max'] : null;

                    $average = ($min !== null && $max !== null) ? ($min + $max) / 2 : null;
                    $avgMin = ($min !== null && $average !== null) ? ($min + $average) / 2 : null;
                    $avgMax = ($max !== null && $average !== null) ? ($max + $average) / 2 : null;

                    // 🔹 Save/update
                    $benefit->course_id   = $course->id;
                    $benefit->designation = $benefitData['designation'] ?? null;
                    $benefit->salary      = json_encode([
                        'min'     => $min,
                        'max'     => $max,
                        'average' => $average,
                        'avg_min' => $avgMin,
                        'avg_max' => $avgMax
                    ]);
                    $benefit->company = json_encode($companyImages);
                    $benefit->save();

                    $existingIds[] = $benefit->id;
                }

                // 🔹 Delete benefits that were removed
                Benefit::where('course_id', $course->id)
                    ->whereNotIn('id', $existingIds)
                    ->delete();
            }



            if($request->auto_save == true){
                return response()->json([
                    'id' => $course->id,
                ]);
            }
            return redirect()->route('admin.course.index')
                ->with('success', 'Course updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete(); // Soft deletes instead of hard delete
        return redirect()->back()->with('success', 'Course deleted successfully.');
    }
}
