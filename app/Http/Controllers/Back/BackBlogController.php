<?php

namespace App\Http\Controllers\Back;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BackBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('back.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'image_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'myTextarea' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Upload image
        $imagePath = $request->file('image_cover')->store('images/blogs', 'public');
        $content = $request->input('myTextarea');
        $absolutePath = asset('storage/images/blogs/');

        // Ganti semua path relatif dengan path absolut, tambahkan slash jika perlu
        $content = str_replace('../../storage/images/blogs/', $absolutePath . '/', $content);

        // Buat instance Blog dan simpan data
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->slug = Str::slug($request->title, '-'); // Menggunakan Str::slug untuk slug
        $blog->image_cover = $imagePath;
        $blog->content = $content;
        $blog->category_id = $request->input('category_id');
        $blog->author = Auth::user()->name;

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('back.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar bisa kosong
            'myTextarea' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Jika ada gambar baru yang diunggah, upload dan simpan path-nya
        if ($request->hasFile('image_cover')) {
            // Hapus gambar lama jika ada
            if ($blog->image_cover) {
                Storage::disk('public')->delete($blog->image_cover);
            }

            // Upload gambar baru
            $imagePath = $request->file('image_cover')->store('images/blogs', 'public');
            $blog->image_cover = $imagePath;
        }

        // Ambil konten dari textarea
        $content = $request->input('myTextarea');
        $absolutePath = asset('storage/images/blogs/');

        // Ganti semua path relatif dengan path absolut
        $content = preg_replace('/src="?(\/?(\.\.\/)+)?storage\/images\/blogs\//', 'src="' . $absolutePath . '/', $content);

        // Update atribut blog
        $blog->title = $request->input('title');
        $blog->slug = Str::slug($request->title, '-'); // Menggunakan Str::slug untuk slug
        $blog->content = $content; // Gunakan $content yang sudah diubah
        $blog->category_id = $request->input('category_id');
        $blog->author = Auth::user()->name;
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image_cover) {
            Storage::disk('public')->delete($blog->image_cover);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
    public function image_upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|file|max:2048',
            'alt' => 'nullable|string',
        ]);
        $validExtensions = ['jpeg', 'png', 'jpg'];
        $fileExtension = $request->file->getClientOriginalExtension();

        if (!in_array($fileExtension, $validExtensions)) {
            return response()->json(['errorMessage' => 'Invalid file extension. Allowed extensions: jpeg, png, jpg'], 400);
        }

        $imageName = time() . '.' . $fileExtension;

        $path = $request->file('file')->storeAs('images/blogs', $imageName, 'public');

        $imagePath = storage_path("app/public/$path");
        list($width, $height) = getimagesize($imagePath);
        $imageUrl = Storage::url($path);
        $altText = $request->input('alt', 'Image Alt Text');

        return response()->json([
            'location' => $imageUrl,
            'alt' => $altText,
            'dimensions' => ['width' => $width, 'height' => $height],
            'fileinput' => [],
        ]);
    }
    public function deleteImage(Request $request)
    {
        $imagePath = $request->input('image_path');
        $fullPath = public_path('storage/' . $imagePath);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
            return response()->json(['message' => 'Image deleted successfully.']);
        }

        return response()->json(['error' => 'Image not found.'], 404);
    }
}
