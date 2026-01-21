<?php

namespace App\Http\Controllers\Front;

use App\Models\Car;
use App\Models\Blog;
use App\Models\Hero;
use App\Models\Review;
use App\Models\Feature;
use App\Models\Category;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $hero = Hero::orderBy('created_at', 'desc')->first();
        $features = Feature::all();
        $carsTop = Car::with('galleries')
            ->get()
            ->map(function ($car) {
                // Menghitung rata-rata rating
                $car->average_rating = Review::where('car_id', $car->id)->avg('rating');
                return $car;
            })
            ->sortByDesc('average_rating') // Mengurutkan berdasarkan average_rating secara descending
            ->take(4);
        $aboutSection = AboutSection::first();
        if ($aboutSection) {
            $aboutSection->sections = json_decode($aboutSection->sections, true); // Mengubah JSON string menjadi array
        }
        $cars = Car::with('galleries')->get();
        foreach ($cars as $car) {
            $car->average_rating = Review::where('car_id', $car->id)
                ->avg('rating');
        }
        $categories = Category::all();
        $reviews = Review::all();
        $latestBlogs = Blog::orderBy('created_at', 'desc')->take(4)->get();
        $carlists = Car::all();
        return view('front.home.index', compact('hero', 'features', 'carsTop', 'aboutSection', 'cars', 'categories'));
    }

    public function getCarPrice($id)
    {
        // Cari mobil berdasarkan ID
        $car = Car::find($id);

        // Kembalikan response JSON dengan informasi harga
        return response()->json(['price' => $car->price]);
    }
}
