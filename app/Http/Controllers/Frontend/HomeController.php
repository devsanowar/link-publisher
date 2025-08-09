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
use App\Models\BannerHero;
use App\Models\Brand;
use App\Models\Privacypolicy;
use App\Models\Returnrefund;
use App\Models\Termscondition;
use App\Models\WhyChoseUs;

use function Laravel\Prompts\select;

class HomeController extends Controller
{
    public function index()
    {
        $banner = BannerHero::first();
        $promobanner = Promobanner::where('is_active', 1)
            ->first();
        $brands = Brand::select(['id', 'image'])->latest()->get();



        $about = About::first();
        $social_icon = WebsiteSocialIcon::select(['id', 'messanger_url'])->first();
        // $website_setting = WebsiteSetting::select(['id', 'phone'])->first();


        $whychoseuss = WhyChoseUs::where('is_active', 1)->get();


        $achievements = Achievement::where('is_active', 1)
            ->get(['id', 'title', 'count_number']);

        $reviews = Review::latest()->get(['id', 'name', 'profession', 'review', 'image']);

        $cta = Cta::where('is_active', 1)->first();

        $blogs = Post::latest()->take(3)->get();

        return view('website.home', compact(['banner', 'promobanner', 'brands','whychoseuss', 'achievements', 'reviews', 'about', 'blogs', 'social_icon', 'cta']));
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
