@extends('layouts.mainlayout')

@section('title', 'My Order - Hadassa mur & baut')

@section('content')

<div class="container py-5">

    <h1 class="fw-bold mb-4" style="color:#1b2f66;">My Order</h1>

    {{-- CART SECTION --}}
    <div class="card shadow-sm mb-5" style="border-radius:18px;">
        <div class="card-body">

            <h4 class="fw-semibold mb-3" style="color:#1b2f66;">Keranjang</h4>

            @if(!$cart || $cart->items->count() === 0)
                <p class="text-muted">Keranjang masih kosong.</p>
            @else
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th width="160">Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->items as $item)
                            @php
                                $price = $item->product->price ?? $item->price ?? 0;
                                $qty = $item->quantity ?? $item->qty ?? 1;
                                $subtotal = $qty * $price;
                            @endphp
                            <tr>
                                <td>{{ $item->product->name ?? 'Produk tidak ditemukan' }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('cart.updateQty', $item->id) }}" method="POST" class="d-flex">
                                            @csrf
                                            <input type="number" name="quantity" min="1" value="{{ $qty }}" class="form-control form-control-sm" style="width:90px;">
                                            <button class="btn btn-sm btn-outline-secondary ms-2" type="submit">Update</button>
                                        </form>

                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item dari keranjang?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>

                                <td>Rp{{ number_format($price, 0, ',', '.') }}</td>

                                <td>Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-3">
                    <h5 class="fw-semibold" style="color:#1b2f66;">
                        Total: Rp{{ number_format($cartTotal ?? $cart->items->sum(function($i){ $p = $i->product->price ?? $i->price ?? 0; $q = $i->quantity ?? $i->qty ?? 1; return $q * $p; }), 0, ',', '.') }}
                    </h5>

                    <form id="checkout-form" method="POST" action="{{ route('orders.checkout') }}">
                        @csrf
                        <button type="submit" class="btn px-4 text-white fw-semibold" style="background:#1b2f66; border-radius:10px;">
                            Checkout
                        </button>
                    </form>
                </div>

            @endif

        </div>
    </div>

    {{-- ORDERS SECTION --}}
    <div class="mb-5">
        <h4 class="fw-semibold mb-3" style="color:#1b2f66;">Riwayat Pesanan</h4>

        @if($orders->isEmpty())
            <div class="alert alert-info">Belum ada pesanan.</div>
        @else
            @foreach($orders as $order)
                @php
                    // status badge color
                    $statusColors = [
                        'pending' => 'bg-warning text-dark',
                        'confirmed' => 'bg-primary text-white',
                        'cancelled' => 'bg-danger text-white',
                        'done' => 'bg-success text-white'
                    ];
                    $badgeClass = $statusColors[$order->status] ?? 'bg-secondary text-white';
                @endphp

                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-2">
                            <div>
                                <div class="small text-muted">No. Pesanan</div>
                                <div class="fw-bold">#{{ $order->order_number ?? $order->id }}</div>
                                <div class="text-muted small">{{ optional($order->created_at)->format('d M Y H:i') }}</div>
                            </div>

                            <div class="ms-auto text-end">
                                <span class="badge {{ $badgeClass }}" style="font-size:0.9rem; padding:0.45rem 0.6rem;">
                                    {{ Str::ucfirst($order->status) }}
                                </span>
                                <div class="mt-2 fw-semibold">Total: Rp{{ number_format($order->total_price ?? $order->orderItems->sum(fn($it) => ($it->quantity ?? 0) * ($it->price ?? 0)), 0, ',', '.') }}</div>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <ul class="list-unstyled mb-0">
                                @foreach($order->items as $it)
                                    <li class="d-flex justify-content-between py-2 border-bottom">
                                        <div>
                                            <div class="fw-semibold">{{ $it->product->name ?? 'Produk tidak ditemukan' }}</div>
                                            <div class="text-muted small">{{ ($it->quantity ?? 1) }} x Rp{{ number_format($it->price ?? ($it->product->price ?? 0),0,',','.') }}</div>
                                        </div>
                                        <div class="fw-semibold">
                                            Rp{{ number_format(($it->quantity ?? 1) * ($it->price ?? ($it->product->price ?? 0)),0,',','.') }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>
@endsection