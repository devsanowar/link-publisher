<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.layouts.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.layouts.pages.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string',
            'url' => 'nullable|url',
        ]);

        Service::create($request->only('title', 'icon', 'url'));

        return response()->json([
            'message' => 'Services successfully added',
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string',
            'url' => 'nullable|url',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'url' => $request->url,
        ]);

        return response()->json([
            'message' => 'Service updated successfully!',
            'data' => $service,
        ]);
    }

    public function destroy($id){
        $service = Service::findOrFail($id);
        $service->delete();
        Toastr::success('Service successfully deleted!');
        return redirect()->back();
    }
}
