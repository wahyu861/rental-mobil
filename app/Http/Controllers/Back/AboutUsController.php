<?php

namespace App\Http\Controllers\Back;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = About::all();

        return view('back.about_us.index', compact('abouts'));
    }

    public function create()
    {
        return view('back.about_us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about_images', 'public');
            $about->image = $imagePath;
        }

        $about->save();

        return redirect()->route('about_us.index')->with('success', 'About created successfully.');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('back.about_us.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = About::findOrFail($id);
        $about->title = $request->title;
        $about->description = $request->description;

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $imagePath = $request->file('image')->store('about_images', 'public');
            $about->image = $imagePath;
        }

        $about->save();

        return redirect()->route('about_us.index')->with('success', 'About updated successfully.');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();
        return redirect()->route('about_us.index')->with('success', 'About deleted successfully');
    }
}
