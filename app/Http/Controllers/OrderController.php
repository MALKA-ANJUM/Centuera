<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function orderList(Request $request)
    {
        //search filter
        $orders = Order::query();
        // Search filter (grouped properly)
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

        // Status filter
        if ($request->has('status') && !empty($request->status)) {
            $orders->where('status', $request->status);
        }
        $orders = $orders->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.list', compact('orders'));
    }
    public function orderView($id)
    {
        $orders = Order::findOrFail($id);
        return view('admin.order.view', compact('orders'));
    }
    public function orderExport(Request $request)
    {
        $search = $request->query('search');// get current search
        return Excel::download(new OrderExport($search), 'orders.xlsx');
    }
}
