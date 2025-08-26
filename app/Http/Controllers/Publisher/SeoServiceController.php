<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\SeoService;
use Illuminate\Http\Request;

class SeoServiceController extends Controller
{
    public function seoServicePage(){
        $seoServices = SeoService::get()->keyBy('package_type');
        return view('publisher.layouts.pages.seo-services.seo-services', compact('seoServices'));
    }
}
