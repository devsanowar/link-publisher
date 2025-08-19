<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Postcategory;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->where('is_active', 1)->orderBy('created_at', 'desc')->paginate(10);

        $categories = Postcategory::withCount('posts')->get();

        return view('website.blog', compact('posts', 'categories'));
    }

    public function details($id)
    {
        $post = Post::with('category')->findOrFail($id);
        $post->increment('views');
        $categories = Postcategory::withCount('posts')->get();

        $recentPosts = Post::latest()->take(5)->get();

        return view('website.blog_details', compact('post', 'categories', 'recentPosts'));
    }

    public function categoryPosts($id)
    {
        $category = Postcategory::where('id', $id)->firstOrFail();
        $posts = Post::where('category_id', $category->id)->latest()->paginate(10);
        $categories = Postcategory::all();

        return view('website.layouts.pages.blog.category_posts', compact('category', 'posts', 'categories'));
    }

    public function searchPosts(Request $request)
    {
        $query = $request->get('query');

        if ($query) {
            $keywords = explode(' ', $query);

            $posts = Post::where(function ($q) use ($keywords) {
                foreach ($keywords as $word) {
                    $q->orWhere('post_title', 'LIKE', '%' . $word . '%');
                }
            })->get();
        } else {
            $posts = Post::all();
        }

        return response()->json([
            'html' => view('website.layouts.pages.blog.all-blog', compact('posts'))->render(),
        ]);
    }
}
