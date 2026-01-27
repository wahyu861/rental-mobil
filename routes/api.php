<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shared\AuthController;
use App\Http\Controllers\Shared\BlogController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\Shared\BookingController;
use App\Http\Controllers\Shared\CategoryController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::get('/rental', [RentalController::class, 'index']);
    Route::get('/rental/{slug}', [RentalController::class, 'detail']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/allcategories', [CategoryController::class, 'allcategories']);
    Route::get('/categories/{slug}', [CategoryController::class, 'showByCategory']);
    Route::post('/create-booking', [BookingController::class, 'createBooking']);
    Route::get('/booking', [BookingController::class, 'index']);
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blog/random', [BlogController::class, 'randomBlog']);
    Route::get('/blog/{slug}', [BlogController::class, 'show']);
    Route::get('/blogs/{slug}', [BlogController::class, 'showByCategory']);
    Route::patch('/updateuser/{user}', [AuthController::class, 'updateUser']);
});

Route::middleware('web')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
});
