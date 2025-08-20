@extends('layouts.master')
@section('title','Edit Category')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Category</h1>

<form method="POST" action="{{ route('categories.update', $category) }}" class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')

    <x-form.input name="name" label="Name *" :value="$category->name"/>
    <x-form.input name="slug" label="Slug *" :value="$category->slug"/>
    <x-form.select name="parent_id" label="Parent Category"
                   :options="$parents->pluck('name','id')"
                   :selected="$category->parent_id"/>
    <x-form.textarea name="description" label="Description" :value="$category->description"/>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection