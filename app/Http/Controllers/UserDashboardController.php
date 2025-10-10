<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\TimeZone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        $countries = Country::with('getTimeZone')->get();
        $timezones = TimeZone::get();
        return view('user.dashboard', compact('countries', 'timezones'));
    }

    public function updateBasic(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:10',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:F,M,OTH,NO',
            'dob' => 'required|date',
            'training_funded_by' => 'nullable|string|in:self,organisation',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'linkedin' => 'nullable|url|max:255',
        ]);

        try {
            $user = User::where('id', Auth()->user()->id)->first();

            // Handle file upload if exists
            if($request->image != null){
                $image = date('Ymd') . '_' . rand() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('user/profile', $image);
                $user->image = $image;
            }
          
            // Update user fields
            $user->title = $request->title;
            $user->first_name = $request->first_name;
            $user->middle_name = $request->middle_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            $user->dob = $request->dob;
            $user->training_funded_by = $request->training_funded_by;
            $user->linkedin = $request->linkedin;
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
            'email' => 'required|email',
            'mobile' => 'required|string|max:20',
            'country' => 'required|integer',
            'state' => 'required|integer',
            'city' => 'required|string|max:255',
            'timezone_id' => 'required',
            'address' => 'nullable|string|max:1000',
        ]);

        try {
            $user = User::where('id', Auth()->user()->id)->first();
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->timezone_id = $request->timezone_id; 
            $user->address = $request->address;
            $user->save();

            session()->flash('success', 'User Contact Details Updated successfully!');
            return redirect()->back();
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
    }
}
