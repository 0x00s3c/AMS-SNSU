<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ViewerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', function () {
    return view('welcome'); // Or redirect to login if needed
});

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('documents', DocumentController::class); // ← defines documents.index and others
});

// External Accreditor Routes
Route::middleware(['auth', 'role:external'])->group(function () {
    Route::get('/review', [ExternalController::class, 'index'])->name('review.index');
    Route::post('/rate/{document}', [ExternalController::class, 'rate'])->name('review.rate');
});

Route::middleware(['auth', 'role:admin'])->get('/admin-dashboard', function () {
    return view('dashboard.admin');
})->name('admin.dashboard');


// Auth Routes
require __DIR__.'/auth.php';

Route::get('/viewer', [PublicController::class, 'index'])->name('viewer.index');
Route::get('/viewer', [ViewerController::class, 'index'])->name('viewer.index');


// routes/web.php
Route::fallback(function () {
    return view('welcome'); // or return response()->json(['message' => 'Not Found'], 404);
});
