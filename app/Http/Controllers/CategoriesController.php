<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categoriess = Category::all();
        if (request()->has('search')) {
            $search = request()->get('search');
            $categoriess = Category::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $categoriess = Category::paginate(10);
        }
        return view('admin.categories.index',compact('categoriess')); 
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $accreditations = [];

        foreach ($request->accreditation_bodies as $index => $bodyName) {
            $imagePath = null;

            if (isset($request->file('image')[$index])) {
                $img = $request->file('image')[$index];
                $imageName = time() . '_' . $img->getClientOriginalName();

                // Move the file to public/admin/accreditation_images
                $img->move(public_path('admin/accreditation_images'), $imageName);
            }

            $accreditations[] = [
                'name' => $bodyName,
                'image' => $imageName,
            ];
        }

        $category = new Category();
        $category->name = $request->name;
        $category->accreditation_bodies = json_encode($accreditations);
        $category->save();

        return redirect()->route('admin.categories.index')->with('message', 'Category added successfully.');
    }


    public function edit($id)
    {
       $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
    ]);

    $category = Category::findOrFail($id);
    $accreditations = [];

    foreach ($request->accreditation_bodies as $index => $bodyName) {
        $imageName = $request->old_image[$index] ?? null;

        if (isset($request->file('image')[$index])) {
            $img = $request->file('image')[$index];
            $imageName = time() . '_' . $img->getClientOriginalName();

            // Move the file to public/admin/accreditation_images
            $img->move(public_path('admin/accreditation_images'), $imageName);
        }

        $accreditations[] = [
            'name' => $bodyName,
            'image' => $imageName,
        ];
    }

    $category->name = $request->name;
    $category->accreditation_bodies = json_encode($accreditations);
    $category->save();

    return redirect()->route('admin.categories.index')->with('message', 'Category updated successfully.');
}


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message', 'Category deleted successfully.');
    }

    public function updateFeature(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->features = $request->features;
            $category->save();
        }

        return back()->with('success', 'Feature status updated successfully.');
    }

}
