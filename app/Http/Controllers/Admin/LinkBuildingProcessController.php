<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LinkBuildingProcess;
use Illuminate\Http\Request;

class LinkBuildingProcessController extends Controller
{
    public function index(){
        $linkBuildingProcesses = LinkBuildingProcess::select('id','title','description','is_active')->latest()->get();
        return view('admin.layouts.pages.service_page.link-building.link-building-process.index', compact('linkBuildingProcesses'));
    }

    public function create(){
        return view('admin.layouts.pages.service_page.link-building.link-building-process.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'is_active' =>'nullable|in:1,0'
        ]);

        $data = LinkBuildingProcess::create([
            'title' =>$request->title,
            'description' =>$request->description,
            'is_active' =>$request->is_active,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data inserted successfully!',
            'data' => $data,
        ]);
    }

    public function edit($id){
        $linkBuildingProcess = LinkBuildingProcess::findOrFail($id);
        return view('admin.layouts.pages.service_page.link-building.link-building-process.edit', compact('linkBuildingProcess'));
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'is_active' =>'nullable|in:1,0'
        ]);

        $linkBuildingProcess = LinkBuildingProcess::findOrFail($request->id);
        $linkBuildingProcess->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => $linkBuildingProcess,
        ]);
    }


    public function destroy(Request $request){

        $linkBuildingProcess = LinkBuildingProcess::findOrFail($request->id);
        $linkBuildingProcess->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully!',
        ]);
    }

    public function linkProcessChangeStatus(Request $request){


        $linkBuildingProcess = LinkBuildingProcess::findOrFail($request->id);

        if (!$linkBuildingProcess) {
            return response()->json(['status' => false, 'message' => 'Team not found.']);
        }

        $linkBuildingProcess->is_active = !$linkBuildingProcess->is_active;
        $linkBuildingProcess->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully!',
            'new_status' => $linkBuildingProcess->is_active ? 'Active' : 'DeActive',
            'class' => $linkBuildingProcess->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }

       
}
