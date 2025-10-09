<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    use HasFactory;
    protected $table = 'course_videos';
    protected $fillable = [
        'course_id',
        'title',
        'description',
    ];
}
