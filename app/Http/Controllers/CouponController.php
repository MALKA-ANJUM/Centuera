<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $query = Coupon::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('code', 'like', "%$search%");
            });
        }
        $coupons = $query->orderByDesc('id')->paginate(10);
        return view('admin.coupons.index', compact('coupons'));
    }
    public function create()
    {
    $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
    $number = rand(1000, 9999);
    $autoCode = $letters . $number;
    $courses = Course::select('id', 'title')->orderBy('title')->get();
    return view('admin.coupons.create', compact('autoCode', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'expire_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric',
            'course_id' => 'nullable|array',
            'course_id.*' => 'integer|exists:courses,id',
            'code' => 'required|string|max:255|unique:coupons,code',
        ]);

        // Store course_id as JSON array
        $validated['course_id'] = $request->has('course_id') ? json_encode($request->course_id) : null;

        Coupon::create($validated);

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon created successfully.');
    }
    public function edit(Coupon $coupon)
    {
        $courses = Course::select('id', 'title')->orderBy('title')->get();
        return view('admin.coupons.edit', compact('coupon', 'courses'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'expire_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric',
            'course_id' => 'nullable|array',
            'course_id.*' => 'integer|exists:courses,id',
            'code' => 'required|string|max:255|unique:coupons,code,' . $coupon->id,
        ]);

        $validated['course_id'] = $request->has('course_id') ? json_encode($request->course_id) : null;

        $coupon->update($validated);

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated successfully.');
    }
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted successfully.');
    }
}
