<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurStory;
use Illuminate\Http\Request;

class OurStoryController extends Controller
{
    public function index()
    {
        $storyContent = OurStory::first() ?? new OurStory();
        return view('admin.layouts.pages.about-page.our-story.index', compact('storyContent'));
    }

    public function updateSectionOne(Request $request)
    {
        $storyContent = OurStory::first() ?? new OurStory();

        if ($request->has('section_title')) {
            $storyContent->section_title = $request->section_title;
        }
        if ($request->has('section_subtitle')) {
            $storyContent->section_subtitle = $request->section_subtitle;
        }
        if ($request->has('title')) {
            $storyContent->title = $request->title;
        }
        if ($request->has('story_content')) {
            $storyContent->story_content = $request->story_content;
        }

        if ($request->hasFile('image')) {
            if ($storyContent->image && file_exists(public_path($storyContent->image))) {
                unlink(public_path($storyContent->image));
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/our_story'), $fileName);
            $storyContent->image = 'uploads/our_story/' . $fileName;
        }

        $storyContent->save();

        return response()->json([
            'message' => 'Section One updated successfully!',
            'image' => $storyContent->image ? asset($storyContent->image) : null,
        ]);
    }

    public function updateSectionTwo(Request $request)
    {
        $story = OurStory::first() ?? new OurStory();

        if ($request->has('section_title_two')) {
            $story->section_title_two = $request->section_title_two;
        }
        if ($request->has('story_content_two')) {
            $story->story_content_two = $request->story_content_two;
        }
        $story->save();

        return response()->json(['message' => 'Section Two updated']);
    }

    public function updateSectionThree(Request $request)
    {
        $story = OurStory::first() ?? new OurStory();

        if ($request->has('section_title_three')) {
            $story->section_title_three = $request->section_title_three;
        }
        if ($request->has('story_content_three')) {
            $story->story_content_three = $request->story_content_three;
        }
        $story->save();

        return response()->json(['message' => 'Section Three updated']);
    }
}
