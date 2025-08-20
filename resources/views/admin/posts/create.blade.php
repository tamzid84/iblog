@extends('layouts.master')
@section('title','Create Post')
@section('content')
<h1 class="text-xl font-bold mb-4">Create New Post</h1>
<form method="POST" action="{{ route('posts.store') }}" class="space-y-4 max-w-2xl">
    @csrf
    <x-form.input name="title" label="Title *"/>
    <x-form.input name="slug" label="Slug *"/>
    <x-form.select name="category_id" label="Category *" :options="$categories->pluck('name','id')" />
    <x-form.textarea name="content" label="Content *"/>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection