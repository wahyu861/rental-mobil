<?php

namespace App\Http\Controllers\Back;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnValue;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('back.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('back.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'copyright_text' => 'nullable|string|max:255',
            'footer_description' => 'nullable|string'
        ]);

        // Upload header logo jika ada
        $headerLogoPath = null;
        if ($request->hashFile('header_logo')) {
            $headerLogoPath = $request->file('header_logo')->store('settings', 'public');
        }

        // Upload footer logo jika ada
        $footerLogoPath = null;
        if ($request->hashFile('footer_logo')) {
            $headerLogoPath = $request->file('footer_logo')->store('settings', 'public');
        }

        // Simpan data
        Setting::create([
            'header_logo' => $headerLogoPath,
            'footer_logo' => $footerLogoPath,
            'copyright_text' => $request->input('copyright_text'),
            'footer_description' => $request->input('footer_description'),
        ]);

        return redirect()->route('settings.index')->with('success', 'Settings created successfully.');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFile($id);
        return view('back.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'header_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'copyright_text' => 'nullable|string|max:255',
            'footer_description' => 'nullable|string',
        ]);

        $setting = Setting::findOrFail($id);

        // Upload Header Logo jika ada
        if ($request->hasFile('header_logo')) {
            if ($setting->header_logo) {
                Storage::disk('public')->delete($setting->header_logo);
            }
            $setting->header_logo = $request->file('header_logo')->store('settings', 'public');
        }

        // Upload Footer Logo jika ada
        if ($request->hasFile('footer_logo')) {
            if ($setting->footer_logo) {
                Storage::disk('public')->delete($setting->footer_logo);
            }
            $setting->footer_logo = $request->file('footer_logo')->store('settings', 'public');
        }

        // Update data lainnya
        $setting->update([
            'copyright_text' => $request->input('copyright_text'),
            'footer_description' => $request->input('footer_description'),
        ]);

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }

    /**
     * Menghapus data Settings.
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);

        // Hapus gambar jika ada
        if ($setting->header_logo) {
            Storage::disk('public')->delete($setting->header_logo);
        }
        if ($setting->footer_logo) {
            Storage::disk('public')->delete($setting->footer_logo);
        }

        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Settings deleted successfully.');
    }
}
