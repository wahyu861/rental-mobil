<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnValue;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('back.category.index', compact('categories'));
    }

    public function create()
    {
        return view('back.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if ($request->hasFile('image_logo')) {
            $category->image_logo = $request->file('image_logo')->store('images/categories', 'public');
        }

        if ($request->hasFile('image_cover')) {
            $$category->image_cover = $request->file('image_cover')->store('images/categories', 'public');
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('back.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('back.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if ($request->hasFile('image_logo')) {
            if ($category->image_logo) {
                Storage::disk('public')->delete($category->image_logo);
            }
            $category->image_logo = $request->file('image_logo')->store('images/categories', 'public');
        }

        if ($request->hasFile('image_cover')) {
            if ($category->image_cover) {
                Storage::disk('public')->delete($category->image_cover);
            }
            $category->image_cover = $request->file('image_cover')->store('images/categories', 'public');
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->image_logo) {
            Storage::disk('public')->delete($category->image_logo);
        }

        if ($category->image_cover) {
            Storage::disk('public')->delete($category->image_cover);
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
