<?php

namespace App\Http\Controllers\Admin;

use App\Models\Founder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class FounderController extends Controller
{
    public function index(){
        $founders = Founder::select(['id','name','designation','social_icon','social_url','image'])->latest()->get();
        return view('admin.layouts.pages.about-page.founder.index', compact('founders'));
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


    public function edit($id){
        $founder = Founder::findOrFail($id);
        return view('admin.layouts.pages.about-page.founder.edit', compact('founder'));
    }
    

    public function update(Request $request){
        $founder = Founder::findOrFail($request->id);

        $socialNewIcon = $this->SocialIcon($request);
        if($socialNewIcon){
            if (!empty($founder->social_icon)) {
                $oldImagePath = public_path($founder->social_icon);
                if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $founder->social_icon = $socialNewIcon;
        }

        $founderNewImage = $this->founderImage($request);
        if($founderNewImage){
            if(!empty($founder->image)){
                $oldImagePath = public_path($founder->image);
                if(file_exists($oldImagePath) && is_file($oldImagePath)){
                    unlink($oldImagePath);
                }
            }
            $founder->image = $founderNewImage;
        }

        $founder->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'social_icon' => $founder->social_icon,
            'social_url' => $request->social_url,
            'image' => $founder->image,
        ]);

            return response()->json([
                'message' => 'Data updated successfully!',
                'social_icon_path' => $founder->social_icon ? asset($founder->social_icon) : null,
                'image_path' => $founder->image ? asset($founder->image) : null
            ]);

    }


    public function destroy(Request $request){
        $founder = Founder::findOrFail($request->id);
        if($founder){
            if (!empty($founder->social_icon)) {
                $oldImagePath = public_path($founder->social_icon);
                if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        if($founder){
            if (!empty($founder->image)) {
                $oldImagePath = public_path($founder->image);
                if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $founder->delete();

        return response()->json([
            'message' => 'Data Successfully deleted!'
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
