<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChoseUs;
use Illuminate\Http\Request;

class WhyChoseUsController extends Controller
{
    public function index()
    {
        $whyChoseUs = WhyChoseUs::first() ?? new WhyChoseUs();
        return view('admin.layouts.pages.why_choose_us.index', compact('whyChoseUs'));
    }


    public function update(Request $request, $id = null)
    {
        $request->validate([
            'title_one' => 'required|string|max:255',
            'description_one' => 'nullable|string',
            'image_one' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $whyChoseUs = $id ? WhyChoseUs::find($id) : WhyChoseUs::first();

        if (!$whyChoseUs) {
            $whyChoseUs = new WhyChoseUs();
        }


        $whyChoseUs->title_one = $request->title_one;
        $whyChoseUs->description_one = $request->description_one;

        if ($request->hasFile('image_one')) {
            $fileName = time() . '.' . $request->image_one->extension();
            $request->image_one->move(public_path('uploads/why_choose_us_image'), $fileName);
            $whyChoseUs->image_one = 'uploads/why_choose_us_image/' . $fileName;
        }

        $whyChoseUs->save();

        return response()->json(['message' => 'Data saved successfully!'], 200);
    }
}
