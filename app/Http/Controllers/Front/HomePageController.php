<?php

namespace App\Http\Controllers\Front;

use App\Models\Car;
use App\Models\Hero;
use App\Models\Review;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $hero = Hero::orderBy('created_at', 'desc')->first();
        $feature = Feature::all();
        $carsTop = Car::with('galleries')->get()->map(function ($car) {
            // Menghitung rata-rata rating
            $car->average_rating = Review::where('car_id', $car->id)->avg('rating');
            return $car;
        })
            ->sortByDesc('average_rating') // Mengurutkan berdasarkan average_rating secara descending
            ->take(4);
        return view('front.home.index', compact('hero', 'feature'));
    }
}
