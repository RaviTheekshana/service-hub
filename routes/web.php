<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceProviderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Chat
use App\Http\Controllers\ChatController;
Route::resource('/chat', ChatController::class);
Route::get('/chat/{chat}/messages', [ChatController::class, 'messages']);

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

//Review
use App\Http\Controllers\ReviewController;
Route::post('review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/review/{id}', [ReviewController::class, 'showReview'])->name('bookings.review');
Route::get('/review-page', [ReviewController::class, 'show'])->name('review-page');

//Booking
use App\Http\Controllers\BookingController;
Route::get('bookings/our-service', [BookingController::class, 'ourService'])->name('bookings.our-service');
Route::get('bookings/book', [BookingController::class, 'bookForm'])->name('bookings.book');
Route::post('/booking/book', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/success', [BookingController::class, 'success'])->name('bookings.success');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::get('/bookings/portfolio', [ServiceProviderController::class, 'showProfile'])->name('portfolio');

//Provider-Dashboard
Route::get('/provider-dashboard', [DashboardController::class, 'providerDashboard'])->middleware('auth')->name('provider-dashboard');
Route::get('/provider-booking', [DashboardController::class, 'bookingView'])->name('provider-booking');
Route::get('/provider-booking/{booking}', [DashboardController::class, 'update'])->name('provider-booking.update');
Route::get('/provider-review', [DashboardController::class, 'review'])->name('provider-review');

//Profile Management
use App\Http\Controllers\Profile_ManagementController;
Route::resource('profile_management', Profile_ManagementController::class);

//Job Post
use App\Http\Controllers\BlogPostController;
Route::post('/job', [BlogPostController::class, 'store'])->name('job.store');
Route::get('/job', [BlogPostController::class, 'index'])->name('job.index');
Route::get('/job/{id}', [BlogPostController::class, 'destroy'])->name('job.destroy');

//Other
Route::get('/api/users/{category_id}', [ServiceProviderController::class, 'getUsersByCategory'])->name('get-service-providers');
Route::get('/test', function () {
    return view('test');
});
use App\Http\Controllers\ProfilePhotoController;

Route::post('/profile/photo', [ProfilePhotoController::class, 'update'])->name('profile.photo.update');
