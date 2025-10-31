<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

// Frontend Routes
Route::get('/', HomeController::class)->name('home');

Route::get('/about-us', AboutUsController::class)->name('about-us');

// Services Routes
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/it-consulting', function () {
        return view('pages.services.it-consulting');
    })->name('it-consulting');

    Route::get('/network-security', function () {
        return view('pages.services.network-security');
    })->name('network-security');

    Route::get('/it-outsourcing', function () {
        return view('pages.services.it-outsourcing');
    })->name('it-outsourcing');

    Route::get('/hardware', function () {
        return view('pages.services.hardware');
    })->name('hardware');

    Route::get('/amc', function () {
        return view('pages.services.amc');
    })->name('amc');

    Route::get('/webdev', function () {
        return view('pages.services.webdev');
    })->name('webdev');

    // Dynamic route for any service from database (place last to avoid conflicts)
    Route::get('/{slug}', ServiceController::class)->name('show')->where('slug', '[a-z0-9\-]+');
});

Route::get('/partners', function () {
    return view('pages.partners');
})->name('partners');

Route::get('/clients', function () {
    return view('pages.clients');
})->name('clients');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function () {
    // Handle contact form submission here
    return redirect()->route('contact')->with('success', 'Message sent successfully!');
})->name('contact.submit');

// Enquiry form submission (homepage) with honeypot protection
Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->middleware(ProtectAgainstSpam::class)
    ->name('enquiry.store');

Route::get('/quote', function () {
    return view('pages.quote');
})->name('quote');

Route::get('/search', function () {
    return view('pages.search');
})->name('search');
