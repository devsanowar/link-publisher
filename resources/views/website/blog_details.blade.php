@extends('website.layouts.app')
<style>
    #breadcrumb {
        font-size: 0.95rem;
        background: #f8f9fa !important;
        border-left: 3px solid #ee6429;
        padding-top: 100px;
        padding-bottom: 20px;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        font-weight: bold;
        color: #6c757d;
        padding: 0 8px;
    }

    .active-color{
        color: #ee6429;
        text-decoration: none;
    }

    .bg-active-color{
        background-color: #ee6429 !important;
        color: #fff !important;
    }

    .breadcrumb a:hover {
        color: #c95c2d;
        text-decoration: underline;
    }
</style>
@section('website_content')
    <main>

        <div class="container py-4">
            
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4" id="breadcrumb">
                <ol class="breadcrumb  px-3 py-2 rounded-3">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-decoration-none active-color fw-semibold">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('blog_page') }}" class="text-decoration-none active-color fw-semibold">
                            <i class="bi bi-journal-text me-1"></i> Blog
                        </a>
                    </li>
                    <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">
                        {{ $post->post_title }}
                    </li>
                </ol>
            </nav>
            <!-- End Breadcrumb -->
            <div class="row">
                <!-- Blog Content -->
                <div class="col-lg-8">
                    <div class="card mb-4 shadow-sm border-0 rounded-3">
                        <img src="{{ asset($post->image) }}" class="card-img-top rounded-top" alt="{{ $post->post_title }}">
                        <div class="card-body p-4">
                            <h1 class="card-title mb-3">{{ $post->post_title }}</h1>

                            <div class="d-flex align-items-center text-muted small mb-4">
                                <span class="me-3">👤 {{ $post->category->category_name ?? 'Admin' }}</span>
                                <span class="me-3">📅 {{ $post->created_at->format('M d, Y') }}</span>
                                <span>👁 {{ $post->views }} Views</span>
                            </div>

                            <p class="card-text fs-6" style="line-height:1.8;">
                                {!! $post->post_content !!}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Categories -->
                    <div class="card mb-4 shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white fw-bold">📂 Categories</div>
                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('category.posts', $category->id) }}" class="text-decoration-none text-dark">
                                        {{ $category->category_name }}
                                    </a>
                                    <span class="badge bg-active-color rounded-pill">{{ $category->posts_count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts -->
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white fw-bold">📰 Recent Posts</div>
                        <ul class="list-group list-group-flush">
                            @foreach ($recentPosts as $recent)
                                <li class="list-group-item">
                                    <a href="{{ route('blog_page.details', $recent->id) }}" class="text-decoration-none text-dark">
                                        {{ $recent->post_title }}
                                    </a>
                                    <br>
                                    <small class="text-muted">{{ $recent->created_at->format('M d, Y') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
