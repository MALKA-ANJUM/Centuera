<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCertification extends Model
{
    use HasFactory;
    protected $table = 'courses_certifications';
    protected $fillable = [
        'course_id',
        'title',
        'description',
    ];
}
