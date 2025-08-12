<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageAbout;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){
        $companyAbout = AboutPageAbout::first();
        return view('website.about', compact('companyAbout'));
    }
}
