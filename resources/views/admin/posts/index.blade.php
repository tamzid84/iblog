@extends('layouts.master')
@section('title','Posts')
@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Posts</h1>
    <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Create Post</a>
</div>

<table class="min-w-full bg-white shadow rounded">
    <thead class="bg-gray-50">
    <tr>
        <th class="text-left p-3">Title</th>
        <th class="text-left p-3">Category</th>
        <th class="text-left p-3">Slug</th>
        <th class="text-left p-3">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr class="border-t">
            <td class="p-3 font-medium">{{ $post->title }}</td>
            <td class="p-3 text-gray-600">{{ $post->category?->name }}</td>
            <td class="p-3 text-gray-600">{{ $post->slug }}</td>
            <td class="p-3">
                <a href="{{ route('posts.edit',$post) }}" class="text-indigo-600 mr-3">Edit</a>
                <form action="{{ route('posts.destroy',$post) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-4">{{ $posts->links() }}</div>
@endsection