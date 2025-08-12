<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chairman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UpdateChairmanRequest;
use App\Models\AboutPageAbout;
use App\Models\MissionAndVission;
use Intervention\Image\Laravel\Facades\Image;

class AboutPageController extends Controller
{
    public function index(){
        $aboutPageAbout = AboutPageAbout::first();
        return view('admin.layouts.pages.about-page.index', compact('aboutPageAbout'));
    }

}
