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
                    <div id="postList">
                        @include('website.layouts.pages.blog.all-blog')
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#searchBlog').on('keyup', function() {
            let query = $(this).val().trim();

            // যদি খালি থাকে -> সব post আবার load করে দাও
            if (query === "") {
                $.ajax({
                    url: "{{ route('search.posts') }}",
                    type: "GET",
                    success: function(data) {
                        $('#postList').html(data.html);
                    }
                });
                return; // এখানেই বের হয়ে যাবে
            }

            // নাহলে -> search query পাঠাও
            $.ajax({
                url: "{{ route('search.posts') }}",
                type: "GET",
                data: { query: query },
                success: function(data) {
                    $('#postList').html(data.html);
                }
            });
        });
    });
</script>

@endpush
