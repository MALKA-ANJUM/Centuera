<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSchedulePrice extends Model
{
    use SoftDeletes;

    protected $table = 'course_schedule_prices';

    protected $fillable = [
        'course_id',
        'schedule_id',
        'country_id',
        'discount_price',
        'original_price',
    ];
    public function schedule()
    {
        return $this->belongsTo(CourseSchedule::class, 'schedule_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
