<?php

namespace App\Http\Controllers\Backend;

use File;
use App\Models\Feature;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{

    public function index()
    {
        $features = Feature::where('status', 1)->paginate(10);
        return view('backend.features.index', compact('features'));
    }

    public function create()
    {
        return view('backend.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'feature_title' => 'required',
            'feature_image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('feature_image')) {
            $path = storage_path('app/public/images/features');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }

            // Store the file
            $file = $request->file('feature_image');
            $storedPath = $file->store('images/features', 'public');

            // Get the full URL
            $input['feature_image'] = Storage::url($storedPath); // Generate a public URL
        }

        /** @var Feature $feature */
        $feature = Feature::create([
            'title' => $input['feature_title'],
            'image' => $input['feature_image'],
            'status' => $input['feature_status'],
        ]);

        Flash::success('Feature saved successfully.');

        return redirect(route('features.index'));
    }

    public function edit($id)
    {

        $feature = Feature::findOrFail($id);
        if (empty($feature)) {
            Flash::error('feature not found');
            return redirect(route('features.index'));
        }
        return view('backend.features.edit')->with('feature', $feature);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $feature = Feature::findOrFail($id);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $path = storage_path('app/public/images/features');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }

            // Delete the old image if exists
            if (!empty($feature->image) && File::exists(public_path($feature->image))) {
                File::delete(public_path($feature->image));
            }

            // Store the new image
            $file = $request->file('image');
            $storedPath = $file->store('images/features', 'public');

            // Update the image path
            $input['image'] = '/storage/' . $storedPath;
        }

        // Update the feature
        $feature->update($input);

        Flash::success('Feature updated successfully.');

        return redirect(route('features.index'));
    }


    public function destroy($id)
{
    $feature = Feature::findOrFail($id);

    // Delete the image file if it exists
    if (!empty($feature->image) && File::exists(public_path($feature->image))) {
        File::delete(public_path($feature->image));
    }

    // Delete the feature from the database
    $feature->delete();

    Flash::success('Feature deleted successfully.');

    return redirect(route('features.index'));
}


}
