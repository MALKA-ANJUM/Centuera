<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
	public function courseList()
	{
		$courses = Course::orderBy('id', 'desc')->get();
		return view('user.course-list', compact('courses'));
	}

    public function courseDetails($slug)
	{
		$courseDetails = Course::with('faqs', 'skillsCovered','keyFeatures')->where('slug', $slug)->first();
		return view('user.course-details', compact('courseDetails'));
	}
}
