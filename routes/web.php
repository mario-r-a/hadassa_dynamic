<?php

use Illuminate\Support\Facades\Route;

// Public Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReviewController;

// Member Controllers
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Admin Controllers
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminReviewController;

// Profile (Breeze)
use App\Http\Controllers\ProfileController;


/*
PUBLIC ROUTES
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/about', [AboutController::class, 'index'])->name('about');


// Reviews (public-facing but requires auth)
Route::middleware('auth')->group(function () {
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/{review}', [ReviewController::class, 'delete'])->name('review.delete');
});


/*
MEMBER (AUTHENTICATED USER) ROUTES
*/
Route::middleware('auth')->group(function () {

    // My Orders
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.my');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{itemId}', [CartController::class, 'updateQty'])->name('cart.updateQty');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
});


/*
ADMIN ROUTES
*/
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {

    // Order management
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');

    // Review moderation
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews');

    // Product create (admin only)
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Deactivate Product
    Route::patch('/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])
    ->name('products.toggleStatus');

});


/*
BREEZE / PROFILE ROUTES
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/profile/password', [ProfileController::class, 'passwordEdit'])
        ->name('profile.password.edit');

    Route::patch('/profile/password', [ProfileController::class, 'passwordUpdate'])
        ->name('profile.password.update');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
