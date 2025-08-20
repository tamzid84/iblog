<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $related = Post::with('category')
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn($q) => $q->where('category_id', $post->category_id))
            ->latest()->take(2)->get();

        $popular = Post::latest()->take(3)->get();

        $categories = Category::withCount('posts')
            ->orderBy('name')
            ->get();

        // No dynamic comments; keep section static in the Blade
        return view('blog.show', compact('post', 'related', 'popular', 'categories'));
    }
}
