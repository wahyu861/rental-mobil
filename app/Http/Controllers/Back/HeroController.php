<?php

namespace App\Http\Controllers\Back;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('back.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('back.hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $hero = new Hero();
        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;

        if ($request->hasFile('image')) {
            $hero->image = $request->file('image')->store('heroes', 'public');
        }

        if ($request->hasFile('background_image')) {
            $hero->background_image = $request->file('background_image')->store('heroes', 'public');
        }

        $hero->save();

        return redirect()->route('hero.index')->with('success', 'Hero section created successfully.');
    }

    public function edit(Hero $hero)
    {
        return view('back.hero.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;

        if ($request->hasFile('image')) {
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }
            $hero->image = $request->file('image')->store('heroes', 'public');
        }

        if ($request->hasFile('background_image')) {
            if ($hero->background_image && Storage::disk('public')->exists($hero->background_image)) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $hero->background_image = $request->file('background_image')->store('heroes', 'public');
        }

        $hero->save();

        return redirect()->route('hero.index')->with('success', 'Hero section updated successfully.');
    }

    public function destroy(Hero $hero)
    {
        $hero->delete();
        return redirect()->route('hero.index')->with('success', 'Hero section deleted successfully.');
    }
}
