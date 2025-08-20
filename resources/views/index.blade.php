@extends('layouts.app')

@section('title', 'IBlog - Home')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">Welcome to IBlog</h2>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
            Discover the latest in technology, programming, and digital innovation
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <form action="{{ route('blog.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    class="px-4 py-3 rounded-md text-gray-800 w-full sm:w-96" 
                    placeholder="Search articles..."
                />
                <button class="bg-white text-blue-600 px-6 py-3 rounded-md font-medium hover:bg-gray-100 transition">
                    <i class="fas fa-search mr-2"></i> Search
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Featured Posts (latest 3 posts) -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-2">Featured Posts</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featured as $post)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <img src="{{ $post->image ?? 'https://placehold.co/480x200/png' }}" 
                         alt="{{ $post->title }}" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                            <span class="mx-2">•</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('post.show', $post) }}" 
                           class="text-blue-600 font-medium hover:text-blue-800 transition">
                           Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Recent Articles -->
<div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
    <main class="lg:w-2/3">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-2">Recent Articles</h2>
        <div class="space-y-8">
            @forelse($posts as $post)
                @php
                    $readMinutes = max(1, ceil(str_word_count(strip_tags($post->content)) / 200));
                @endphp
                <article class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden flex flex-col md:flex-row">
                    <img class="md:w-1/3 h-48 md:h-auto object-cover"
                         src="https://placehold.co/480x200/png"
                         alt="{{ $post->title }}">
                    <div class="p-6 md:w-2/3">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">
                                {{ $post->category?->name ?? 'Uncategorized' }}
                            </span>
                            <span class="mx-2">•</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $readMinutes }} min read</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit(strip_tags($post->content), 160) }}
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                {{-- Tag chips placeholder; swap with real tags if/when you add them --}}
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-md text-xs">#{{ Str::slug($post->category?->name ?? 'blog') }}</span>
                            </div>
                            <a class="text-blue-600 font-medium hover:text-blue-800 transition"
                               href="{{ route('post.show', $post->slug) }}">
                               Read More
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="bg-white rounded-lg p-6 text-gray-600">No articles found.</div>
            @endforelse
        </div>

        <div class="mt-8 flex justify-center">
            {{ $posts->links() }}
        </div>
    </main>

    <!-- Sidebar -->
    <aside class="lg:w-1/3 space-y-8">
        <!-- About Widget -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">About The Blog</h3>
            <p class="text-gray-600 mb-4">IBlog brings you the latest news, tutorials, and thought pieces on technology, programming, AI, and the digital world.</p>
        </div>

        <!-- Categories Widget -->
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-xl font-bold mb-4 text-gray-800">Categories</h3>
    <div class="space-y-2">
        @forelse($categories as $cat)
            <a href="{{ route('blog.index', ['category' => $cat->slug]) }}"
               class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                <span class="text-gray-700">{{ $cat->name }}</span>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                    {{ $cat->posts_count }}
                </span>
            </a>
        @empty
            <p class="text-gray-600">No categories yet.</p>
        @endforelse
    </div>
</div>
    </aside>
</div>
@endsection
