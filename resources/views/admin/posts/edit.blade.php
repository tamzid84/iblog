@extends('layouts.master')
@section('title','Edit Post')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Post</h1>

<form method="POST" action="{{ route('posts.update', $post) }}" class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')

    <x-form.input name="title" label="Title *" :value="$post->title"/>
    <x-form.input name="slug" label="Slug *" :value="$post->slug"/>
    <x-form.select name="category_id" label="Category *"
                   :options="$categories->pluck('name','id')"
                   :selected="$post->category_id"/>
    <x-form.textarea name="content" label="Content *" :value="$post->content"/>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection