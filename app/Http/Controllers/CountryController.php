<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
   public function countryList(Request $request)
    {
        $search = $request->get('search');

        $countries = Country::query();

        if ($search) {
            $countries->where('name', 'like', '%' . $search . '%');
        }

        $countries = $countries->paginate(250);

        return view('admin.country.index', compact('countries', 'search'));
    }
    public function countryEdit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.country.edit', compact('country'));
    }
    public function countryUpdate(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $request->validate([
            'flag' => 'nullable|string',
        ]);
        $country->flag = $request->input('flag');
        $country->save();
        return redirect()->route('admin.country.list')->with('message', 'Country updated successfully.');
    }
}
