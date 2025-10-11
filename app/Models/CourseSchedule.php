<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSchedule extends Model
{
    use SoftDeletes;

    protected $table = 'course_schedules'; 

    protected $fillable = [
        'course_id',
        'type',
        'batche',
        'start_date',
        'end_date',
        'time_zone',
        'starttime',
        'end_time',
    ];
     public function prices()
    {
        return $this->hasMany(CourseSchedulePrice::class, 'schedule_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getCourse()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
