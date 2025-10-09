<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCallback extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'phone',
    'email',
    'course_id',
    'policy',
];
public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}

}
