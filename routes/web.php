<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\Front\ContactController;

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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
