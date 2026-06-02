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

Route::get('/tarifs', function () {
    return view('tarifs');
})->name('tarifs');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('throttle:3,10');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Pages Légales
Route::view('/mentions-legales', 'legal.mentions')->name('legal.mentions');
Route::view('/cgv', 'legal.cgv')->name('legal.cgv');
Route::view('/politique-confidentialite', 'legal.privacy')->name('legal.privacy');

// Ligne temporaire pour réparer les images sur o2switch
Route::get('/setup-images', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return 'MAGIE ! Le lien des images a été créé avec succès. Tu peux retourner voir ta galerie !';
    } catch (\Exception $e) {
        return 'Erreur : ' . $e->getMessage();
    }
});

// Ligne temporaire pour mettre à jour la base de données sur o2switch
Route::get('/setup-database', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'MAGIE ! La base de données a été mise à jour avec succès (nouvelle colonne ajoutée).';
    } catch (\Exception $e) {
        return 'Erreur : ' . $e->getMessage();
    }
});
