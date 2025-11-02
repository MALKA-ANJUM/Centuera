<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomPayment;
use App\Models\Course;
use App\Models\Country;
use App\Models\Order;
use Carbon\Carbon;

class CustomPaymentController extends Controller
{
    //show form
    public function customPayment(){
        $countries = Country::get();
        return view('user.custom-payment', compact('countries'));
    }

    //create
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'country_code'=> 'required|string|max:10',
            'phone'       => 'required|string|max:20',
            'courses'      => 'required|exists:courses,id',
            'amount'      => 'required',
        ]);

        $dates = explode(',', $request->date);

        $startDate = null;
        $endDate = null;
        // Split input into start and end
       if (!empty($request->date)) {
            // split by "to"
            $dates = explode('to', $request->date);

            if (count($dates) >= 1 && !empty(trim($dates[0]))) {
                $startDate = Carbon::createFromFormat('d-m-Y', trim($dates[0]))->format('Y-m-d');
            }
            if (count($dates) >= 2 && !empty(trim($dates[1]))) {
                $endDate = Carbon::createFromFormat('d-m-Y', trim($dates[1]))->format('Y-m-d');
            }
        }

        $payment = Order::create([
            'fullname'        => $request->name,
            'email'       => $request->email,
            'country_code'=> $request->country_code,
            'phone'       => $request->phone,
            'courses'   => $request->courses,
            'total_amount'      => $request->amount,
            'custom_payment' => 1,
            'workshop_start_date' => $startDate,
            'workshop_end_date' => $endDate,
            'status' => 0,
        ]);
        return redirect()->back()->with('success', 'Payment inserted successfully!');
    }

    //show course using ajax
    public function getCourses()
    {
        $courses = Course::select('id', 'title')->get();

        return response()->json($courses);
    }

    //listing in admin
    public function customList()
    {
        $payments = Order::with('course')->orderBy('id', 'desc')->paginate(10);
        return view('admin.custom-payment.list', compact('payments'));
    }

}
