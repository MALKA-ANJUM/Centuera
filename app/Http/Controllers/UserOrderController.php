<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CourseSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserOrderController extends Controller
{
    public function orderSummary($id)
    {
        $countryID = Session::get('selected_country_id', 102);
		$currency = Country::where('id', $countryID)->first()->currency ?? 0;
        $countries = Country::get();
        $schedule = CourseSchedule::with('getCourse', 'prices')->where('id', $id)->first();
        return view('user.order-summary', compact('countries', 'schedule', 'currency'));
    }

    public function orderSubmit(Request $request, $id)
    {
        return $request;
    }

}
