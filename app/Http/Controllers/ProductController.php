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
            // Menambahkan kondisi untuk hanya menampilkan produk yang aktif (atau produk apapun jika admin)
            $products = Product::with(['category', 'productPhotos'])
                ->where('name', 'like', '%' . $search . '%')
                ->where(function ($query) {
                    $query->where('status', 'active')
                        ->orWhereHas('category', function($subQuery) {
                            // Membolehkan admin melihat produk apapun
                            if (auth()->user()->status === 'admin') {
                                $subQuery->where('status', '!=', 'inactive');
                            }
                        });
                })
                ->get();

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
        ])->whereHas('products', function ($query) {
            $query->where('status', 'active');
        })->get();

        return view('products', [
            'categories' => $categories,
            'products' => collect(),
            'search' => null
        ]);
    }


    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer|min:0',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Simpan ke folder public/images/products/{category}/{filename}
            $category = \App\Models\Category::find($request->category_id);
            $categoryFolder = strtolower(str_replace(' ', '', $category->name));
            $filename = time() . '_' . $request->file('main_image')->getClientOriginalName();

            $request->file('main_image')->storeAs('products/main', $filename, 'public');

            // Simpan hanya nama file
            $imagePath = $filename;

        }

        // Buat product
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => (int) $request->price,
            'main_image' => $imagePath,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function toggleStatus(Product $product)
    {
        $product->status = $product->status === 'active' ? 'inactive' : 'active';
        $product->save();

        return back()->with('success', 'Status produk berhasil diubah.');
    }
}
