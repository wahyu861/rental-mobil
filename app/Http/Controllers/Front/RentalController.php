<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
}
