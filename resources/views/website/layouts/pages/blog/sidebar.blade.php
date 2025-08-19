<!-- Sidebar -->
<div class="sidebar">
    <!-- <h5>Discover <span class="text-danger">A</span> <span class="text-warning">Wealth of Knowledge</span>
                </h5> -->
    <h5 class="text-dark">Search Blog</h5>
    <input type="text" id="searchBlog" class="form-control my-3" placeholder="Search Blog" />

    <h6 class="mt-4">Category</h6>
    <a href="#">All Blogs ({{ $totalPosts }})</a>
    @foreach ($categories as $category)
        <a href="{{ route('category.posts', $category->id) }}">{{ $category->category_name }} ({{ $category->posts_count }})</a>
    @endforeach
</div>
