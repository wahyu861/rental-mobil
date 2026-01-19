<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Mengambil pengaturan pertama dari database (header_logo, footer_logo, copyright_text, footer_description)
        $settings = Setting::first();

        // Membagikan data ini ke seluruh tampilan yang menggunakan layout
        View::share('settings', $settings);
    }
}
