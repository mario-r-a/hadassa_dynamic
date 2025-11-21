<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        // 3 kategori utama (beserta produk + foto produk)
        $categories = Category::with(['products', 'products.productPhotos'])->whereIn('id', [1, 2, 3])->get();

        // Produk pertama dari tiap kategori
        foreach ($categories as $category) {
            $category->featured_product = $category->products->first();
        }

        // 2 review terbaik
        $reviews = Review::with('user')->orderByDesc('rating')->take(2)->get();

        return view('home', compact('categories', 'reviews'));
    }
}
