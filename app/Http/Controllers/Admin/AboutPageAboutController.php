<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageAbout;
use Illuminate\Http\Request;

class AboutPageAboutController extends Controller
{
    public function update(Request $request){
        $companyAbout = AboutPageAbout::first() ?? new AboutPageAbout();
        $companyAbout->title = $request->title;
        $companyAbout->about_content = $request->about_content;
        $companyAbout->save();

        return response()->json([
            'message' => 'Data updated successfully!'
        ]);
    }
}
