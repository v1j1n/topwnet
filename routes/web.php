<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

// Frontend Routes
Route::get('/', HomeController::class)->name('home')->middleware('cache.headers:public;max_age=3600;etag');

Route::get('/about-us', AboutUsController::class)->name('about-us')->middleware('cache.headers:public;max_age=3600;etag');

// Services Routes - Dynamic service pages from database
Route::get('/services/{slug}', ServiceController::class)->name('services.show')->where('slug', '[a-z0-9\-]+')->middleware('cache.headers:public;max_age=3600;etag');

Route::get('/partners', PartnerController::class)->name('partners')->middleware('cache.headers:public;max_age=3600;etag');

Route::get('/clients', [ClientController::class, 'index'])->name('clients')->middleware('cache.headers:public;max_age=3600;etag');

Route::get('/contact', [ContactController::class, 'index'])->name('contact')->middleware('cache.headers:public;max_age=3600;etag');

Route::post('/contact', [ContactController::class, 'submit'])
    ->middleware(ProtectAgainstSpam::class)
    ->name('contact.submit');

// Enquiry form submission (homepage) with honeypot protection
Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->middleware(ProtectAgainstSpam::class)
    ->name('enquiry.store');

Route::get('/quote', function () {
    return view('pages.quote');
})->name('quote')->middleware('cache.headers:public;max_age=3600;etag');
