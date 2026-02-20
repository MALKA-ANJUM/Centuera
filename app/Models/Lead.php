<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country_code', 'phonecode');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
