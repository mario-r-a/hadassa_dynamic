<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * MY ORDER PAGE
     * - tampilkan cart + order history
     */
   public function index()
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        // pastikan ada cart untuk view
        $cart = \App\Models\Cart::firstOrCreate(['user_id' => $user->id]);

        $orders = \App\Models\Order::with('orderItems.product')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // render view sesuai file yang ada
        return view('my_order', compact('cart', 'orders'));
    }

    /**
     * CHECKOUT: membuat order dari cart
     */
    public function checkout()
    {
        $user = Auth::user();

        $cart = Cart::with('items')->where('user_id', $user->id)->first();

        if (!$cart || $cart->items->count() === 0) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        DB::beginTransaction();

        try {
            // Buat order
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'total_price' => $cart->items->sum(fn($i) => $i->quantity * $i->price),
            ]);

            // Create Order Items
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'subtotal' => $item->quantity * $item->price,
                ]);
            }

            // Kosongkan cart
            CartItem::where('cart_id', $cart->id)->delete();

            DB::commit();

            return redirect()->route('orders.myorder')
                ->with('success', 'Checkout berhasil! Pesanan sedang diproses.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Checkout gagal.');
        }
    }
}
