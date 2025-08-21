<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::select(['id','name','designation','image','status'])->latest()->get();
        return view('admin.layouts.pages.about-page.team.index', compact('teams'));
    }

    public function create(){
        return view('admin.layouts.pages.about-page.team.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:300',
            'status' => 'required|in:0,1',
        ]);

        $teamImage = $this->teamImage($request);

        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $teamImage,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Data successfully saved!'
        ]);

    }

    public function edit($id){
        $team = Team::findOrFail($id);
        return view('admin.layouts.pages.about-page.team.edit', compact('team'));
    }


    public function update(Request $request){
        
        $team = Team::findOrFail($request->id);
        
        $teamNewImage = $this->teamImage($request);
        if($teamNewImage){
            if(!empty($team->image)){
                $oldImagePath = public_path($team->image);
                if(file_exists($oldImagePath) && is_file($oldImagePath)){
                    unlink($oldImagePath);
                }
            }
            $team->image = $teamNewImage;
        }

        $team->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $team->image,
            'status' => $request->status,
        ]);

            return response()->json([
                'message' => 'Data updated successfully!',
                'image_path' => $team->image ? asset($team->image) : null
            ]);

    }



    public function destroy(Request $request){

        $team = Team::findOrFail($request->id);

        if($team){
            if (!empty($team->image)) {
                $oldImagePath = public_path($team->image);
                if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $team->delete();

        return response()->json([
            'message' => 'Data Successfully deleted!'
        ]);


    }





    public function teamChangeStatus(Request $request)
    {
        $team = Team::find($request->id);

        if (!$team) {
            return response()->json(['status' => false, 'message' => 'Team not found.']);
        }

        $team->status = !$team->status;
        $team->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $team->status ? 'Active' : 'DeActive',
            'class' => $team->status ? 'btn-success' : 'btn-danger',
        ]);
    }




    // Image edit and update code here
    private function teamImage(Request $request){
        if ($request->hasFile('image')) {
            $image = Image::read($request->file('image'));
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('uploads/team_images/');
            $image->save($destinationPath . $imageName);
            return 'uploads/team_images/' . $imageName;

        }
        return null;
    }
}
