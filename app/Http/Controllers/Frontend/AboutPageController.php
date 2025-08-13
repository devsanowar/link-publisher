<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageAbout;
use App\Models\Achievement;
use App\Models\OurStory;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){
        $companyAbout = AboutPageAbout::first();
        $storyContent = OurStory::first();
        $achievements = Achievement::all();
        return view('website.about', compact('companyAbout', 'storyContent','achievements'));
    }
}
