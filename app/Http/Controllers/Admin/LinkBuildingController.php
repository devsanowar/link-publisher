<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutLinkBuilding;
use Illuminate\Http\Request;

class LinkBuildingController extends Controller
{
    public function index(){
        $aboutLinkBuilding = AboutLinkBuilding::first();
        return view('admin.layouts.pages.service_page.link-building.link-building', compact('aboutLinkBuilding'));
    }

}
