@extends('website.layouts.app')
@section('title', 'About Page')
@push('styles')
    <link href="{{ asset('frontend') }}/assets/css/blog.css" rel="stylesheet">
@endpush
@section('website_content')
    <main>
        <div class="sidebar-blog-card-content">
            <div class="container">
                <h2 class="blog-top-title-page">Discover A Wealth of Knowledge</h2>
            </div>
            <div class="container">
                @include('website.layouts.pages.blog.sidebar')

                <!-- Main Content -->
                <div class="main-content">

                   @include('website.layouts.pages.blog.all-blog')

                </div>
            </div>

        </div>
    </main>
@endsection