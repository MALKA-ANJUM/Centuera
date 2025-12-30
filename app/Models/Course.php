<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Course extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'courses';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'description',
        'short_description',
        'slug',
        'overview',
        'eligibility',
        'prerequisites',
        'certification_image',
        'image',
        'slug',
        'benefits',
        'business_with_skilled',
        'video_url',
        'duration',
        'category',
        'cover_image',
        'training_course',
        'learner_field',
        'authorized_training_partner',
        'rating',
        'number_of_user_rating',
        'exam_pass_guarantee',
        'money_back_guarantee'
    ];
    public function keyFeatures()
    {
        return $this->hasMany(CourseKeyFeature::class);
    }

    public function skillsCovered()
    {
        return $this->hasMany(CourseSkillsCovered::class);
    }

    public function curriculum()
    {
        return $this->hasMany(CourseCurriculum::class);
    }

    public function certifications()
    {
        return $this->hasMany(CourseCertification::class);
    }

    public function trustedPartners()
    {
        return $this->hasMany(CourseTrustedPartner::class);
    }

    public function videos()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function schedules()
    {
        return $this->hasMany(CourseSchedule::class, 'course_id');
    }

    public function getBenefits()
    {
        return $this->hasMany(Benefit::class, 'course_id');
    }

    public function getCourseCurriculum()
    {
        return $this->hasMany(CourseCurriculum::class, 'course_id');
    }

    public function getCourseCertificate()
    {
        return $this->hasMany(CourseCertification::class, 'course_id');
    }

    public function getCourseVideo()
    {
        return $this->hasMany(CourseVideo::class, 'course_id');
    }


    public function getCourseSchedule()
    {
        $countryID = session('selected_country_id', 102);

        return $this->hasOne(CourseSchedule::class, 'course_id')
            ->where('start_date', '>=', now())->orderBy('start_date', 'asc')
            ->whereHas('prices', function($query) use ($countryID) {
                $query->where('country_id', $countryID);
            })
            ->with(['prices' => function($query) use ($countryID) {
                $query->where('country_id', $countryID);
            }]);
    }


    public function getCourseScheduleMany()
    {
        $countryID = session('selected_country_id', 102);

        return $this->hasMany(CourseSchedule::class, 'course_id')->where('start_date', '>=', now())
             ->whereHas('prices', function($query) use ($countryID) {
                $query->where('country_id', $countryID);
            })
            ->with(['prices' => function($query) use ($countryID) {
                $query->where('country_id', $countryID);
            }]);;
    }

    public function getSeoData()
    {
        return $this->belongsTo(Seo::class, 'id', 'course_id');
    }

    public function getRating()
    {
        return $this->hasMany(Rating::class, 'course_id');
    }

    // Now add a helper to calculate the average rating:
    public function getAverageRatingAttribute()
    {
        $baseRating = $this->rating ?? 0; // Assuming `rating` column is base rating

        $additionalRatings = $this->getRating->avg('rating') ?? 0;

        // If you want true average of both base rating and ratings:
        if ($baseRating > 0 && $additionalRatings > 0) {
            return ($baseRating + $additionalRatings) / 2;
        }

        // If no additional ratings, just return base rating
        return $baseRating ?: $additionalRatings;
    }

    protected $casts = [
        'training_course' => 'array',
    ];
    
}
