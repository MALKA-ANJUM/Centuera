<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // ✅ Add this
    protected $fillable = [
        'title',
        'short_title',
        'description',
        'image',
    ];
}
