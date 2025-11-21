<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        // KETIKA SEARCH
        if ($search && $search !== '') {
            $products = Product::with(['category', 'productPhotos'])
                ->where('name', 'like', '%' . $search . '%')->get();

            return view('products', [
                'categories' => collect(),
                'products' => $products,
                'search' => $search
            ]);
        }

        // KETIKA DEFAULT
        $categories = Category::with([
            'products.category',
            'products.productPhotos'
        ])->whereHas('products')->get();

        return view('products', [
            'categories' => $categories,
            'products' => collect(),
            'search' => null
        ]);
    }
}
