<?php

namespace App\Http\Controllers\Back;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookings = $user->hasRole('admin')
            ? Booking::all()
            : Booking::where('user_id', $user->id)->get();

        return view('back.booking.index', compact('bookings'));
    }

    public function detail($id)
    {
        $booking = Booking::with('payment')->findOrFail($id);
        return view('back.booking.detail', compact('booking'));
    }
}
