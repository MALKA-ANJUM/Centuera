<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $guarded = [];

    protected $casts = [
        'courses' => 'array',
    ];

    // In Order.php
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
