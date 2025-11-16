<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Course;
use App\Models\CourseSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserOrderController extends Controller
{
    public function orderSummary(Request $request, $id)
    {
        $participants = $request->query('participants');
        $countryID = Session::get('selected_country_id', 102);
		$currency = Country::where('id', $countryID)->first()->currency ?? 0;
        $countries = Country::get();
        $schedule = CourseSchedule::with('getCourse', 'prices')->where('id', $id)->first();
        return view('user.order-summary', compact('countries', 'schedule', 'currency', 'participants'));
    }
	public function customPayment()
    {
        $countries = Country::get();
        return view('user.custom-payment', compact('countries'));
    }

	public function getCourses()
    {
        $courses = Course::select('id', 'title')->get();
        return response()->json($courses);
    }
}
