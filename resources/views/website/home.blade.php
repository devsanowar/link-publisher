@extends('website.layouts.app')
@section('title', 'Home Page')
@section('website_content')
    <!-- Hero Section Start -->
    @include('website.layouts.pages.home.hero-section')
    <!-- Hero Section End -->

    <!-- Hero Banner Image section Start-->
    @include('website.layouts.pages.home.hero-banner-section')
    <!-- Hero Banner Image section End-->

    <!-- Featured logo Section Start -->
    @include('website.layouts.pages.home.featured-logo-section')
    <!-- Featured logo Section End -->

    <!-- Achivement section Start -->
    @include('website.layouts.pages.home.achievement')
    <!-- Achivement section End -->

    <!-- Wall of Love section Start -->
    @include('website.layouts.pages.home.wall-of-love-section')
    <!-- Wall of Love section End -->
    <!-- Top featured section Start -->
    @include('website.layouts.pages.home.featured-section')
    <!-- Top featured section End -->
    <!-- Why Us section Start -->
    @include('website.layouts.pages.home.why-chose-us-section')
    <!-- Why Us section End -->
    <!-- Services section Start -->
    @include('website.layouts.pages.home.service-section')
    <!-- Services section End -->
    <!-- Unlock section Start -->
    @include('website.layouts.pages.home.unlock-section')
@endsection

