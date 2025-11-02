<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLogincontroller extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('user.dashboard');
        }
        return view('user.login');
}

    public function loginDetailsSubmit(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard')->with('success', 'User Login Successfully!');
        } else {
            alert()->error('error', '');
            return redirect()->back()->with('error', 'Incorrect Credentials');
        }
    }
    public function register()
    {
        $countries = Country::all();
        return view('user.register', compact('countries'));
    }
    public function registerDetailsSubmit(Request $request)
    {
        // Step 1: Validate incoming request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'mobile'     => 'required',
            'password'   => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        try {
            $newUser = new User();
            $newUser->first_name = $request->first_name;
            $newUser->last_name = $request->last_name;
            $newUser->email = $request->email;
            $newUser->country_code = $request->country_code;
            $newUser->password = Hash::make($request->password);
            $newUser->save();
            session()->flash('success', 'User Registered Successfully!');
            return redirect()->route('login');
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
    }
    public function getCountries()
    {
        return response()->json(Country::select('id', 'name', 'iso2', 'flag')->get());
    }
    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get(['id', 'name']);
        return response()->json($states);
    }

}
