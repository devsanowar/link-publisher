<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhychoseUsLinkBuilder;
use Illuminate\Http\Request;

class WhyChoseusLinkBuilderController extends Controller
{
    public function index(){
        $whyChoseusLinkBuilders = WhychoseUsLinkBuilder::select(['id','icon','description','is_active'])->latest()->get();
        return view('admin.layouts.pages.service_page.link-building.why-choseus-link-building.index', compact('whyChoseusLinkBuilders'));
    }

    public function create(){
        return view('admin.layouts.pages.service_page.link-building.why-choseus-link-building.create');
    }

    public function store(Request $request){
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'is_active' => 'required|in:0,1',
        ]);

        WhychoseUsLinkBuilder::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ? 1 : 0 ,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully!',
        ]);
    }

    public function edit($id){
        $whyChoseusLinkBuilder = WhychoseUsLinkBuilder::findOrFail($id);
        return view('admin.layouts.pages.service_page.link-building.why-choseus-link-building.edit', compact('whyChoseusLinkBuilder'));
    }

    public function update(Request $request){
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'is_active' => 'required|in:0,1',
        ]);

        $whyChoseusLinkBuilder = WhychoseUsLinkBuilder::findOrFail($request->id);
        $whyChoseusLinkBuilder->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ? 1 : 0 ,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => $whyChoseusLinkBuilder,
        ]);
    }


}
