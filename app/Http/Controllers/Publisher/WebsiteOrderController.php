<?php

namespace App\Http\Controllers\Publisher;

use App\Models\WebsiteOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteOrderController extends Controller
{
    public function index(){
        return view('publisher.layouts.pages.website.index');
    }

    public function create(){
        return view('publisher.layouts.pages.website.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'website_url' => 'required|url',
            'website_category' => 'required|string|max:255',
            'website_language' => 'required|string|max:255',
            'monthly_traffic' => 'required|numeric',
            'domain_authority' => 'required|numeric',
            'domain_rating' => 'required|numeric',
            'pricing' => 'nullable|numeric',
        ]);

        WebsiteOrder::create([
            'website_url' => $request->website_url,
            'website_category' => $request->website_category,
            'website_language' => $request->website_language,
            'monthly_traffic' => $request->monthly_traffic,
            'domain_authority' => $request->domain_authority,
            'domain_rating' => $request->domain_rating,
            'pricing' => $request->pricing ?? 0,
            'status' => 'pending',
            'is_active' => 1,
        ]);

        return response()->json([
            'message' => 'Website successfully added.',
        ]);
    }

}
