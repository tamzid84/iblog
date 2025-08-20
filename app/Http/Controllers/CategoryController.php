<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::orderBy('name')->get();
        return view('admin.categories.create', compact('parents'));
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success','Category created.');
    }

    public function edit(Category $category)
    {
        $parents = Category::where('id','!=',$category->id)->orderBy('name')->get();
        return view('admin.categories.edit', compact('category','parents'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success','Category updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Category deleted.');
    }
}