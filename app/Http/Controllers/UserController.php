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
use App\Models\Country;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
	public function index(Request $request)
	{
		$blogs = Blog::latest()->take(3)->get();
		$testimonials = Testimonial::latest()->take(6)->get();
		$countryID = Session::get('selected_country_id', 102);
		$currency = Country::where('id', $countryID)->first()->currency ?? 0;
		$courses = Course::with('getCourseSchedule')->latest()->take(4)->get();
		$categories = Category::with('getCourses')->where('features', 1)->latest()->take(6)->get();
		
		return view('user.index', compact('blogs', 'testimonials', 'courses', 'categories', 'currency'));
	}
	public function about()
	{
		return view('user.about');
	}

	public function userBlog()
	{
		$blogs = Blog::orderBy('id', 'DESC')->paginate(6);
		return view('user.blog', compact('blogs'));
	}
	public function viewBlog($slug)
	{
		$blog = Blog::where('slug', $slug)->firstOrFail();
		return view('user.blog-view', compact('blog'));
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
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'mobile' => 'required|string|max:10',
			'message' => 'nullable|string',
		]);

		$contact = new Contact();
		$contact->name = $request->name;
		$contact->email = $request->email;
		$contact->mobile = $request->mobile;
		$contact->message = $request->message;
		$contact->save();
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

	//request callback store
	public function callback(Request $request)
	{
		$request->validate([
			'name'    => 'required|string|max:255',
			'phone'   => 'required|string|max:10',
			'email'   => 'nullable|email|max:255',
			'policy'  => 'accepted'
		]);

		$callback = new RequestCallback();
		$callback->name = $request->name;
		$callback->email = $request->email;
		$callback->phone = $request->phone;
		$callback->course_id = $request->course_id;
		$callback->save();
		return back()->with('success', 'Your request has been submitted successfully!');
	}

	public function lead(Request $request)
	{
		$lead = new Lead();
		$lead->course_id = $request->course_id;
		$lead->type = $request->type;
		$lead->name = $request->name;
		$lead->email = $request->email;
		$lead->country_code = $request->country_code;
		$lead->phone = $request->phone;
		$lead->enquiry_for = $request->enquiry_for;
		$lead->save();
		return back()->with('success', 'Your request has been submitted successfully!');
	}
	public function requestCallback()
	{
		$callbacks = RequestCallback::with('course')->orderBy('id', 'desc')->paginate(10);
		return view('admin.request-callback.list', compact('callbacks'));
	}
		//export to excell
	public function requestExport()
	{
		return Excel::download(new RequestCallbackExport, 'request-callbacks.xlsx');
	}
}
