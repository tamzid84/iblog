@extends('layouts.app')

@section('title', $category?->name ? "{$category->name} | Categories" : 'Blog | Categories')

@section('content')
<section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-bold mb-2">
                    {{ $category->name ?? 'All Articles' }}
                </h2>
                <p class="text-lg">
                    {{ $category?->description ?? 'Latest articles across categories' }}
                </p>
            </div>

            <div class="w-full md:w-auto">
                <form method="GET" action="{{ route('blog.index') }}" class="relative">
                    @if($category)
                        <input type="hidden" name="category" value="{{ $category->slug }}">
                    @endif
                    <input
                        name="q"
                        value="{{ $q }}"
                        class="w-full md:w-64 lg:w-96 px-4 py-3 rounded-md text-gray-800 pr-10"
                        placeholder="Search {{ $category->name ?? 'articles' }}..."
                        type="text" />
                    <button class="absolute right-3 top-3 text-gray-500 hover:text-blue-600" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="container mx-auto px-4 py-4">
    <nav aria-label="Breadcrumb" class="flex">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <a href="{{ route('blog.index') }}" class="ml-1 md:ml-2 text-sm font-medium text-gray-700 hover:text-blue-600">Categories</a>
                </div>
            </li>
            @if($category)
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <span class="ml-1 md:ml-2 text-sm font-medium text-blue-600">{{ $category->name }}</span>
                </div>
            </li>
            @endif
        </ol>
    </nav>
</div>

<div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
    {{-- Articles Section --}}
    <main class="lg:w-2/3">
        {{-- Category Filters (chips) --}}
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('blog.index', array_filter(['q'=>$q,'sort'=>$sort])) }}"
                   class="px-3 py-1 rounded-full text-sm {{ $category ? 'bg-gray-100 text-gray-800 hover:bg-gray-200' : 'bg-blue-600 text-white' }}">
                   All
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('blog.index', array_filter(['category'=>$cat->slug,'q'=>$q,'sort'=>$sort])) }}"
                       class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition {{ $category?->id === $cat->id ? 'ring-2 ring-blue-500' : '' }}">
                       {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Sort Options --}}
        <div class="flex justify-between items-center mb-6">
            <p class="text-gray-600">
                Showing {{ $posts->count() }} of {{ $posts->total() }} {{ Str::plural('article', $posts->total()) }}
            </p>
            <form method="GET" action="{{ route('blog.index') }}" class="flex items-center">
                @if($category)
                    <input type="hidden" name="category" value="{{ $category->slug }}">
                @endif
                @if($q)
                    <input type="hidden" name="q" value="{{ $q }}">
                @endif
                <span class="text-gray-600 mr-2">Sort by:</span>
                <select name="sort" class="border rounded-md px-3 py-1 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
                    <option value="newest"  @selected($sort==='newest' || $sort==='')>Newest First</option>
                    <option value="oldest"  @selected($sort==='oldest')>Oldest First</option>
                    <option value="popular" @selected($sort==='popular')>Most Popular</option>
                    <option value="comments" @selected($sort==='comments')>Most Comments</option>
                </select>
            </form>
        </div>

        {{-- Article List --}}
        <div class="space-y-6">
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

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </main>

    {{-- Sidebar --}}
    <aside class="lg:w-1/3 space-y-8">
        {{-- About Widget --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">
                About {{ $category->name ?? 'the Blog' }}
            </h3>
            <p class="text-gray-600 mb-4">
                {{ $category?->description ?? 'Articles across frontend, backend, performance, and more.' }}
            </p>
            <a href="{{ route('blog.index') }}" class="text-blue-600 font-medium hover:text-blue-800 transition">
                Read More <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        {{-- Popular Posts --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Popular {{ $category?->name ? "in {$category->name}" : '' }}</h3>
            <div class="space-y-4">
                @foreach($popular as $p)
                <div class="flex items-start">
                    <img class="w-16 h-16 object-cover rounded-md mr-3" src="https://placehold.co/160x160/png" alt="{{ $p->title }}">
                    <div>
                        <h4 class="font-medium text-gray-800 line-clamp-1">{{ $p->title }}</h4>
                        <p class="text-sm text-gray-500">
                            {{ $p->created_at->format('M d, Y') }} • {{ $p->category?->name }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Subcategories --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Subcategories</h3>
            <div class="space-y-2">
                @foreach($categories as $cat)
                    <a href="{{ route('blog.index', array_filter(['category'=>$cat->slug,'q'=>$q,'sort'=>$sort])) }}"
                       class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">{{ $cat->name }}</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">{{ $cat->posts_count }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Newsletter Widget --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Web Dev Newsletter</h3>
            <p class="text-gray-600 mb-4">Get the latest articles, tutorials, and news in your inbox.</p>
            <form class="space-y-4" method="POST" action="#">
                @csrf
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your email address" type="email"/>
                <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition" type="submit">
                    Subscribe
                </button>
            </form>
        </div>

        {{-- Tags Widget (placeholder) --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Popular Tags</h3>
            <div class="flex flex-wrap gap-2">
                {{-- Replace with real tags when you have a tags table --}}
                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">#javascript</span>
                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">#react</span>
                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">#vue</span>
                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">#css</span>
            </div>
        </div>
    </aside>
</div>
@endsection
