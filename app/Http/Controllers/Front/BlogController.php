<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $blogsByCategory = [];
        $currentCategoryId = $request->get('category_id', $categories->first()->id);

        $search = $request->input('search');
        foreach ($categories as $category) {
            $query = Blog::with('category')->where('category_id', $category->id);

            if ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            }

            $blogsByCategory[$category->id] = $query->paginate(9);
        }

        return view('front.blog.index', [
            'categories' => $categories,
            'blogsByCategory' => $blogsByCategory,
            'currentCategoryId' => $currentCategoryId,
            'search' => $search
        ]);
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $relatedBlogs = Blog::where('id', '!=', $blog->id)->where('category_id', $blog->category_id)->limit(3)->get();
        return view('front.blog.detail', compact('blog', 'relatedBlogs'));
    }

    public function detail()
    {
        return view('front.blog.detail');
    }
}
