<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        // 3 kategori utama
        $categories = Category::whereIn('id', [1, 2, 3])->get();
        
        // Produk pertama dari tiap kategori
        foreach ($categories as $category) {
            // Produk pertama dari products()
            $category->featured_product = $category->products()->first();
        }
        
        // 3. Ambil 2 Review terbaik
        $reviews = Review::orderBy('rating', 'desc')->take(2)->get();
        
        return view('home', compact('categories', 'reviews'));
    }
}