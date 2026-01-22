<?php

namespace App\Http\Controllers\Front;

use App\Models\Car;
use App\Models\CarRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(6);
        return view('front.rental.index', compact('cars'));
    }

    public function detail($slug)
    {
        $car = Car::with(['galleries', 'reviews.user'])->where('slug', $slug)->firstOrFail();
        return view('front.rental.detail', compact('car'));
    }

    public function booking()
    {
        return view('front.rental.booking');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'car_id' => 'required|exists:cars,id',
            'province' => 'required|string',
            'regency' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
            'pickup_location' => 'required|string|max:255',
            'pickup_date' => 'required|date',
            'car_price' => 'required|numeric',
        ]);

        CarRequest::create($validateData);
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
