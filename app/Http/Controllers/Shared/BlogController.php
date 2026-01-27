<?php

namespace App\Http\Controllers\Shared;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::with('categories')->paginate(9);

        return response()->json([
            'categories' => $categories,
            'blogs' => $blogs,
        ]);
    }

    public function randomBlog(Request $request)
    {
        $randomBlog = Blog::with('category')
            ->when($request->input('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->input('search') . '%');
            })
            ->inRandomOrder()
            ->first();

        return response()->json([
            'status' => 'success',
            'message' => 'Data blog acak berhasil diambil.',
            'data' => $randomBlog,
        ]);
    }

    public function show($slug)
    {

        $blog = Blog::where('slug', $slug)->firstOrFail();


        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->where('category_id', $blog->category_id)
            ->limit(4)
            ->get();


        return response()->json([
            'blogdata' => $blog,
            'relatedBlogs' => $relatedBlogs
        ]);
    }
    public function showByCategory($slug)
    {

        $category = Category::where('slug', $slug)->first();

        if (!$category) {

            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }


        $blogs = Blog::where('category_id', $category->id)
            ->with('category')
            ->paginate(9);


        return response()->json([
            'success' => true,
            'category' => $category,
            'blogs' => $blogs
        ], 200);
    }
}
