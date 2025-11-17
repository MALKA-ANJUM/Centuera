<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Course;
use App\Models\Generalsettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserCourseController extends Controller
{
	public function courseList(Request $request)
	{
		$countryID = Session::get('selected_country_id');
		$currency = Country::where('id', $countryID)->first()->currency ?? 0;

		$search = $request->get('search');
		$categoryId = $request->get('category'); // 🔥 Get category filter

		$courses = Course::query()
			->when($search, function ($q) use ($search) {
				$q->where('title', 'like', "%{$search}%");
			})
			->when($categoryId, function ($q) use ($categoryId) {
				$q->where('category', $categoryId);
			})
			->orderBy('id', 'DESC')->paginate(10);

		$categories = Category::get();

		if ($request->ajax()) {
			return view('user.partials.course-list', compact('courses', 'currency'))
				->render();
		}

		return view('user.course-list', compact('courses', 'currency', 'categories'));
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
		$settings = Generalsettings::first();
		$countryRules = collect(json_decode($settings->country_rule, true)); // decode JSON to array
		$tollFreeNumber = $countryRules->firstWhere('country_id', $countryID)['phone'] ?? $settings->mobile;

		// Related Products
		$ids = json_decode($courseDetails->related_courses, true);
		if (!empty($ids) && is_array($ids)) {
			$relatedCourses = Course::with('getCategory')
				->whereIn('id', $ids)
				->get();
		} else {
			$relatedCourses = collect(); // empty collection
		}

		return view('user.course-details', compact('courseDetails', 'countries', 'price', 'currency', 'relatedCourses', 'settings', 'tollFreeNumber'));
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
		return view('user.course-schedule', compact('course', 'schedules', 'countries', 'currency', 'countryID'));
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
