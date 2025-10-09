<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTrustedPartner extends Model
{
    use HasFactory;
    protected $table = 'course_trusted_partners';
    protected $fillable = [
        'course_id',
        'name',
        'logo',                 
    ];  
}
