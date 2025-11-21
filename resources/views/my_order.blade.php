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
                                $subtotal = ($item->quantity ?? 0) * $price;
                            @endphp
                            <tr>
                                <td>{{ $item->product->name ?? 'Produk tidak ditemukan' }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('cart.updateQty', $item->id) }}" method="POST" class="d-flex">
                                            @csrf
                                            <input type="number" name="quantity" min="1" value="{{ $item->quantity ?? 1 }}" class="form-control form-control-sm" style="width:90px;">
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
                        Total: Rp{{ number_format($cartTotal ?? $cart->items->sum(function($i){ $p = $i->product->price ?? $i->price ?? 0; return ($i->quantity ?? 0) * $p; }), 0, ',', '.') }}
                    </h5>

                    <form method="POST" action="{{ route('orders.checkout') }}">
                        @csrf
                        <button class="btn px-4 text-white fw-semibold" style="background:#1b2f66; border-radius:10px;">
                            Checkout
                        </button>
                    </form>
                </div>

            @endif

        </div>
    </div>
@endsection