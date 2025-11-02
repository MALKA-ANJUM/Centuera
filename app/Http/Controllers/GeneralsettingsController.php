<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Generalsettings;
use Illuminate\Support\Facades\File;

class GeneralsettingsController extends Controller
{
    public function generalsettingscreate()
    {
        $existingSettings = Generalsettings::first();
        $countries = Country::all();
        
        // Decode JSON into array for easy looping
        $savedCountryPhones = [];
        if ($existingSettings && $existingSettings->country_rule) {
            $savedCountryPhones = json_decode($existingSettings->country_rule, true);
            // Backward compatibility: convert country name to id if needed
            foreach ($savedCountryPhones as &$row) {
                if (isset($row['country']) && !isset($row['country_id'])) {
                    $country = Country::where('name', $row['country'])->first();
                    $row['country_id'] = $country ? $country->id : null;
                }
            }
        }

        return view("admin.generalsetting.form_generalsettingslisting", compact(
            'existingSettings',
            'countries',
            'savedCountryPhones'
        ));
    }

    public function generalsettingsstore(Request $request)
    {
        $countryRules = [];
        if ($request->has('country') && $request->has('phone')) {
            foreach ($request->country as $index => $country_id) {
                if (!empty($country_id) || !empty($request->phone[$index])) {
                    $country = Country::find($country_id);
                    $countryRules[] = [
                        'country_id' => $country_id,
                        'country'    => $country ? $country->name : '',
                        'phone'      => $request->phone[$index] ?? '',
                    ];
                }
            }
        }

        $settings = Generalsettings::first() ?? new Generalsettings();

        $settings->name       = $request->input('name');
        $settings->email      = $request->input('email');
        $settings->mobile     = $request->input('mobile');
        $settings->address    = $request->input('address');
        $settings->facebook   = $request->input('facebook');
        $settings->twitter    = $request->input('twitter');
        $settings->instagram  = $request->input('instagram');
        $settings->linkedin   = $request->input('linkedin');
        $settings->printest   = $request->input('printest');
        $settings->meta_title = $request->input('meta_title');
        $settings->country_rule = json_encode($countryRules);

        if ($request->hasFile('icon')) {
            $iconPath = public_path('admin/icon/');
            if (!File::exists($iconPath)) {
                File::makeDirectory($iconPath, 0777, true, true);
            }
            $imageName = date('Ymd') . '_' . rand() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move($iconPath, $imageName);
            $settings->icon = $imageName;
        }

        if ($request->hasFile('logo')) {
            $logoPath = public_path('admin/generalSetting/');
            if (!File::exists($logoPath)) {
                File::makeDirectory($logoPath, 0777, true, true);
            }
            $imageName = date('Ymd') . '_' . rand() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move($logoPath, $imageName);
            $settings->logo = $imageName;
        }

        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

}
