<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    use HasFactory;
    protected $table='timezone';
    protected $guarded;

    // public function getCountry()
    // {
    //     return $this->belongsTo(Country::class, 'country_code', 'iso');
    // }
}
