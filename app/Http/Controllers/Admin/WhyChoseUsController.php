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

    public function update(Request $request)
    {
        // যদি টেবিলে আগে থেকে ডাটা না থাকে তাহলে নতুন তৈরি করব
        $whyChoseUs = WhyChoseUs::first() ?? new WhyChoseUs();

        // Form 1
        if ($request->has('title_one')) {
            $whyChoseUs->title_one = $request->title_one;
            $whyChoseUs->description_one = $request->description_one;

            if ($request->hasFile('image_one')) {
                $fileName = time() . '_1.' . $request->image_one->extension();
                $request->image_one->move(public_path('uploads/why_choose_us_image'), $fileName);
                $whyChoseUs->image_one = 'uploads/why_choose_us_image/' . $fileName;
            }
        }

        // Form 2
        if ($request->has('title_two')) {
            $whyChoseUs->title_two = $request->title_two;
            $whyChoseUs->description_two = $request->description_two;

            if ($request->hasFile('image_two')) {
                $fileName = time() . '_2.' . $request->image_two->extension();
                $request->image_two->move(public_path('uploads/why_choose_us_image'), $fileName);
                $whyChoseUs->image_two = 'uploads/why_choose_us_image/' . $fileName;
            }
        }

        // Form 3
        if ($request->has('title_three')) {
            $whyChoseUs->title_three = $request->title_three;
            $whyChoseUs->description_three = $request->description_three;

            if ($request->hasFile('image_three')) {
                $fileName = time() . '_3.' . $request->image_three->extension();
                $request->image_three->move(public_path('uploads/why_choose_us_image'), $fileName);
                $whyChoseUs->image_three = 'uploads/why_choose_us_image/' . $fileName;
            }
        }

        // Form 4
        if ($request->has('title_four')) {
            $whyChoseUs->title_four = $request->title_four;
            $whyChoseUs->description_four = $request->description_four;

            if ($request->hasFile('image_four')) {
                $fileName = time() . '_4.' . $request->image_four->extension();
                $request->image_four->move(public_path('uploads/why_choose_us_image'), $fileName);
                $whyChoseUs->image_four = 'uploads/why_choose_us_image/' . $fileName;
            }
        }

        // Form 5
        if ($request->has('title_five')) {
            $whyChoseUs->title_five = $request->title_five;
            $whyChoseUs->description_five = $request->description_five;

            if ($request->hasFile('image_five')) {
                $fileName = time() . '_5.' . $request->image_five->extension();
                $request->image_five->move(public_path('uploads/why_choose_us_image'), $fileName);
                $whyChoseUs->image_five = 'uploads/why_choose_us_image/' . $fileName;
            }
        }

        $whyChoseUs->save();

        return response()->json(['message' => 'Data updated successfully!']);
    }
}
