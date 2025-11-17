<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products page
Route::get('/products', [ProductController::class, 'index'])->name('products');
//Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // popup detail

// About page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
