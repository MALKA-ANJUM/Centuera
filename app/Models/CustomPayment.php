<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPayment extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'email',
        'country_code',
        'phone',
        'course_id',
        'currency',
        'amount',
        'date',
        'referral',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
