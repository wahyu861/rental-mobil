<?php

namespace App\Http\Controllers\Front;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $categories = Category::all();
        return view('front.about.index', compact('about', 'categories'));
    }
}
