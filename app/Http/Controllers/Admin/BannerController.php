<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BannerHero;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Laravel\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        $banner = BannerHero::first();
        return view('admin.layouts.pages.hero-banner.index', compact('banner'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'interested_in' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_one_name' => 'nullable|string|max:255',
            'button_one_url' => 'nullable|string|max:255',
            'button_two_name' => 'nullable|string|max:255',
            'button_two_url' => 'nullable|string|max:255',
            'guarantee_text' => 'nullable|string|max:255',
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:2048',
        ]);

        $banner = BannerHero::first() ?? new BannerHero();

        // basic fields
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->description = $request->description;
        $banner->interested_in = $request->interested_in;
        $banner->button_one_name = $request->button_one_name;
        $banner->button_one_url = $request->button_one_url;
        $banner->button_two_name = $request->button_two_name;
        $banner->button_two_url = $request->button_two_url;
        $banner->guarantee_text = $request->guarantee_text;

        // ====== 🔥 Handle files ======
        // পুরনো ফাইল যা ইউজার রাখতে চাইছে
        $oldFiles = $request->input('old_files', []);

        // পুরনো সব ফাইল database থেকে
        $existingFiles = json_decode($banner->files ?? '[]', true);

        // যা মুছতে হবে - পুরনো যেগুলো old_files এর মধ্যে নাই
        $filesToDelete = array_diff($existingFiles, $oldFiles);
        foreach ($filesToDelete as $file) {
            $oldPath = public_path($file);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }

        // নতুন ফাইল আপলোড হলে
        $newFiles = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $newFiles[] = $this->bannerHeroImage($file);
            }
        }

        // রাখা পুরনো ফাইল + নতুন ফাইল মিশিয়ে ফাইনাল লিস্ট
        $finalFiles = array_merge($oldFiles, $newFiles);
        $banner->files = json_encode($finalFiles);

        $banner->save();

        return response()->json([
            'message' => 'Banner updated successfully!',
            'images' => $newFiles  // যেই ফাইলগুলো তুমি আপলোড করলে
        ]);
    }

    private function bannerHeroImage($file)
    {
        if ($file) {
            $image = Image::read($file);
            $imageName = time() . '-' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads/banner_hero_image/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->save($destinationPath . $imageName);

            return 'uploads/banner_hero_image/' . $imageName;
        }
        return null;
    }
}
