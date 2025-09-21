<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/listings', [ListingsController::class, 'index'])->name('listings.index');
Route::get('/listings/{id}', [ListingsController::class, 'show'])->name('listings.show');
Route::get('/listings/category/{category}', [ListingsController::class, 'category'])->name('listings.category');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/listings', [AdminController::class, 'listings'])->name('admin.listings');
Route::get('/admin/listings/create', [AdminController::class, 'createListing'])->name('admin.listings.create');
Route::get('/admin/listings/{id}/edit', [AdminController::class, 'editListing'])->name('admin.listings.edit');
Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');