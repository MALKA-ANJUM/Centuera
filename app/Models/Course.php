<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    use HasFactory;
    
    protected $table = 'courses';
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
        return $this->hasOne(CourseSchedule::class, 'course_id')->where('start_date', '>=', now())->with('prices');
    }

    public function getCourseScheduleMany()
    {
        return $this->hasMany(CourseSchedule::class, 'course_id')->where('start_date', '>=', now())->with('prices');
    }

    public function getSeoData()
    {
        return $this->belongsTo(Seo::class, 'id', 'course_id');
    }

    // public function getTimeZoneFromCountry()
    // {
    //     return $this->belongsTo(Country::class);
    // }

    protected $casts = [
        'training_course' => 'array',
    ];
    
}
