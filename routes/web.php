<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'roleManager:bidder'])->name('dashboard');

Route::get('/auctioneer', function () {
    return view('auctioneer',);
})->middleware(['auth', 'verified', 'roleManager:auctioneer'])->name('auctioneer');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified', 'roleManager:admin'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

