<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $courses = Course::select('id', 'title')->paginate(10);
        return view('admin.schedules.index', compact('courses'));
    }
    public function create($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.schedules.create', compact('course'));
    }
}
