<?php

namespace App\Http\Controllers\Admin;

use App\Models\Founder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class FounderController extends Controller
{
    public function index(){
        return view('admin.layouts.pages.about-page.founder.index');
    }

    public function create(){
        return view('admin.layouts.pages.about-page.founder.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'social_icon' => 'required|image|mimes:jpeg,png,jpg,webp|max:50',
            'social_url' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:500',
        ]);

        $social_icon = $this->SocialIcon($request);
        $founderImage = $this->founderImage($request);

        Founder::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'social_icon' => $social_icon,
            'social_url' => $request->social_url,
            'image' => $founderImage,
        ]);

        return response()->json([
            'message' => 'Data successfully saved!'
        ]);
    }












    private function SocialIcon(Request $request){
        if ($request->hasFile('social_icon')) {
            $image = Image::read($request->file('social_icon'));
            $imageName = time() . '-' . $request->file('social_icon')->getClientOriginalName();
            $destinationPath = public_path('uploads/founder/');
            $image->save($destinationPath . $imageName);

            return 'uploads/founder/' . $imageName;

        }
        return null;
    }

    private function founderImage(Request $request){
        if ($request->hasFile('image')) {
            $image = Image::read($request->file('image'));
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('uploads/founder/');
            $image->save($destinationPath . $imageName);

            return 'uploads/founder/' . $imageName;

        }
        return null;
    }



}
