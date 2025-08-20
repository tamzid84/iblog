@extends('layouts.master')
@section('title','Create Category')
@section('content')
<h1 class="text-xl font-bold mb-4">Create New Category</h1>
<form method="POST" action="{{ route('categories.store') }}" class="space-y-4 max-w-2xl">
    @csrf
    <x-form.input name="name" label="Name *"/>
    <x-form.input name="slug" label="Slug *"/>
    <x-form.select name="parent_id" label="Parent Category" :options="$parents->pluck('name','id')" />
    <x-form.textarea name="description" label="Description"/>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection