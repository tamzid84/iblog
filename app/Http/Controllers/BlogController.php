<?php

// app/Http/Controllers/BlogController.php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{

   public function home()
{
    $featured = Post::with('category')->latest()->take(3)->get();

    $posts = Post::with('category')
        ->latest()
        ->paginate(2);

    $categories = Category::withCount('posts')->orderBy('name')->get();

    return view('index', compact('featured', 'posts', 'categories'));
}
    public function index(Request $request)
    {
        $categorySlug = $request->string('category')->toString();
        $q            = $request->string('q')->toString();
        $sort         = $request->string('sort')->toString(); // newest, oldest, popular, comments

        $category = $categorySlug
            ? Category::where('slug', $categorySlug)->firstOrFail()
            : null;

        $posts = Post::with('category')
            ->when($category, fn($q2) => $q2->where('category_id', $category->id))
            ->when($q, fn($q2) => $q2->where(function($w) use ($q) {
                $w->where('title', 'like', "%{$q}%")
                  ->orWhere('content', 'like', "%{$q}%");
            }))
            ->when($sort === 'oldest', fn($q2) => $q2->oldest())
            ->when($sort === 'popular', fn($q2) => $q2->orderByDesc('created_at')) // swap to views when you add that column
            ->when($sort === 'comments', fn($q2) => $q2->orderByDesc('created_at')) // swap to comments_count later
            ->when(!in_array($sort, ['oldest','popular','comments'], true), fn($q2) => $q2->latest())
            ->paginate(12)
            ->withQueryString();

        // For sidebar “Subcategories” with counts; if a parent/section system is used, adjust accordingly.
        $categories = Category::withCount('posts')
            ->orderBy('name')
            ->get();

        // “Popular” widget (latest 3 from scope)
        $popular = Post::with('category')
            ->when($category, fn($q2) => $q2->where('category_id', $category->id))
            ->latest()
            ->take(3)
            ->get();

        return view('blog.index', compact('posts','categories','popular','category','q','sort'));
    }
}

