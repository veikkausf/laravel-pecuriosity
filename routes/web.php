<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


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

Route::get('/create_event', function () {
    return view('create_event');
})->middleware(['auth', 'verified'])->name('create');


Route::get('create_event', [UserController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Define the route to store the event data
Route::post('/events', [EventController::class, 'store'])->name('events.store');
require __DIR__.'/auth.php';
