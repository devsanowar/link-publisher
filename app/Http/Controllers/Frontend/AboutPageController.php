<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageAbout;
use App\Models\AboutPageCta;
use App\Models\Achievement;
use App\Models\Founder;
use App\Models\OurStory;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){
        $companyAbout = AboutPageAbout::first();
        $storyContent = OurStory::first();
        $achievements = Achievement::all();
        $aboutPageCta = AboutPageCta::first();
        $founders = Founder::all();
        $teams = Team::where('status', 1)->select(['name','designation', 'image'])->get();
        return view('website.about', compact('companyAbout', 'storyContent','achievements','aboutPageCta','founders', 'teams'));
    }
}
