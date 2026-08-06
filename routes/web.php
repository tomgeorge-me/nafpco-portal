<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/farmers', 'farmers')->name('farmers');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/contact', [EnquiryController::class, 'create'])->name('contact');
Route::post('/contact', [EnquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
