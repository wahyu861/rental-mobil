<?php

namespace App\Http\Controllers\Back;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('back.feature.index', compact('features'));
    }

    public function create()
    {
        return view('back.feature.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Feature::create($request->all());

        return redirect()->route('features.index')->with('success', 'Feature created successfully.');
    }

    public function edit(Feature $feature)
    {
        return view('back.feature.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $feature->update($request->all());

        return redirect()->route('features.index')->with('success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('features.index')->with('success', 'Feature deleted successfully.');
    }
}
