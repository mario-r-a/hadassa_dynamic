<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    /**
     * Tampilkan halaman My Orders + cart.
     */
    public function index()
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $cart->load('items.product');

        foreach ($cart->items as $item) {
            if (empty($item->price) && $item->product) {
                $item->price = $item->product->price;
            }
        }

        $cartTotal = $cart->items->sum(function ($i) {
            $qty = $i->quantity ?? $i->qty ?? 0;
            $price = $i->price ?? ($i->product->price ?? 0);
            return $qty * $price;
        });

        // <-- perbaikan: gunakan relation 'items' yang ada di model Order
        $orders = Order::with('items.product')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('my_order', compact('cart', 'orders', 'cartTotal'));
    }

    /**
     * Proses checkout menggunakan DB::transaction (atomic).
     */
    public function checkout(Request $request)
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        Log::info('OrderController::checkout called', ['user_id' => $user->id]);

        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        if (! $cart || $cart->items->count() === 0) {
            Log::info('Checkout aborted - empty cart', ['user_id' => $user->id]);
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        try {
            $order = null;

            DB::transaction(function () use ($cart, $user, &$order) {
                // hitung total
                $total = 0;
                foreach ($cart->items as $ci) {
                    $qty = $ci->quantity ?? $ci->qty ?? 1;
                    $price = $ci->price ?? ($ci->product->price ?? 0);
                    $total += $qty * $price;
                }

                // buat order
                $order = Order::create([
                    'user_id' => $user->id,
                    'order_number' => 'ORD'.time().mt_rand(100,999),
                    'status' => 'pending',
                    'total_price' => (int) $total,
                ]);

                // buat order items
                foreach ($cart->items as $ci) {
                    $qty = $ci->quantity ?? $ci->qty ?? 1;
                    $price = $ci->price ?? ($ci->product->price ?? 0);

                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $ci->product_id,
                        'quantity'   => (int) $qty,
                        'price'      => (int) $price,
                    ]);
                }

                // kosongkan cart (hapus item)
                CartItem::where('cart_id', $cart->id)->delete();
            });

            Log::info('Checkout succeeded', ['user_id' => $user->id, 'order_id' => $order->id ?? null]);
            return redirect()->route('orders.my')->with('success', 'Checkout berhasil! Pesanan sedang diproses.');
        } catch (\Throwable $e) {
            Log::error('Checkout failed', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Checkout gagal. Silakan coba lagi.');
        }
    }
}