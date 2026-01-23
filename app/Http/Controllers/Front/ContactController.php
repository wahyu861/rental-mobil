<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string',
            'username' => 'required|string',
            'description' => 'nullable|string'
        ]);

        Contact::create([
            'topic' => $request->input('topic'),
            'username' => $request->input('username'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('contact')->with('success', 'Contact Created Successfully!');
    }
}
