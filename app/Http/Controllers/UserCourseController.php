<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserCourseController extends Controller
{
	public function courseList(Request $request)
	{
		$countryID = Session::get('selected_country_id');
		$search = $request['search'] ? $request['search'] : '';
		if($search){
			$courses = Course::where('title', 'LIKE', "%$search%")->orderBy('id', 'desc')->paginate(10);
		}
		else{
			$courses = Course::orderBy('id', 'desc')->paginate(10);
		}
		$currency = Country::where('id', $countryID)->first()->currency ?? 0;
		return view('user.course-list', compact('courses', 'currency'));
	}

    public function courseDetails($slug)
	{
		$countryID = Session::get('selected_country_id');
		$courseDetails = Course::with('faqs', 'skillsCovered', 'keyFeatures', 'getBenefits', 'getSeoData', 'trustedPartners',
				'getCourseCurriculum', 'getCourseCertificate', 'getCourseVideo', 'getCourseSchedule')
				->where('slug', $slug)
				->first();
		$price = $courseDetails->getCourseScheduleMany->groupBy('batche')
			 ->map(function ($batches) use ($countryID) {
				$latestBatch = $batches->sortBy('start_date')->first();
				return $latestBatch;
		});
		
        $countries = Country::get();
		$currency = Country::where('id', $countryID)->first()->currency ?? 0;
		
		// Related Products
		$ids = json_decode($courseDetails->related_courses, true);
		if (!empty($ids) && is_array($ids)) {
			$relatedCourses = Course::with('getCategory')
				->whereIn('id', $ids)
				->get();
		} else {
			$relatedCourses = collect(); // empty collection
		}

		return view('user.course-details', compact('courseDetails', 'countries', 'price', 'currency', 'relatedCourses'));
	}
	public function setCountry(Request $request)
    {
        Session::put('selected_country_id', $request->country_id);


        return response()->json([
            'status' => 'ok',
            'country_id' => $request->country_id
        ]);
    }
	public function courseSchedule(Request $request, $slug)
	{
		$countryID = Session::get('selected_country_id');
		$course = Course::where('slug', $slug)->firstOrFail();
        $countries = Country::get();
		$currency = Country::where('id', $countryID)->first()->currency ?? 0;
		$schedulesQuery = $course->schedules()->with(['prices']);

		// Weekday / Weekend filter
		if ($request->filled('type')) {
			if ($request->type === 'weekday') {
				$schedulesQuery->whereRaw('WEEKDAY(start_date) < 5');
			} elseif ($request->type === 'weekend') {
				$schedulesQuery->whereRaw('WEEKDAY(start_date) >= 5');
			}
		}

		// Month filter
		if ($request->filled('month')) {
			$monthNumber = \Carbon\Carbon::parse("1 " . $request->month)->month;
			$schedulesQuery->whereMonth('start_date', $monthNumber);
		}

		// Class type filter
		if ($request->filled('batche')) {
			$schedulesQuery->where('batche', $request->batche);
		}

		$schedules = $schedulesQuery->where('start_date', '>=', now())->paginate(10);
		return view('user.course-schedule', compact('course', 'schedules', 'countries', 'currency'));
	}


    public function searchCourses(Request $request)
    {
        $query = $request->input('q');

        if (strlen($query) < 3) {
            return response()->json([]);
        }

        $courses = Course::where('title', 'like', "%{$query}%")
            ->orderBy('id', 'desc')
            ->get(['id', 'title', 'slug']);

        return response()->json($courses);
    }


}
