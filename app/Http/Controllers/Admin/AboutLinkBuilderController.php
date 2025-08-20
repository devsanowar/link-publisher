<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AboutLinkBuilding;
use App\Http\Controllers\Controller;

class AboutLinkBuilderController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'button_one_name' => 'nullable|string|max:255',
            'button_one_url' => 'nullable|url',
            'button_two_name' => 'nullable|string|max:255',
            'button_two_url' => 'nullable|url',
            'video_url' => 'nullable|url',
        ]);

        $record = AboutLinkBuilding::updateOrCreate(
            ['id' => 1],
            [
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'],
                'features' => $validated['features'] ?? [],
                'button_one_name' => $validated['button_one_name'],
                'button_one_url' => $validated['button_one_url'],
                'button_two_name' => $validated['button_two_name'],
                'button_two_url' => $validated['button_two_url'],
                'video_url' => $validated['video_url'],
            ],
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Link Building Service updated successfully!',
            'data' => $record,
        ]);
    }
}
