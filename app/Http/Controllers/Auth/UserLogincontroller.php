<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Mail\UserForgotPasswordOTP;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    // Forgot Password Functionality
    public function forgotPasswordForm()
    {
        return view('user.forgot_password');
    }

    public function sendOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999);
        if ($user) {
            $user->login_otp = $otp;
            $user->save();

            $mailData = [
                'title' => 'Verification Code',
                'body' => 'Use this code ' . $otp . ' for verification and reset your password'
            ];

            Mail::to($user->email)->send(new UserForgotPasswordOTP($mailData));
            session()->flash('message', 'OTP successfully sent to your E-mail');
            session()->flash('alert-class', 'alert-success');
            return view('user.otp_verification', compact('user'));
        } else {
            session()->flash('message', 'No User Found');
            session()->flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function otpVerification(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        if ($user && $user->login_otp == $request->otp) {
            session()->put('user', $user);
            session()->flash('message', 'OTP Matched');
            session()->flash('alert-class', 'alert-success');
            return to_route('user.reset.password.form');
        } else {
            session()->flash('message', 'Invalid OTP');
            session()->flash('alert-class', 'alert-danger');
            return view('user.otp_verification', compact('user'));
        }
    }

    public function resetPasswordForm()
    {
        $user = session('user');
        return view('user.reset_password', compact('user'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ], [
            'password.confirmed' => 'Password and confirm password do not match'
        ]);

        $user = User::where('id', $request->user_id)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->login_otp = null;
            $user->save();
            session()->forget('user');
            session()->flash('message', 'Password Reset Successfully');
            session()->flash('alert-class', 'alert-success');
            return redirect()->route('login');
        } else {
            session()->flash('message', 'User not found');
            session()->flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

}
