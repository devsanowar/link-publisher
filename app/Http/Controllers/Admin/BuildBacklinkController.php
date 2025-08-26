<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BuildBacklink;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class BuildBacklinkController extends Controller
{
    public function index()
    {
        $buildBacklink = BuildBacklink::first();
        return view('admin.layouts.pages.service_page.link-building.build-backlink.index', compact('buildBacklink'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:500',
        ]);

        $buildBacklink = BuildBacklink::findOrFail($request->id);

        $buildBacklinkImage = $this->buildBacklinkImage($request);
        if($buildBacklinkImage){
            if (!empty($buildBacklink->image)) {
                $oldImagePath = public_path($buildBacklink->image);
                if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $buildBacklink->image = $buildBacklinkImage;
        }
        $buildBacklink->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $buildBacklink->image,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => $buildBacklink,
        ]);
    }

    private function buildBacklinkImage(Request $request){
        if ($request->hasFile('image')) {
            $image = Image::read($request->file('image'));
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('uploads/backlinks_image/');
            $image->save($destinationPath . $imageName);
            return 'uploads/backlinks_image/' . $imageName;

        }
        return null;
    }
}
