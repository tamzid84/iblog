@extends('layouts.app')

@section('title', $post->title . ' | Single Blog')

@section('content')
@php
    $readMinutes = max(1, ceil(str_word_count(strip_tags($post->content)) / 200));
    $category    = $post->category;
@endphp

<div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
    {{-- Article Content --}}
    <main class="lg:w-2/3">
        <article class="bg-white rounded-lg shadow-md overflow-hidden">
            {{-- Featured Image --}}
            <img
                src="{{ $post->cover_image_url ?? 'https://placehold.co/920x610/png' }}"
                alt="{{ $post->title }}"
                class="w-full h-64 md:h-96 object-cover"
            />

            {{-- Article Header --}}
            <div class="p-6 md:p-8">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">
                        {{ $category?->name ?? 'Uncategorized' }}
                    </span>
                    <span class="mx-2">•</span>
                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $readMinutes }} min read</span>
                    @isset($post->views)
                        <span class="mx-2">•</span>
                        <span><i class="fas fa-eye mr-1"></i> {{ number_format($post->views) }} views</span>
                    @endisset
                </div>

                <h1 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">
                    {{ $post->title }}
                </h1>

                {{-- Author (optional) --}}
                @if($post->author_name ?? false)
                <div class="flex items-center mb-8">
                    <img src="{{ $post->author_avatar_url ?? 'https://randomuser.me/api/portraits/men/32.jpg' }}"
                         alt="{{ $post->author_name }}"
                         class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-medium text-gray-800">{{ $post->author_name }}</p>
                        @if($post->author_title ?? false)
                            <p class="text-sm text-gray-500">{{ $post->author_title }}</p>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            {{-- Article Content --}}
            <div class="px-6 md:px-8 pb-8 prose max-w-none">
                {!! nl2br(e($post->content)) !!}
            </div>

            {{-- Article Footer (Tags, reactions, share) --}}
            <div class="px-6 md:px-8 py-6 border-t border-gray-200">
                {{-- Tags (placeholder unless you have real tags) --}}
                <div class="flex flex-wrap gap-2 mb-6">
                    @if(method_exists($post, 'tags'))
                        @foreach($post->tags as $tag)
                            <a href="{{ route('blog.index', ['q' => $tag->name]) }}"
                               class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    @else
                        <a class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition" href="#">
                            #{{ \Illuminate\Support\Str::slug($category?->name ?? 'blog') }}
                        </a>
                    @endif
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">
                        {{-- placeholders; wire to real like logic later --}}
                        <button class="text-gray-500 hover:text-blue-600 transition" type="button">
                            <i class="far fa-thumbs-up text-xl"></i>
                            <span class="ml-1">{{ $post->likes ?? 0 }}</span>
                        </button>
                        {{-- static comments link/count --}}
                        <a href="#comments" class="text-gray-500 hover:text-blue-600 transition">
                            <i class="far fa-comment text-xl"></i>
                            <span class="ml-1">3</span>
                        </a>
                    </div>
                    <div class="flex space-x-3">
                        <a class="text-gray-500 hover:text-blue-600 transition" target="_blank" rel="noopener"
                           href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a class="text-gray-500 hover:text-blue-600 transition" target="_blank" rel="noopener"
                           href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a class="text-gray-500 hover:text-blue-600 transition" target="_blank" rel="noopener"
                           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        {{-- Author Bio (optional) --}}
        @if($post->author_bio ?? false)
        <div class="bg-white rounded-lg shadow-md p-6 mt-8">
            <div class="flex items-start">
                <img alt="Author" class="w-16 h-16 rounded-full mr-4"
                     src="{{ $post->author_avatar_url ?? 'https://randomuser.me/api/portraits/men/32.jpg' }}"/>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">About {{ $post->author_name }}</h3>
                    <p class="text-gray-600 mb-3">{{ $post->author_bio }}</p>
                </div>
            </div>
        </div>
        @endif

        {{-- Static Comments Section --}}
        <div id="comments" class="bg-white rounded-lg shadow-md p-6 mt-8">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Comments (3)</h3>

            {{-- Comment 1 --}}
            <div class="mb-6 pb-6 border-b border-gray-200">
                <div class="flex items-start mb-3">
                    <img alt="User" class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/women/44.jpg"/>
                    <div>
                        <p class="font-medium text-gray-800">Sarah Johnson</p>
                        <p class="text-sm text-gray-500">June 2, 2023</p>
                    </div>
                </div>
                <p class="text-gray-700 ml-13">
                    Great article! I've been experimenting with WebAssembly and it's truly impressive…
                </p>
                <button class="text-sm text-gray-500 hover:text-blue-600 mt-2 ml-13 transition">Reply</button>
            </div>

            {{-- Comment 2 --}}
            <div class="mb-6 pb-6 border-b border-gray-200">
                <div class="flex items-start mb-3">
                    <img alt="User" class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/men/22.jpg"/>
                    <div>
                        <p class="font-medium text-gray-800">Michael Chen</p>
                        <p class="text-sm text-gray-500">June 5, 2023</p>
                    </div>
                </div>
                <p class="text-gray-700 ml-13">
                    What are your thoughts on the learning curve for developers transitioning to serverless?
                </p>
                <button class="text-sm text-gray-500 hover:text-blue-600 mt-2 ml-13 transition">Reply</button>
            </div>

            {{-- Comment 3 --}}
            <div class="mb-6">
                <div class="flex items-start mb-3">
                    <img alt="User" class="w-10 h-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/women/63.jpg"/>
                    <div>
                        <p class="font-medium text-gray-800">Emma Rodriguez</p>
                        <p class="text-sm text-gray-500">June 8, 2023</p>
                    </div>
                </div>
                <p class="text-gray-700 ml-13">
                    Thanks for the overview! Would love a follow-up on AI-powered dev tools.
                </p>
                <button class="text-sm text-gray-500 hover:text-blue-600 mt-2 ml-13 transition">Reply</button>
            </div>

            {{-- Static form (no submit) --}}
            <div class="mt-8">
                <h4 class="text-lg font-semibold mb-4 text-gray-800">Leave a Comment</h4>
                <form class="space-y-4" onsubmit="return false;">
                    <div class="grid md:grid-cols-2 gap-4">
                        <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your Name" type="text"/>
                        <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your Email" type="email"/>
                    </div>
                    <textarea class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your Comment" rows="4"></textarea>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition" type="button">
                        Post Comment (disabled)
                    </button>
                </form>
            </div>
        </div>

        {{-- Related Articles --}}
        @if(($related ?? collect())->isNotEmpty())
        <div class="mt-12">
            <h3 class="text-2xl font-bold mb-6 text-gray-800">Related Articles</h3>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($related as $r)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <img class="w-full h-40 object-cover"
                         src="{{ $r->cover_image_url ?? 'https://placehold.co/920x610/png' }}"
                         alt="{{ $r->title }}">
                    <div class="p-4">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">
                                {{ $r->category?->name ?? 'Uncategorized' }}
                            </span>
                            <span class="mx-2">•</span>
                            <span>{{ $r->created_at->format('M d, Y') }}</span>
                        </div>
                        <h4 class="text-lg font-bold mb-2 text-gray-800 line-clamp-2">{{ $r->title }}</h4>
                        <a class="text-blue-600 font-medium hover:text-blue-800 transition"
                           href="{{ route('post.show', $r->slug) }}">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </main>

    {{-- Sidebar --}}
    <aside class="lg:w-1/3 space-y-8">
        {{-- About Widget --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">About The Blog</h3>
            <p class="text-gray-600 mb-4">
                IBlog brings you the latest news, tutorials, and thought pieces on technology, programming, AI, and more.
            </p>
            <a class="text-blue-600 font-medium hover:text-blue-800 transition" href="{{ route('blog.index') }}">
                Read More <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        {{-- Popular Posts (top 3 latest as placeholder) --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Popular Posts</h3>
            <div class="space-y-4">
                @foreach(($popular ?? collect()) as $p)
                <div class="flex items-start">
                    <img class="w-16 h-16 object-cover rounded-md mr-3"
                         src="{{ $p->cover_image_url ?? 'https://placehold.co/160x160/png' }}"
                         alt="{{ $p->title }}">
                    <div>
                        <h4 class="font-medium text-gray-800 line-clamp-1">{{ $p->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $p->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Categories Widget --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Categories</h3>
            <div class="space-y-2">
                @foreach(($categories ?? collect()) as $c)
                <a class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition"
                   href="{{ route('blog.index', ['category' => $c->slug]) }}">
                    <span class="text-gray-700">{{ $c->name }}</span>
                    <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">{{ $c->posts_count }}</span>
                </a>
                @endforeach
            </div>
        </div>

        {{-- Newsletter Widget --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Newsletter</h3>
            <p class="text-gray-600 mb-4">Subscribe to get the latest posts delivered to your inbox.</p>
            <form class="space-y-4" onsubmit="return false;">
                <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Your email address" type="email"/>
                <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition" type="button">
                    Subscribe (disabled)
                </button>
            </form>
        </div>

        {{-- Tags Widget (static placeholder) --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4 text-gray-800">Popular Tags</h3>
            <div class="flex flex-wrap gap-2">
                <a class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition" href="#">#javascript</a>
                <a class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition" href="#">#react</a>
                <a class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition" href="#">#webdev</a>
                <a class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition" href="#">#ai</a>
            </div>
        </div>
    </aside>
</div>
@endsection
