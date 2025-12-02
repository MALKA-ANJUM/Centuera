<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.website.banner', compact('banners'));
    }

     public function update(Request $request)
    {
        if ($request->has('title')) {
            foreach ($request->title as $index => $title) {
                $filename = null;

                if (isset($request->file('image')[$index])) {
                    $file = $request->file('image')[$index];
                    $filename = rand(1000, 9999) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('admin/banner_img'), $filename);
                }

                Banner::create([
                    'title' => $title,
                    'short_title' => $request->short_title[$index] ?? null,
                    'description' => $request->description[$index] ?? null,
                    'image' => $filename,
                ]);
            }
        }

        return redirect()->route('admin.banner.index')->with('message', 'Banners Added Successfully!');
    }
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete file from public path
        $filePath = public_path('admin/banner_img/' . $banner->image);
        // if (file_exists($filePath)) {
        //     unlink($filePath);
        // }

        $banner->delete();
        return redirect()->route('admin.banner.index')->with('message', 'Banner Deleted Successfully!');
    }

    public function updateUserBanner(Request $request)
    {
        $updateBanner = Banner::find(2);
        if ($request->banner_img1 != null) {
            $img1 = rand(1000, 9999) . time() . '.' . $request->banner_img1->getClientOriginalExtension();
            $request->banner_img1->move(public_path('landing-assets/images/banner_img'), $img1);
            $updateBanner->banner_img1 = $img1;
        }
        if ($request->banner_img2 != null) {
            $img2 = rand(10000, 99999) . time() . '.' . $request->banner_img2->getClientOriginalExtension();
            $request->banner_img2->move(public_path('landing-assets/images/banner_img'), $img2);
            $updateBanner->banner_img2 = $img2;
        }
        if ($request->banner_img3) {
            $img3 = rand(100000, 999999) . time() . '.' . $request->banner_img3->getClientOriginalExtension();
            $request->banner_img3->move(public_path('landing-assets/images/banner_img'), $img3);
            $updateBanner->banner_img3 = $img3;
        }
        if ($request->banner_img4 != null) {
            $img4 = rand(1000000, 9999999) . time() . '.' . $request->banner_img4->getClientOriginalExtension();
            $request->banner_img4->move(public_path('landing-assets/images/banner_img'), $img4);
            $updateBanner->banner_img4 = $img4;
        }
        if ($request->banner_img5 != null) {
            $img5 = rand(10000000, 99999999) . time() . '.' . $request->banner_img5->getClientOriginalExtension();
            $request->banner_img5->move(public_path('landing-assets/images/banner_img'), $img5);
            $updateBanner->banner_img5 = $img5;
        }
        $updateBanner->save();
        alert()->success('Success', 'Banner Image Updated Successfully');
        return redirect()->route('admin.banner');
    }
    public function deleteBanner($image)
    {
        Banner::where('banner_img1', $image)->update([
            'banner_img1' => null
        ]);
        Banner::where('banner_img2', $image)->update([
            'banner_img2' => null
        ]);
        Banner::where('banner_img3', $image)->update([
            'banner_img3' => null
        ]);
        Banner::where('banner_img4', $image)->update([
            'banner_img4' => null
        ]);
        Banner::where('banner_img5', $image)->update([
            'banner_img5' => null
        ]);
        alert()->success('Success', 'Banner Image Deleted Successfully');
        return redirect()->back();
    }
    public function deleteUserBanner($image)
    {
        //  return $image;
        Banner::where('banner_img1', $image)->update([
            'banner_img1' => null
        ]);
        Banner::where('banner_img2', $image)->update([
            'banner_img2' => null
        ]);
        Banner::where('banner_img3', $image)->update([
            'banner_img3' => null
        ]);
        Banner::where('banner_img4', $image)->update([
            'banner_img4' => null
        ]);
        Banner::where('banner_img5', $image)->update([
            'banner_img5' => null
        ]);
        alert()->success('Success', 'Banner Image Deleted Successfully');
        return redirect()->back();
    }
}
