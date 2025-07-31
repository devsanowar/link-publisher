<?php

namespace App\Http\Controllers\Publisher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileSettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user || $user->system_admin !== 'publisher') {
            abort(403, 'Unauthorized access.');
        }
        return view('publisher.layouts.pages.profile.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if (!$user || $user->system_admin !== 'publisher') {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone'        => 'nullable|string|max:20',
            'country'      => 'nullable|string|max:100',
            'identity'     => 'nullable|string|max:255',
            'website_url'  => 'nullable|url',
        ]);

        $user->update($request->only([
            'name', 'email', 'phone', 'country', 'identity', 'website_url'
        ]));

        return response()->json(['status' => 'success']);
    }



}
