<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SeoServiceController extends Controller
{
    public function index(){
        $packages = SeoService::all();
        return view('admin.layouts.pages.seo-service.index', compact('packages'));
    }

    public function create(){
        return view('admin.layouts.pages.seo-service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|url',
            'features' => 'nullable|array',
        ]);

        try {
            $package = SeoService::create($validated);

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Data created successfully!',
                    'data' => $package,
                ],
                201,
            );
        } catch (\Exception $e) {
            Log::error('Package Store Error: ' . $e->getMessage());

            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Something went wrong while saving the package.',
                ],
                500,
            );
        }
    }


    public function edit($id)
    {
        $package = SeoService::findOrFail($id);
        return view('admin.layouts.pages.seo-service.edit', compact('package'));
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:link_building_packages,id',
            'package_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|url',
            'features' => 'nullable|array',
        ]);

        try {
            $package = SeoService::findOrFail($validated['id']);
            $package->update($validated);

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Data updated successfully!',
                    'data' => $package,
                ],
                200,
            );
        } catch (\Exception $e) {
            Log::error('Package Update Error: ' . $e->getMessage());

            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Something went wrong while updating the package.',
                ],
                500,
            );
        }
    }


    public function destroy(Request $request){

        $package = SeoService::findOrFail($request->id);

        $package->delete();

        return response()->json([
            'message' => 'Data deleted successfully!',
        ]);
    }


}
