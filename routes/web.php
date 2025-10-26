<?php

use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');

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

Route::get('/quote', function () {
    return view('pages.quote');
})->name('quote');

Route::get('/search', function () {
    return view('pages.search');
})->name('search');
