@extends('website.layouts.app')
@section('title', 'About Page')
@push('styles')
    <link href="{{ asset('frontend') }}/assets/css/service-style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/tools-style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/company.css" rel="stylesheet">
@endpush
@section('website_content')
    <main>
        <!-- About content body-->
        @include('website.layouts.pages.about.about-section')
        <!-- our story section -->
        @include('website.layouts.pages.about.our-story-section')
        <!-- Achivement section Start -->
        @include('website.layouts.pages.about.achievement-section')
        <!-- Achivement section End -->
        <!-- ready-posting section Start -->
        @include('website.layouts.pages.about.cta-section')
        <!-- ready-posting section End -->
        @include('website.layouts.pages.about.team-section')


    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const members = document.querySelectorAll(".fade-in");
            members.forEach((el, i) => {
                el.style.animationDelay = `${i * 0.15}s`;
            });
        });
    </script>
@endpush
