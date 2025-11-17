<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\CourseSchedule;
use App\Models\CourseSchedulePrice;

class ScheduleController extends Controller
{
    public function index()
    {
        $query = Course::query()->select('id', 'title');
        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }
        $courses = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.schedules.index', compact('courses'));
    }
    public function create($id)
    {   
    $countries = Country::all();
    $course = Course::findOrFail($id);
    $languages = Language::all();
    return view('admin.schedules.create', compact('course','countries','languages'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'country_id' => [
        //         'required',
        //         'array',
        //         function ($attribute, $value, $fail) {
        //             if (!in_array("0", $value)) {
        //                 $fail("Please select default all country.");
        //             }
        //         }
        //     ],
        // ]);
        $trainnerImage = null;
        if ($request->hasFile('trainner_image')) {
            $image = $request->file('trainner_image');
            $imageName = time() . '_trainner.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/trainners'), $imageName);
            $trainnerImage = $imageName;
        }
        $schedule = CourseSchedule::create([
            'course_id'            => $request->course_id,
            'type'                 => $request->type,
            'batche'               => $request->batche,
            'start_date'           => $request->start_date,
            'end_date'             => $request->end_date,
            'time_zone'            => $request->time_zone,
            'start_date'           => \Carbon\Carbon::createFromFormat('d-m-Y', $request->start_date)->format('Y-m-d'),
            'end_date'             => \Carbon\Carbon::createFromFormat('d-m-Y', $request->end_date)->format('Y-m-d'),
            'trainner_name'        => $request->trainner_name,
            'trainner_image'       => $trainnerImage,
            'language'             => $request->language,
            'trainner_description' => $request->trainner_description,
            'total_days_of_training' => $request->total_days_of_training,
        ]);
        
            CourseSchedulePrice::create([
                'course_id'      => $request->course_id,
                'schedule_id'    => $schedule->id,
                'country_id'     => $request->country_id,
                'discount_price' => $request->discount_price,
                'original_price' => $request->original_price,
            ]);

        return redirect()->route('admin.schedule.course.schedules', $schedule->course_id)->with('success', 'Schedule created successfully!');
    }

    public function courseSchedules(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $query = CourseSchedule::where('course_id', $id);
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('type', 'like', "%{$search}%")
                ->orWhere('batche', 'like', "%{$search}%");
            });
        }
        $schedules = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.schedules.course_schedules', compact('schedules', 'course'));
    }

    public function edit($id)
    {
    $schedule = CourseSchedule::findOrFail($id);
    $countries = Country::all();
    $languages = Language::all();
    return view('admin.schedules.edit', compact('schedule', 'countries', 'languages'));
    }
    public function update(Request $request, $id)
    {
        $schedule = CourseSchedule::findOrFail($id);
        $trainnerImage = $schedule->trainner_image;
        if ($request->hasFile('trainner_image')) {
            $image = $request->file('trainner_image');
            $imageName = time() . '_trainner.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/trainners'), $imageName);
            $trainnerImage = $imageName;
        }
        $schedule->update([
            'course_id'            => $request->course_id,
            'type'                 => $request->type,
            'batche'               => $request->batche,
            'start_date'           => \Carbon\Carbon::createFromFormat('d-m-Y', $request->start_date)->format('Y-m-d'),
            'end_date'             => \Carbon\Carbon::createFromFormat('d-m-Y', $request->end_date)->format('Y-m-d'),
            'time_zone'            => $request->time_zone,
            'starttime'            => $request->starttime,
            'end_time'             => $request->end_time,
            'trainner_name'        => $request->trainner_name,
            'trainner_image'       => $trainnerImage,
            'language'             => $request->language,
            'trainner_description' => $request->trainner_description,
            'total_days_of_training' => $request->total_days_of_training,
        ]);

        $existingPrices = CourseSchedulePrice::where('schedule_id', $schedule->id)->get();
        $keepIds = [];
            $data = [
                'course_id'      => $request->course_id,
                'schedule_id'    => $schedule->id,
                'country_id'     => $request->country_id,
                'discount_price' => $request->discount_price,
                'original_price' => $request->original_price,
            ];
            $price = $existingPrices->where('country_id', $request->country_id)->first();
            if ($price) {
                $price->update($data);
                $keepIds[] = $price->id;
            } else {
                $new = CourseSchedulePrice::create($data);
                $keepIds[] = $new->id;
            }
        CourseSchedulePrice::where('schedule_id', $schedule->id)
            ->whereNotIn('id', $keepIds)
            ->delete();

        return redirect()->route('admin.schedule.course.schedules', $schedule->course_id)
                        ->with('success', 'Schedule updated successfully!');
    }
    public function destroy($id)
    {
        $schedule = CourseSchedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('admin.schedule.course.schedules', $schedule->course_id)
            ->with('success', 'Schedule deleted successfully!');
    }
}
