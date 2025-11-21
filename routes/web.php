<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::post('/review', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('review.store');

// Authenticated Member Routes
Route::middleware(['auth'])->group(function () {

    // My Orders (member-facing)
    Route::get('/my-orders', [OrderController::class, 'index'])
         ->name('orders.my');

    // Checkout
    Route::post('/checkout', [OrderController::class, 'checkout'])
         ->name('orders.checkout');

    // Cart routes (single place)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{itemId}', [CartController::class, 'updateQty'])->name('cart.updateQty');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
});

// Admin / Misc Placeholder Routes
Route::get('/admin/orders', function () {
    return 'Admin Orders Page (Coming soon)';
})->name('admin.orders')->middleware('auth');

Route::get('/admin/reviews', function () {
    return 'Admin Reviews Page (Coming soon)';
})->name('admin.reviews')->middleware('auth');

// Breeze / Profile Routes (auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password', [ProfileController::class, 'passwordEdit'])->name('profile.password.edit');
    Route::patch('/profile/password', [ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';