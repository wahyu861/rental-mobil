<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CarRequest;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        return view('front.rental.index');
    }

    public function detail()
    {
        return view('front.rental.detail');
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
