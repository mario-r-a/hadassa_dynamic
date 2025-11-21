<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menampilkan halaman cart / my order (bagian cart)
    public function index()
    {
        $user = Auth::user();

        // pastikan ada cart (dipakai di beberapa view)
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // load items + product agar price/relationship tersedia
        $cart->load(['items.product']);

        // pastikan setiap item punya harga (fallback ke product price jika price kolom kosong)
        foreach ($cart->items as $item) {
            if (empty($item->price) && $item->product) {
                $item->price = $item->product->price;
            }
        }

        // total cart (gunakan product->price jika tersedia)
        $cartTotal = $cart->items->sum(function ($i) {
            $price = $i->product->price ?? $i->price ?? 0;
            return ($i->quantity ?? 0) * $price;
        });

        $orders = Order::with('orderItems.product')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // tampilkan view yang ada di project: resources/views/my_order.blade.php
        return view('my_order', compact('cart', 'orders', 'cartTotal'));
    }


    // Tambah produk ke cart
    public function add(Request $request, $productId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Silakan login untuk menambahkan ke keranjang.');
        }

        $product = Product::findOrFail($productId);

        // Pastikan user punya cart
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Cek apakah produk sudah ada di cart
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($cartItem) {
            // Tambah qty
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Buat item baru (simpan harga snapshot dari product)
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price ?? 0,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }


    // Update quantity (untuk +/-)
    public function updateQty(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item = CartItem::findOrFail($itemId);

        $item->quantity = max(1, (int) $request->input('quantity', 1));
        $item->save();

        return back()->with('success', 'Quantity diperbarui.');
    }


    // Hapus item dari cart
    public function remove($itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $item->delete();

        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}