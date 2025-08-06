<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cta;
use App\Models\Faq;
use App\Models\Post;
use App\Models\About;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\WhyChoseUs;
use App\Models\Achievement;
use App\Models\Promobanner;
use App\Models\ProjectVideo;
use Illuminate\Http\Request;
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
        $banner = Banner::select(['id', 'title', 'sub_title', 'description', 'button_name', 'button_url', 'image'])->first();
        

        $promobanners = Promobanner::where('is_active', 1)
            ->latest()
            ->get(['id', 'image', 'url']);

        $about = About::first();
        $social_icon = WebsiteSocialIcon::select(['id', 'messanger_url'])->first();
        $website_setting = WebsiteSetting::select(['id', 'phone'])->first();




        $achievements = Achievement::where('is_active', 1)
            ->latest()
            ->get(['id', 'title', 'count_number', 'image']);

        $reviews = Review::latest()->get(['id', 'name', 'profession', 'review', 'image']);

        $cta = Cta::where('is_active', 1)->first();

        $blogs = Post::latest()->take(3)->get();

        return view('website.home', compact(['banner', 'achievements', 'reviews', 'about', 'blogs', 'promobanners', 'social_icon', 'website_setting', 'cta']));
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
