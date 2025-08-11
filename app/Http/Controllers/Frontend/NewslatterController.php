<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;

class NewslatterController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create([
            'email' => $request->email
        ]);

        return response()->json([
            'message' => "Subscribed successfully!"
        ]);
    }
}
