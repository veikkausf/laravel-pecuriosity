<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Boarding sivu
Route::get('/', function () {
    return view('welcome');
});

// Käyttäjän dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Kartta
Route::get('/map', function () {
    return view('map');
});

Route::get('/create', function () {
    return view('create');
})->middleware(['auth', 'verified'])->name('create');


Route::get('userdata', [UserController::class, 'index']);
require __DIR__.'/auth.php';
