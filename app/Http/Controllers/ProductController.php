<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ambil semua kategori yang memiliki produk
     */


    // public function index(Request $request)
    // {
    //     if($request->has('search')){
    //         $categories = Category::where('products.category', 'product.name', 'like', '%'.$request->search.'%')->get();
    //     } else {
    //         // Ambil semua kategori, produk, foto produk, dan kategori dari tiap produk
    //         $categories = Category::with(['products.category', 'products.productPhotos'])->get();
    //     }

    //     return view('products', compact('categories'));
    // }

    public function index(Request $request)
    {
        if ($request->has('search') && $request->search != '') {
            // Kalau user mencari sesuatu → ambil langsung dari tabel products
            $products = Product::with(['category', 'productPhotos'])
                ->where('name', 'like', '%' . $request->search . '%')
                ->get();

            // kirim data produk, tanpa kategori
            return view('products', [
                'products' => $products,
                'categories' => collect(), // kosong, biar view-nya ga error
                'search' => $request->search
            ]);
        } else {
            // Default: tampil berdasarkan kategori
            $categories = Category::with(['products.category', 'products.productPhotos'])->get();

            return view('products', [
                'categories' => $categories,
                'products' => collect(), // kosong
                'search' => null
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
