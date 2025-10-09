<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSkillsCovered extends Model
{
    use HasFactory;
    protected $table = 'course_skills_covered';
    protected $fillable = [
        'course_id',
        'skill_name',
    ];
}
