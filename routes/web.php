<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Back\DashboardController;

Route::get('/', function () {
    return view('front.home.index');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/rental', [RentalController::class, 'index'])->name('rental');
Route::get('/detail', [RentalController::class, 'detail'])->name('detail');
Route::get('/booking', [RentalController::class, 'booking'])->name('booking');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blogdetail', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/dashboard', function () {
    return view('back.dashboard.index');
});

Route::get('/dashboard/booking', function () {
    return view('back.booking.index');
});

Route::get('/dashboard/booking/detail', function () {
    return view('back.booking.detail');
});

Route::get('/dashboard/users', function () {
    return view('back.users.index');
});

Route::get('/dashboard/users/create', function () {
    return view('back.users.create');
});

Route::get('/dashboard/users/edit', function () {
    return view('back.users.edit');
});

Route::get('/dashboard/users/updateuser', function () {
    return view('back.users.edit-user');
});

Route::get('/dashboard/cars', function () {
    return view('back.car.index');
});

Route::get('/dashboard/cars/create', function () {
    return view('back.car.create');
});

Route::get('/dashboard/cars/edit', function () {
    return view('back.car.edit');
});

Route::get('/dashboard/cars/images', function () {
    return view('back.car.addimages');
});

Route::get('/dashboard/categories', function () {
    return view('back.category.index');
});

Route::get('/dashboard/categories/create', function () {
    return view('back.category.create');
});

Route::get('/dashboard/categories/edit', function () {
    return view('back.category.edit');
});

Route::get('/dashboard/about_us', function () {
    return view('back.about_us.index');
});

Route::get('/dashboard/about_us/create', function () {
    return view('back.about_us.create');
});

Route::get('/dashboard/about_us/edit', function () {
    return view('back.about_us.edit');
});

Route::get('/dashboard/blogs', function () {
    return view('back.blog.index');
});

Route::get('/dashboard/blogs/create', function () {
    return view('back.blog.create');
});

Route::get('/dashboard/blogs/edit', function () {
    return view('back.blog.edit');
});

Route::get('/dashboard/hero', function () {
    return view('back.hero.index');
});

Route::get('/dashboard/hero/create', function () {
    return view('back.hero.create');
});

Route::get('/dashboard/hero/edit', function () {
    return view('back.hero.edit');
});

Route::get('/dashboard/about_section', function () {
    return view('back.aboutsection.index');
});

Route::get('/dashboard/about_section/create', function () {
    return view('back.aboutsection.create');
});

Route::get('/dashboard/about_section/edit', function () {
    return view('back.aboutsection.edit');
});

Route::get('/dashboard/faqs', function () {
    return view('back.faqs.index');
});

Route::get('/dashboard/faqs/create', function () {
    return view('back.faqs.create');
});

Route::get('/dashboard/faqs/edit', function () {
    return view('back.faqs.edit');
});

Route::get('/dashboard/feature', function () {
    return view('back.feature.index');
});

Route::get('/dashboard/feature/create', function () {
    return view('back.feature.create');
});

Route::get('/dashboard/feature/edit', function () {
    return view('back.feature.edit');
});

Route::get('/dashboard/reviews', function () {
    return view('back.reviews.index');
});

Route::get('/dashboard/contacts', function () {
    return view('back.contacts.index');
});



Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
