<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LinkBuildingSolution;
use Illuminate\Http\Request;

class LinkBuildingSolutionController extends Controller
{
    public function index()
    {
        $linkPublishSolution = LinkBuildingSolution::first();
        return view('admin.layouts.pages.service_page.link-building.link-building-solution.index', compact('linkPublishSolution'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'section_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'required|array',
        ]);

        $data = LinkBuildingSolution::updateOrCreate(
            ['id' => $request->id ?? null],
            [
                'section_title' => $request->section_title,
                'title' => $request->title,
                'description' => $request->description,
                'features' => $request->features,
            ],
        );

        return response()->json([
            'status' => 'success',
            'message' => $request->id ? 'Data updated successfully!' : 'Data created successfully!',
            'data' => $data,
        ]);
    }
}
