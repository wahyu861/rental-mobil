<?php

namespace App\Http\Controllers\Shared;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function Laravel\Prompts\error;

class RentalController extends Controller
{
    public function index()
    {
        $cars = Car::with('galleries')->latest()->paginate(6);
        return response()->json([
            'success' => true,
            'data' => $cars
        ]);
    }

    public function detail($slug)
    {
        $car = Car::with(['galleries', 'category', 'reviews.user'])->where('slug', $slug)->first();

        if (!$car) {
            return response()->json([
                'success' => false,
                'message' => 'Car not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $car,
        ]);
    }
}
