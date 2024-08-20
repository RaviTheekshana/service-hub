<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceProviderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/chat', ChatController::class);

Route::get('/chat/{chat}/messages', [ChatController::class, 'messages']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\BookingController;

//Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::get('bookings/our-service', [BookingController::class, 'ourService'])->name('bookings.our-service');
Route::get('bookings/review', [BookingController::class, 'showReview'])->name('bookings.review');
Route::get('bookings/book', [BookingController::class, 'bookForm'])->name('bookings.book');
Route::post('/booking/book', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/success', [BookingController::class, 'success'])->name('bookings.success');

Route::get('/bookings/portfolio', [ServiceProviderController::class, 'showProfile'])->name('portfolio');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/provider-dashboard', [DashboardController::class, 'providerDashboard'])->middleware('auth')->name('provider-dashboard');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

//Review
use App\Http\Controllers\ReviewController;

Route::post('review', [ReviewController::class, 'store'])->name('review.store');

Route::get('/api/users/{category_id}', [ServiceProviderController::class, 'getUsersByCategory'])->name('get-service-providers');

//Booking
Route::get('/provider-booking', function () {
    return view('Provider-Dashboard.provider-booking');
})->name('provider-booking');
//Route::get('provider-profile', function () {
//    return view('Provider-Dashboard.provider-profile');
//})->name('provider-profile');

use App\Http\Controllers\Profile_ManagementController;
Route::resource('profile_management', Profile_ManagementController::class);

//Portfolio
//Route::get('/portfolio', function () {
//    return view('Provider-Dashboard.portfolio');
//})->name('portfolio');

Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');


