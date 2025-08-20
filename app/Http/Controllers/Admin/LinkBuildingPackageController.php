<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LinkBuildingPackage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;

class LinkBuildingPackageController extends Controller
{
    public function index()
    {
        $packages = LinkBuildingPackage::all();
        return view('admin.layouts.pages.service_page.link-building.link-building-package.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.layouts.pages.service_page.link-building.link-building-package.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|url',
            'features' => 'nullable|array',
            'is_active' => 'required|in:0,1',
        ]);

        try {
            $package = LinkBuildingPackage::create($validated);

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Link Building Package created successfully!',
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
        $package = LinkBuildingPackage::findOrFail($id);
        return view('admin.layouts.pages.service_page.link-building.link-building-package.edit', compact('package'));
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
            'is_active' => 'required|in:0,1',
        ]);

        try {
            $package = LinkBuildingPackage::findOrFail($validated['id']);
            $package->update($validated);

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Link Building Package updated successfully!',
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

        $package = LinkBuildingPackage::findOrFail($request->id);

        $package->delete();

        return response()->json([
            'message' => 'Data Successfully deleted!'
        ]);


    }


    public function packageChangeStatus(Request $request)
    {
        $package = LinkBuildingPackage::find($request->id);

        if (!$package) {
            return response()->json(['status' => false, 'message' => 'Package not found.']);
        }

        $package->is_active = !$package->is_active;
        $package->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status changed successfully.',
            'new_status' => $package->is_active ? 'Active' : 'DeActive',
            'class' => $package->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }
}
