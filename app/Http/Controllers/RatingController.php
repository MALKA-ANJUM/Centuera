<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating()
    {
        $ratings = Rating::orderBy('id', 'DESC')->paginate(10);
        return view('admin.ratings.list', compact('ratings'));
    }

   public function approveStatus(Request $request)
{
    $rating = Rating::findOrFail($request->id);
    $rating->approved = $request->approved;
    $rating->save();

    return response()->json(['success' => true]);
}

}
