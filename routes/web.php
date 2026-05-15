<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/gallery', function () {
    $medias = \App\Models\Media::where('category', 'gallery')
        ->where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->get();
    return view('gallery', compact('medias'));
})->name('gallery');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Pages Légales
Route::view('/mentions-legales', 'legal.mentions')->name('legal.mentions');
Route::view('/cgv', 'legal.cgv')->name('legal.cgv');
Route::view('/politique-confidentialite', 'legal.privacy')->name('legal.privacy');
