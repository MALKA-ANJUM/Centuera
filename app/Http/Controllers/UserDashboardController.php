<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\Rating;
use App\Models\TimeZone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;


class UserDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $countries  = Country::get();
        $orders     = Order::orderBy('id', 'desc')->where('email', auth()->user()->email)->paginate(10);

        return view('user.dashboard', compact('countries', 'orders'));
    }
    //LIVE FILTERS USING AJAX
    public function searchOrder(Request $request)
    {
        $orders = Order::query();
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $orders->where(function ($q) use ($search) {
                $q->where('orderId', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
            });
        }
            // Date filter
        if ($request->has('from_date') && $request->has('to_date') && $request->from_date && $request->to_date) {
            $fromDate = \Carbon\Carbon::createFromFormat('d-m-Y', $request->from_date)->startOfDay();
            $toDate   = \Carbon\Carbon::createFromFormat('d-m-Y', $request->to_date)->endOfDay();
            $orders->whereBetween('created_at', [$fromDate, $toDate]);
        }
        $orders = $orders->where('email', auth()->user()->email)->orderBy('id', 'DESC')->paginate(10);

        return view('user.partials.order_rows', compact('orders'))->render();
    }
    public function viewOrder($id)
    {
        $countries = Country::get();
        $orders= Order::findOrFail($id);
        return view('user.order-view', compact('countries', 'orders'));
    }
    public function orderInvoice($id)
    {
        $countries  = Country::get();
        $orders     = Order::findOrFail($id);

        $pdf        = Pdf::loadView('user.order-invoice', compact('countries', 'orders'));
        return $pdf->download('invoice-'.$orders->orderId.'.pdf');
    }

    public function updateBasic(Request $request)
    {
        $request->validate([
            'title'             => 'nullable|string|max:10',
            'first_name'        => 'required|string|max:255',
            'middle_name'       => 'nullable|string|max:255',
            'last_name'         => 'required|string|max:255',
            'gender'            => 'required|string|in:F,M,OTH,NO',
            'dob'               => 'required|date',
            'training_funded_by' => 'nullable|string|in:self,organisation',
            'profile_picture'   => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'linkedin'          => 'nullable|url|max:255',
        ]);

        try {
            $user = User::where('id', Auth()->user()->id)->first();

            // Handle file upload if exists
            if ($request->image != null) {
                $image = date('Ymd') . '_' . rand() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('user/profile', $image);
                $user->image = $image;
            }

            // Update user fields
            $user->title        = $request->title;
            $user->first_name   = $request->first_name;
            $user->middle_name  = $request->middle_name;
            $user->last_name    = $request->last_name;
            $user->gender       = $request->gender;
            $user->dob          = $request->dob;
            $user->training_funded_by = $request->training_funded_by;
            $user->linkedin     = $request->linkedin;
            $user->save();

            session()->flash('success', 'User Basic Details Updated successfully!');
            return redirect()->back();
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
    }

    public function updateContact(Request $request)
    {
        $request->validate([
            'email'         => 'required|email',
            'mobile'        => 'required|string|max:20',
            'country'       => 'required|integer',
            'state'         => 'required|integer',
            'city'          => 'required|string|max:255',
            'timezone_id'   => 'required',
            'address'       => 'nullable|string|max:1000',
        ]);

        try {
            $user           = User::where('id', Auth()->user()->id)->first();
            $user->email    = $request->email;
            $user->mobile   = $request->mobile;
            $user->country  = $request->country;
            $user->state    = $request->state;
            $user->city     = $request->city;
            $user->timezone_id = $request->timezone_id;
            $user->address  = $request->address;
            $user->save();

            session()->flash('success', 'User Contact Details Updated successfully!');
            return redirect()->back();
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // send validation errors
                ->withInput()            // keep old input
                ->with('error', implode(' ', $validator->errors()->all())); // combine all errors into one string
        }

        try {
            $user           = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'User Password Updated successfully!');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function termsCondition()
    {
        return view('user.terms-and-conditions');
    }

    public function privacyPolicy()
    {
        return view('user.privacy-policy');
    }

    public function refundPolicy()
    {
        return view('user.refund-policy');
    }

    public function addReviewRatings(Request $request)
    {
        try {
            $rating             = new Rating();
            $rating->course_id  = $request->course_id;
            $rating->user_id    = auth()->user()->id;
            $rating->rating     = $request->rating;
            $rating->review     = $request->review;
            $rating->order_id   = $request->order_id;
            $rating->save();

            return redirect()->back()->with('success', 'Rating Added');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function getCountry(Request $request)
    {
        return Country::find($request->id);
    }

    public function getCities(Request $request)
    {
        $search = $request->get('term', '');
        $countryId = $request->get('country_id');

        $cities = City::where('country_id', $countryId)
            ->where('name', 'like', '%' . $search . '%')
            ->select('id', 'name')
            ->take(20) // limit for performance
            ->get();

        return response()->json($cities);
    }

}
