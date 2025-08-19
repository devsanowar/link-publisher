@extends('website.layouts.app')
@section('title', 'Blog Category Posts')
@push('styles')
    <link href="{{ asset('frontend') }}/assets/css/blog.css" rel="stylesheet">  
@endpush
@section('website_content')
    <main>
        <div class="sidebar-blog-card-content">
            <div class="container">
                <h2 class="blog-top-title-page">Category: {{ $category->category_name }}</h2>
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