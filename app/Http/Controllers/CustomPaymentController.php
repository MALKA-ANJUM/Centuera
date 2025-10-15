<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomPayment;
use App\Models\Course;
use App\Models\Country;

class CustomPaymentController extends Controller
{
    public function customPayment(){
        $courses = Course::get();
        $countries = Country::get();
        return view('user.custom-payment', compact('courses','countries'));
    }

    //create
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'country_code'=> 'required|string|max:10',
            'phone'       => 'required|string|max:20',
            'course'      => 'required|exists:courses,id',
            'currency'    => 'required|string|max:10',
            'amount'      => 'required|numeric|min:0',
            'date'        => 'nullable|string',
            'referral'    => 'nullable|string|max:255',
        ]);
        // insert
        $payment = CustomPayment::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'country_code'=> $request->country_code,
            'phone'       => $request->phone,
            'course_id'   => $request->course,
            'currency'    => $request->currency,
            'amount'      => $request->amount,
            'date'        => $request->date, // comma-separated dates
            'referral'    => $request->referral,
        ]);

        return redirect()->back()->with('success', 'Payment inserted successfully!');
    }
}
