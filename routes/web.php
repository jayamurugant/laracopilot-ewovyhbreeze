<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\EndUserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\BookingController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Listing Routes
Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/{id}', [ListingController::class, 'show'])->name('listings.show');

// Booking Routes
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/success', [BookingController::class, 'success'])->name('bookings.success');

// SuperAdmin Routes
Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
Route::get('/superadmin/users', [SuperAdminController::class, 'users'])->name('superadmin.users');
Route::get('/superadmin/listings', [SuperAdminController::class, 'listings'])->name('superadmin.listings');
Route::get('/superadmin/payments', [SuperAdminController::class, 'payments'])->name('superadmin.payments');
Route::get('/superadmin/analytics', [SuperAdminController::class, 'analytics'])->name('superadmin.analytics');
Route::get('/superadmin/settings', [SuperAdminController::class, 'settings'])->name('superadmin.settings');

// Creator Routes
Route::get('/creator/dashboard', [CreatorController::class, 'dashboard'])->name('creator.dashboard');
Route::get('/creator/listings', [CreatorController::class, 'listings'])->name('creator.listings');
Route::get('/creator/create-listing', [CreatorController::class, 'createListing'])->name('creator.create-listing');
Route::post('/creator/store-listing', [CreatorController::class, 'storeListing'])->name('creator.store-listing');
Route::get('/creator/bookings', [CreatorController::class, 'bookings'])->name('creator.bookings');
Route::get('/creator/earnings', [CreatorController::class, 'earnings'])->name('creator.earnings');

// EndUser Routes
Route::get('/enduser/dashboard', [EndUserController::class, 'dashboard'])->name('enduser.dashboard');
Route::get('/enduser/bookings', [EndUserController::class, 'bookings'])->name('enduser.bookings');
Route::get('/enduser/favorites', [EndUserController::class, 'favorites'])->name('enduser.favorites');
Route::get('/enduser/profile', [EndUserController::class, 'profile'])->name('enduser.profile');

// Error Pages
Route::fallback(function () {
    return view('errors.404');
});