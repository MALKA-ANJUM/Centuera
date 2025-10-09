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
    
}
