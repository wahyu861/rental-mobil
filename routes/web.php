<?php

use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Back\CarController;
use App\Http\Controllers\Back\FaqController;
use App\Http\Controllers\Back\HeroController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Back\AboutUsController;
use App\Http\Controllers\Back\BookingController;
use App\Http\Controllers\Back\FeatureController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\Back\BackBlogController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\AboutSectionController;
use App\Http\Controllers\Back\SettingController;
use App\Http\Controllers\Front\HomePageController;

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/rental', [RentalController::class, 'index'])->name('rental');
Route::get('/detail', [RentalController::class, 'detail'])->name('detail');
Route::get('/booking', [RentalController::class, 'booking'])->name('booking');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blogdetail', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('car/{slug}', function ($slug) {
    return view('cars.detail', ['slug' => $slug]);
})->name('vehicle.details');

Route::get('/dashboard/cars/images', function () {
    return view('back.car.addimages');
});

Route::get('/dashboard/reviews', function () {
    return view('back.reviews.index');
});

Route::get('/dashboard/contacts', function () {
    return view('back.contacts.index');
});

Route::middleware(['auth', 'verified', 'role:user|admin'])
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
        Route::get('/bookings/{id}', [BookingController::class, 'detail'])->name('bookings.detail');
        Route::get('/requests', [BookingController::class, 'CarRequest'])->name('requests');
        Route::get('/requests/{id}', [BookingController::class, 'show'])->name('requests.show');
        Route::get('/edit_profile', [UserController::class, 'editUser'])->name('edit.profile');
        Route::put('/update_profile/{user}', [UserController::class, 'updateUser'])->name('update.profile');
        Route::resource('/category', CategoryController::class);
        Route::resource('cars', CarController::class);
        Route::post('/cars/upload-images', [CarController::class, 'uploadImages'])->name('cars.uploadImages');
        Route::post('/cars/remove-image', [CarController::class, 'removeImage'])->name('cars.removeImage');
        Route::get('/cars/add-images/{car}', [CarController::class, 'addImages'])->name('cars.addImages');
        Route::resource('/about_us', AboutUsController::class);
        Route::resource('/blogs', BackBlogController::class);
        Route::post('/image_upload', [BackBlogController::class, 'image_upload'])->name('image.upload');
        Route::post('/image_delete', [BackBlogController::class, 'deleteImage'])->name('image.delete');
        Route::resource('/hero', HeroController::class);
        Route::resource('/abouts', AboutSectionController::class);
        Route::resource('/faqs', FaqController::class);
        Route::resource('features', FeatureController::class);
        Route::resource('users', UserController::class);
        Route::resource('settings', SettingController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
