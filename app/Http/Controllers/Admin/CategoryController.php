<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'meta_description' => $request->meta_description
        ]);

        flash('Category created successfully')->success();
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'meta_description' => $request->meta_description
        ]);

        flash('Category updated successfully')->success();
        return redirect()->route('admin.category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        flash('Category deleted successfully')->success();

        return redirect()->route('admin.category.index');
    }
}
