<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseKeyFeature extends Model
{
    use HasFactory;
    protected $table = 'course_key_features';
    protected $fillable = [
        'course_id',
        'feature',
    ];
}
