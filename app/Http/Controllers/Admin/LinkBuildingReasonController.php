<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LinkBuildingReason;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\LinkBuildingReasonFeature;
use Intervention\Image\Laravel\Facades\Image;

class LinkBuildingReasonController extends Controller
{
    public function index()
    {
        $linkBuildReason = LinkBuildingReason::first();
        $reasons = LinkBuildingReasonFeature::select(['id', 'title', 'description', 'is_active'])
            ->latest()
            ->get();

        return view('admin.layouts.pages.service_page.link-building.link-building-reason.index', compact('linkBuildReason', 'reasons'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:500',
        ]);

        // যদি id থাকে তাহলে update করবে, না থাকলে create করবে
        $linkBuildReason = LinkBuildingReason::find($request->id);

        $linkBuildReasonImage = $this->linkBuildingReasonImage($request);

        if ($linkBuildReason) {
            // update case
            if ($linkBuildReasonImage) {
                if (!empty($linkBuildReason->image)) {
                    $oldImagePath = public_path($linkBuildReason->image);
                    if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $linkBuildReason->image = $linkBuildReasonImage;
            }

            $linkBuildReason->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $linkBuildReason->image,
                'count_number' => $request->count_number,
            ]);
        } else {
            // create case
            $linkBuildReason = LinkBuildingReason::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $linkBuildReasonImage,
                'count_number' => $request->count_number,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully!',
            'data' => $linkBuildReason,
        ]);
    }

    // Feature reason store
    public function featureStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'nullable|in:1,0',
        ]);

        LinkBuildingReasonFeature::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Data successfully inserted!');
        return redirect()->back();
    }

    // Fetch data for the modal
    public function edit($id)
    {
        $reason = LinkBuildingReasonFeature::findOrFail($id);
        return response()->json($reason);
    }

    // Update data
    public function updateReason(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $reason = LinkBuildingReasonFeature::findOrFail($id);
        $reason->update($request->only('title', 'description', 'is_active'));

        // Return JSON for AJAX
        return response()->json([
            'success' => true,
            'message' => 'Data updated successfully!',
            'id' => $reason->id,
            'title' => $reason->title,
            'description' => $reason->description,
            'is_active' => $reason->is_active,
        ]);
    }

    // Destroy reasons

    public function destroy(Request $request){
        $reasonDelete = LinkBuildingReasonFeature::findOrFail($request->id);
        $reasonDelete->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully!'
        ]);
    }

    // Image edit and update code here
    private function linkBuildingReasonImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = Image::read($request->file('image'));
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('uploads/link_building_reason_images/');
            $image->save($destinationPath . $imageName);
            return 'uploads/link_building_reason_images/' . $imageName;
        }
        return null;
    }
}
