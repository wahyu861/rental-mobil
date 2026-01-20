<?php

namespace App\Http\Controllers\Front;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feature;

class HomePageController extends Controller
{
    public function index()
    {
        $hero = Hero::orderBy('created_at', 'desc')->first();
        $feature = Feature::all();
        return view('front.home.index', compact('hero', 'feature'));
    }
}
