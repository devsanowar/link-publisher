<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageCta;
use Illuminate\Http\Request;

class AboutPageCtaController extends Controller
{
    public function index(){
        $aboutPageCta = AboutPageCta::first() ?? new AboutPageCta();
        return view('admin.layouts.pages.about-page.cta.index', compact('aboutPageCta'));
    }
    
    public function update(Request $request){
        $aboutPageCta = AboutPageCta::first() ?? new AboutPageCta();
        $aboutPageCta->title = $request->title;
        $aboutPageCta->content = $request->content;
        $aboutPageCta->button_name = $request->button_name;
        $aboutPageCta->button_url = $request->button_url;
        $aboutPageCta->save();

        return response()->json([
            'message' => 'Data updated successfully!'
        ]);
    }
}
