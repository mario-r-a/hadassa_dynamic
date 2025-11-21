<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                            if (Auth::user()->status === 'admin') {
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
            
            // Simpan ke folder public/products/main/ dengan nama file yang sudah diubah
            $request->file('main_image')->storeAs('products/main', $filename, 'public');

            // Simpan path lengkap ke dalam variabel imagePath
            $imagePath = 'products/main/' . $filename;
        }

        // Buat produk baru
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => (int) $request->price,
            'main_image' => $imagePath,  // Simpan path lengkap ke dalam database
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

    public function destroy(Product $product)
    {
        // Cek apakah produk masih ada
        if ($product) {
            // Hapus gambar terkait dari storage
            if (Storage::exists('public/' . $product->main_image)) {
                Storage::delete('public/' . $product->main_image);
            }

            // Hapus produk dari database
            $product->delete();

            // Redirect ke halaman daftar produk dengan pesan sukses
            return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
        }

        // Jika produk tidak ditemukan
        return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan!');
    }

}
