<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLogincontroller extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function loginDetailsSubmit(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'User Login Successfully!');
        } else {
            alert()->warning('WarningAlert', '');
            return redirect()->back()->with('error', 'Incorrect Credentials');
        }
    }
    public function register()
    {
        return view('user.register');
    }
    public function registerDetailsSubmit(Request $request)
    {
        // Step 1: Validate incoming request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        try {
            $newUser = new User();
            $newUser->first_name = $request->first_name;
            $newUser->last_name = $request->last_name;
            $newUser->email = $request->email;
            $newUser->password = $request->password;
            $newUser->save();
            return redirect()->route('login')->with('success', 'User Registered Successfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }


}
