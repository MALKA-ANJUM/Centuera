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
        return $this->belongsTo(Course::class, 'orders', 'id', 'courses');
    }

    public function getRating()
    {
        return $this->hasOne(\App\Models\Rating::class, 'order_id', 'orderId')
            ->where('user_id', auth()->id());
    }

    public function getSchedule()
    {
        return $this->belongsTo(CourseSchedule::class, 'schedule_id', 'id');
    }


}
