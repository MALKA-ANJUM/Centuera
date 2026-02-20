<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Blog;
use App\Models\Lead;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Dynamic;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Generalsettings;
use App\Models\RequestCallback;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RequestCallbackExport;
use App\Models\Banner;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Mail\AdminNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
	public function index(Request $request)
	{
		$blogs 			= Blog::latest()->take(3)->get();
		$testimonials 	= Testimonial::latest()->take(6)->get();
		$countryID 		= Session::get('selected_country_id', 102);
		$courses 		= Course::with('getCourseSchedule')->orderBy('id', 'DESC')->latest()->take(6)->get();
		$categories		= Category::with('getCourses')->where('features', 1)->latest()->take(6)->get();
		$banners 		= Banner::all(); 
        $countries 		= Country::get();

		return view('user.index', compact('blogs', 'testimonials', 'courses', 'categories', 'banners', 'countries'));
	}

	public function about()
	{
		$testimonials 	= Testimonial::latest()->take(6)->get();
		$blogs 			= Blog::latest()->take(3)->get();
		return view('user.about', compact('testimonials', 'blogs'));
	}

	public function userBlog()
	{
		$blogs = Blog::orderBy('id', 'DESC')->paginate(6);
		return view('user.blog', compact('blogs'));
	}

	public function viewBlog($slug)
	{
		$blog 		= Blog::where('slug', $slug)->firstOrFail();
        $countries 	= Country::get();
		$recentBlogs = Blog::where('categories',  $blog->categories)
                   ->latest()
                   ->take(3)
                   ->get();

		return view('user.blog-view', compact('blog', 'countries', 'recentBlogs'));
	}

	public function showDynamicPage($slug)
    {
        $dynamicPages = Dynamic::where('slug', $slug)->first();
        if (!$dynamicPages) {
            abort(404);
        }
        $dynamicItems = Dynamic::orderBy('id', 'ASC')->get();
        return view('user.dynamic_content', compact('dynamicPages','dynamicItems'));
    }

	public function contact()
	{
		$contactpage = Generalsettings::first();
		return view('user.contact', compact('contactpage'));
	}

	public function storeContact(Request $request)
	{
		$request->validate([
			'name'		=> 'required|string|max:255',
			'email' 	=> 'required|email|max:255',
			'mobile' 	=> 'required|string|max:10',
			'message' 	=> 'nullable|string',
			'g-recaptcha-response' => 'required' 
		]);


		$response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
			'secret'   => env('GOOGLE_CAPTCHA_SECRET_KEY'),
			'response' => $request->input('g-recaptcha-response'),
			'remoteip' => $request->ip(),
		]);

		$responseData = $response->json();

		if (!$responseData['success']) {
			return back()->with('error', 'Captcha verification failed. Please try again.');
		}

		$contact		= new Contact();
		$contact->name 	= $request->name;
		$contact->email = $request->email;
		$contact->mobile = $request->mobile;
		$contact->message = $request->message;
		$contact->save();

		$details = [
			'subject' => 'Contact ('. $request->name .')',
			'name' => $request->name,
			'email' => $request->email,
			'mobile' => $request->mobile,
			'message' => $request->message,
		];

		$adminEmail = env('ADMIN_EMAIL');
    	Mail::to($adminEmail)->send(new AdminNotificationMail($details));

		return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
	}

	public function subscribe(Request $request)
	{
		$request->validate([
			'email' => 'required|email'
		]);
		$email = $request->email;
		if (Subscription::where('email', $email)->exists()) {
			return response()->json([
				'message' => 'You have already subscribed.'
			]);
		}
		Subscription::create(['email' => $email]);
		return response()->json([
			'message' => 'Subscribed successfully.'
		]);
	}

	public function logout()
	{
		Auth::guard('web')->logout();
		alert()->success('SuccessAlert', 'Successfully Logged Out');
		return to_route('login');
	}

	public function callback(Request $request)
	{
		$request->validate([
			'g-recaptcha-response' => 'required' 
		]);

		$response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
			'secret'   => env('GOOGLE_CAPTCHA_SECRET_KEY'),
			'response' => $request->input('g-recaptcha-response'),
			'remoteip' => $request->ip(),
		]);

		$responseData = $response->json();

		if (!$responseData['success']) {
			return back()->with('error', 'Captcha verification failed. Please try again.');
		}

		$callback 			= new RequestCallback();
		$callback->name 	= $request->name;
		$callback->email 	= $request->email;
		$callback->message 	= $request->message;
		$callback->country_code = $request->country_code;
		$callback->phone 	= $request->phone;
		$callback->course_id = $request->course_id;
		$callback->message 	= $request->message;
		$callback->save();

		// Load course relation
		$callback->load('course');
		$details = [
			'subject' => 'Request-Callback ('. $request->name .')',
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'country_code' => $request->country_code,
			'course' => $callback->course ? $callback->course->title : 'N/A',
			'message' => $request->message,
		];

		$adminEmail = env('ADMIN_EMAIL');
    	Mail::to($adminEmail)->send(new AdminNotificationMail($details));
		return back()->with('success', 'Your request has been submitted successfully!');
	}

	public function lead(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
			'phone' => 'required',
			'g-recaptcha-response' => 'required' 
		]);

		$response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
			'secret'   => env('GOOGLE_CAPTCHA_SECRET_KEY'),
			'response' => $request->input('g-recaptcha-response'),
			'remoteip' => $request->ip(),
		]);

		$responseData = $response->json();

		if (!$responseData['success']) {
			return response()->json([
				'status'  => 'error',
				'message' => 'Captcha verification failed. Please try again.',
			], 422);
		}

		$lead = new Lead();
		$lead->course_id = $request->course_id;
		$lead->type = $request->type;
		$lead->name = $request->name;
		$lead->email = $request->email;
		$lead->country_code = $request->country_code;
		$lead->phone = $request->phone;
		$lead->enquiry_for = $request->enquiry_for;
		$lead->company_name = $request->company_name;
		$lead->learners = $request->learners;
		$lead->save();
		// Load course relation
		$lead->load('course');
		$details = [
			'subject' => 'Lead Request Form ('. $request->name .')',
			'name' => $request->name,
			'email' => $request->email,
			'type' => $request->type,
			'phone' => $request->phone,
			'country_code' => $request->country_code,
			'course' => $lead->course ? $lead->course->title : 'N/A',
			'company_name' => $request->company_name,
			'learners' => $request->learners,
		];

    	$mailSent = true;
		try {
			$adminEmail = env('ADMIN_EMAIL');
			Mail::to($adminEmail)->send(new AdminNotificationMail($details));
		} catch (\Throwable $e) {
			$mailSent = false;
			Log::error('Mail sending failed: '.$e->getMessage());
		}

		if ($request->type === 'curriculum') {
			$course = Course::find($request->course_id);

			if ($course && $course->upload_curriculum && file_exists(public_path('uploads/curriculum/' . $course->upload_curriculum))) {
				$fileUrl = asset('uploads/curriculum/' . $course->upload_curriculum);

				return response()->json([
					'status' => 'success',
					'message' => 'Your request has been submitted successfully!',
					'mail_sent' => $mailSent,
					'file' => $fileUrl
				]);
			}

			return response()->json([
				'status' => 'error',
				'message' => 'Curriculum file not found for this course.'
			], 404);
		}

		return response()->json([
			'status' => 'success',
			'message' => 'Your request has been submitted successfully!'
		]);
	}


	public function requestCallback()
	{
		$callbacks = RequestCallback::with('course')->orderBy('id', 'desc')->paginate(10);
		return view('admin.request-callback.list', compact('callbacks'));
	}

	public function requestExport()
	{
		return Excel::download(new RequestCallbackExport, 'request-callbacks.xlsx');
	}
		public function deleteSelected(Request $request)
	{
		$ids = $request->ids;

		if(!$ids || !is_array($ids)) {
			return response()->json(['status' => 'error', 'message' => 'No callbacks selected']);
		}

		RequestCallback::whereIn('id', $ids)->delete();

		return response()->json(['status' => 'success', 'message' => 'Selected callbacks deleted successfully']);
	}

}
