<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cta;
use App\Models\Post;
use App\Models\About;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Achievement;
use App\Models\Promobanner;
use App\Models\WebsiteSetting;
use App\Models\WebsiteSocialIcon;
use App\Http\Controllers\Controller;
use App\Models\Privacypolicy;
use App\Models\Returnrefund;
use App\Models\Termscondition;

class FrontendController extends Controller
{
    public function index()
    {

        $promobanners = Promobanner::where('is_active', 1)
            ->latest()
            ->get(['id', 'image', 'url']);

        $about = About::first();
        $social_icon = WebsiteSocialIcon::select(['id', 'messanger_url'])->first();
        // $website_setting = WebsiteSetting::select(['id', 'phone'])->first();




        $achievements = Achievement::where('is_active', 1)
            ->latest()
            ->get(['id', 'title', 'count_number', 'image']);

        $reviews = Review::latest()->get(['id', 'name', 'profession', 'review', 'image']);

        $cta = Cta::where('is_active', 1)->first();

        $blogs = Post::latest()->take(3)->get();

        return view('website.home', compact(['achievements', 'reviews', 'about', 'blogs', 'promobanners', 'social_icon', 'cta']));
    }


    public function termsAndCondtion()
    {
        $pageTitle = 'Term & Condition';
        $termsAndCondition = Termscondition::first();
        return view('website.layouts.terms_and_condition', compact('termsAndCondition', 'pageTitle'));
    }

    // Privacy policy page method
    public function privacyPolicyPage()
    {
        $pageTitle = 'Privacy policy';
        $privacyPolicy = Privacypolicy::first();
        return view('website.layouts.privacy_policy', compact('privacyPolicy', 'pageTitle'));
    }

    public function returnRefund()
    {
        $pageTitle = 'Return & Refund';
        $returnRefund = Returnrefund::first();
        return view('website.layouts.return_refund', compact('returnRefund', 'pageTitle'));
    }
}
