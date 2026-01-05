<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

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
        'trainner_name',
        'trainner_image',
        'language',
        'trainner_description',
        'total_days_of_training'
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // public function prices()
    // {
	// 	$countryID = Session::get('selected_country_id');
    //     return $this->hasOne(CourseSchedulePrice::class, 'schedule_id')->where('country_id', $countryID);
    // }

    public function prices()
    {
        return $this->hasOne(CourseSchedulePrice::class, 'schedule_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getCourse()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function getPrices()
    {
        return $this->hasMany(CourseSchedulePrice::class, 'schedule_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'time_zone', 'timezones');
    }

    
    protected $appends = ['country'];

    public function getCountryAttribute()
    {
        foreach (Country::all() as $country) {
            $zones = json_decode($country->timezones, true);
            if ($zones && collect($zones)->pluck('zoneName')->contains($this->time_zone)) {
                return $country;
            }
        }
        return null;
    }

}
