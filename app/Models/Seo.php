<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seo';

    protected $fillable = [
        'course_id',         
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
