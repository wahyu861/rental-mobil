<?php

use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
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
use App\Http\Controllers\Back\SettingController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Back\BackBlogController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Back\AboutSectionController;

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/rental', [RentalController::class, 'index'])->name('rental');
Route::get('/detail', [RentalController::class, 'detail'])->name('detail');
Route::get('/booking', [RentalController::class, 'booking'])->name('booking');
Route::resource('blogs', BlogController::class);
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/savereport', [ContactController::class, 'store'])->name('report.store');
Route::get('cars/{slug}', [RentalController::class, 'detail'])->name('vehicle.details');
Route::get('/cars/category/{slug}', [RentalController::class, 'showByCategory'])->name('cars.byCategory');
Route::post('/car-request', [RentalController::class, 'store'])->name('car.request.store');
Route::get('/car-price/{id}', [HomepageController::class, 'getCarPrice']);
Route::post('/create-booking', [BookingController::class, 'createBooking']);
Route::post('/reviews/store', [BookingController::class, 'storeReview'])->name('reviews.store');


Route::middleware(['auth', 'verified'])->prefix('/dashboard')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::get('/requests', [BookingController::class, 'CarRequest'])->name('requests');
    Route::get('/requests/{id}', [BookingController::class, 'show'])->name('requests.show');
    Route::get('/bookings/{id}', [BookingController::class, 'detail'])->name('bookings.detail');
    Route::get('/edit_profile', [UserController::class, 'editUser'])->name('edit.profile');
    Route::put('/update_profile/{user}', [UserController::class, 'updateUser'])->name('update.profile');
    Route::resource('/cars', CarController::class);
    Route::resource('/settings', SettingController::class);
    Route::resource('/category', CategoryController::class);
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
    Route::resource('/features', FeatureController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/contacts', ContactController::class);
    Route::resource('/reviews', ReviewController::class);
    Route::get('/notifications', [NotificationController::class, 'getNotifications']);
    Route::post('/notifications/clear', [NotificationController::class, 'clearAllNotifications']);
});

require __DIR__ . '/auth.php';
