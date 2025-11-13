<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    //listing
    public function rating()
    {
        return view('admin.ratings.list');
    }
}
