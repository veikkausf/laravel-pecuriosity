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
Route::get('/dashboard', [EventController::class, 'manager']) 
->middleware(['auth', 'verified'])
->name('dashboard');

Route::delete('/dashboard/event/{event}', [EventController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('event.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Kartta
Route::get('/map', function () {
    return view('map');
});
// Listat, käyttää EventControllerin viewer-metodia
Route::get('event_list', [EventController::class, 'viewer'])->name('event_list');

Route::get('create_event', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('create');

// Define the route to store the event data
Route::post('/event_list', [EventController::class, 'store'])->name('events.store');
require __DIR__ . '/auth.php';
