@extends('layouts.master')
@section('title','Categories')
@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Category List</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Create Category</a>
</div>

<table class="min-w-full bg-white shadow rounded">
    <thead class="bg-gray-50">
    <tr>
        <th class="text-left p-3">Name</th>
        <th class="text-left p-3">Slug</th>
        <th class="text-left p-3">Parent</th>
        <th class="text-left p-3">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $cat)
        <tr class="border-t">
            <td class="p-3 font-medium">{{ $cat->name }}</td>
            <td class="p-3 text-gray-600">{{ $cat->slug }}</td>
            <td class="p-3 text-gray-600">{{ $cat->parent?->name ?? '—' }}</td>
            <td class="p-3">
                <a href="{{ route('categories.edit',$cat) }}" class="text-indigo-600 mr-3">Edit</a>
                <form action="{{ route('categories.destroy',$cat) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-4">{{ $categories->links() }}</div>
@endsection