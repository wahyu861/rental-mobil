<?php

namespace App\Http\Controllers\Shared;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dari database
        $categories = Category::latest()->take(6)->get();

        // Kembalikan response dalam format JSON
        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }

    public function showByCategory($slug)
    {
        // Mencari kategori berdasarkan slug
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            // Jika kategori tidak ditemukan, kirimkan response 404
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        // Mengambil mobil berdasarkan kategori dengan relasi category, reviews, dan galleries
        $cars = Car::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->with([
                'category',
                'reviews' => function ($query) {
                    $query->select('car_id', DB::raw('avg(rating) as average_rating'))
                        ->groupBy('car_id');
                },
                'galleries' // Memuat relasi galleries
            ])
            ->paginate(6); // Mengambil 6 mobil per halaman

        // Menambahkan rata-rata rating ke setiap mobil
        foreach ($cars as $car) {
            $car->average_rating = $car->reviews->isNotEmpty() ? $car->reviews[0]->average_rating : null;
        }

        // Mengembalikan response dengan data kategori dan mobil
        return response()->json([
            'success' => true,
            'category' => $category,
            'cars' => $cars
        ], 200);
    }
    public function allcategories()
    {
        $categories = Category::all(); // Ambil hanya 4 kategori
        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }
}
