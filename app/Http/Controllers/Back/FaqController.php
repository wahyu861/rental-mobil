<?php

namespace App\Http\Controllers\Back;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('back.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('back.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return redirect()->route('back.faqs.index')->with('success', 'FAQ created successfully!');
    }

    // Menampilkan Halaman Edit
    public function edit(Faq $faq)
    {
        return view('back.faqs.edit', compact('faq'));
    }

    // Memperbarui Data FAQ
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return redirect()->route('back.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    // Menghapus FAQ
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('back.faqs.index')->with('success', 'Faq deleted successfully.');
    }
}
