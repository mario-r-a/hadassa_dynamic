<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{

    /**
     * Tampilkan daftar semua order untuk admin.
     */
    public function index(Request $request)
    {
        // simple pagination, include related user + items.product
        $orders = Order::with(['user', 'items.product'])
            ->orderByDesc('created_at')
            ->paginate(4);

        return view('admin.orders', compact('orders'));
    }

    /**
     * Update status order
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,done'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}