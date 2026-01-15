<?php

namespace App\Http\Controllers\Back;

use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function index()
    {
        $aboutSection = AboutSection::first();

        // Decode JSON sections menjadi array
        if ($aboutSection) {
            $aboutSection->sections = json_decode($aboutSection->sections, true); // Mengubah JSON string menjadi array
        }

        return view('back.aboutsection.index', compact('aboutSection'));
    }

    // Menampilkan form untuk membuat About Section baru
    public function create()
    {
        return view('back.aboutsection.create');
    }

    // Menyimpan About Section baru
    public function store(Request $request)
    {
        $request->validate([
            'main_title' => 'required|string|max:255',
            'main_description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sections' => 'required|array',
            'sections.*.title' => 'required|string',
            'sections.*.description' => 'required|string',
        ]);

        // Menyimpan gambar
        $imagePath = $request->file('main_image')->store('about_images', 'public');

        // Membuat About Section
        AboutSection::create([
            'main_title' => $request->main_title,
            'main_description' => $request->main_description,
            'main_image' => $imagePath,
            'sections' => json_encode($request->sections), // Mengubah array menjadi JSON
        ]);

        return redirect()->route('abouts.index')->with('success', 'About Section created successfully.');
    }

    // Menampilkan form untuk mengedit About Section
    public function edit($id)
    {
        $aboutSection = AboutSection::findOrFail($id);

        // Decode JSON sections into an array if it's a JSON string
        if (is_string($aboutSection->sections)) {
            $aboutSection->sections = json_decode($aboutSection->sections, true);
        }

        return view('back.aboutsection.edit', compact('aboutSection'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required|string|max:255',
            'main_description' => 'required|string',
            'main_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sections' => 'required|array',
            'sections.*.title' => 'required|string',
            'sections.*.description' => 'required|string',
        ]);

        $aboutSection = AboutSection::findOrFail($id);

        // Cek jika gambar baru diupload
        if ($request->hasFile('main_image')) {
            // Hapus gambar lama jika ada
            if ($aboutSection->main_image) {
                Storage::disk('public')->delete($aboutSection->main_image);
            }

            // Menyimpan gambar baru
            $imagePath = $request->file('main_image')->store('about_images', 'public');
            $aboutSection->main_image = $imagePath;
        }

        // Memperbarui data
        $aboutSection->main_title = $request->main_title;
        $aboutSection->main_description = $request->main_description;
        $aboutSection->sections = json_encode($request->sections); // Mengubah array menjadi JSON
        $aboutSection->save();

        return redirect()->route('abouts.index')->with('success', 'About Section updated successfully.');
    }

    public function destroy($id)
    {
        $aboutSection = AboutSection::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($aboutSection->main_image) {
            Storage::disk('public')->delete($aboutSection->main_image);
        }

        $aboutSection->delete();

        return redirect()->route('abouts.index')->with('success', 'About Section deleted successfully.');
    }
}
