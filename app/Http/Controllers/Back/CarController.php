<?php

namespace App\Http\Controllers\Back;

use App\Models\Car;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('back.car.index', compact('cars'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('back.car.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'location' => 'required|string|max:255',
            'extra_services' => 'nullable|array',
            'specifications' => 'nullable|array',
            'car_features' => 'nullable|array',
        ]);

        // Menyimpan data mobil
        Car::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'extra_services' => json_encode($request->extra_services),
            'specifications' => json_encode($request->specifications),
            'car_features' => json_encode($request->car_features),
        ]);

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    public function edit(Car $car)
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Tampilkan view edit mobil dengan data mobil dan kategori
        return view('back.car.edit', compact('car', 'categories'));
    }
    public function addImages($carId)
    {
        $car = Car::with('galleries')->findOrFail($carId);
        return view('back.car.addimages', compact('car'));
    }


    public function update(Request $request, Car $car)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'extra_services' => 'nullable|array',
            'specifications' => 'nullable|array',
            'category_id' => 'required|numeric',
            'car_features' => 'nullable|array',
        ]);

        // Memperbarui data mobil
        $car->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'extra_services' => json_encode($request->extra_services),
            'specifications' => json_encode($request->specifications), // Simpan dalam bentuk JSON
            'car_features' => json_encode($request->car_features), // Simpan dalam bentuk JSON
        ]);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.'); // Redirect setelah berhasil
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'file' => 'required|image|mimes:jpeg,jpg,png,webp|max:12288' // validasi gambar
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads/gallery', 'public');

            // Simpan path gambar dan car_id di model Gallery
            $image = Gallery::create([
                'image' => $filePath,
                'car_id' => $request->car_id
            ]);

            return response()->json([
                'success' => 'Image Uploaded Successfully',
                'id' => $image->id
            ]);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function removeImage(Request $request)
    {
        $imageId = $request->input('imageId');
        $gallery = Gallery::find($imageId);

        if ($gallery) {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();

            return redirect()->back()->with('success', 'Image removed successfully.');
        }
        return redirect()->back()->with('error', 'Image not found');
    }
}
