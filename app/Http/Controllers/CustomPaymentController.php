<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use Illuminate\Http\Request;
use App\Models\CustomPayment;
use App\Models\Course;
use App\Models\Country;
use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
class CustomPaymentController extends Controller
{
    //show form
    public function customPayment(){
        $countries = Country::get();
      

    return view('user.custom-payment', compact('countries'));
    }

    //INSERT function IS IN PAYMENT CONTROLLER

    //show course using ajax
    public function getCourses()
    {
        $courses = Course::select('id', 'title')->get();

        return response()->json($courses);
    }

    //listing in admin
    public function orderList(Request $request)
    {
        //search filter
        $orders = Order::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $orders->where('orderId', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%");
        }
        // Date filter
        if ($request->has('from_date') && $request->has('to_date') && $request->from_date && $request->to_date) {
            $fromDate = \Carbon\Carbon::createFromFormat('d-m-Y', $request->from_date)->startOfDay();
            $toDate   = \Carbon\Carbon::createFromFormat('d-m-Y', $request->to_date)->endOfDay();

            $orders->whereBetween('workshop_start_date', [$fromDate, $toDate]);
        }

        // Status filter
        if ($request->has('status') && !empty($request->status)) {
            $orders->where('status', $request->status);
        }
        $orders = $orders->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.list', compact('orders'));
    }

    //order view page
    public function orderView($id){
        $orders = Order::findOrFail($id);
        return view('admin.order.view', compact('orders'));
    }

    //search and Export to excell
    public function orderExport(Request $request)
    {
       $search = $request->query('search');// get current search
        return Excel::download(new OrderExport($search), 'orders.xlsx');
    }

   
}
