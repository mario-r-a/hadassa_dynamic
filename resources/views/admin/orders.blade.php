@extends('layouts.mainlayout')

@section('title', 'Admin - Orders')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Orders (Admin)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info">Belum ada pesanan.</div>
    @else
        @foreach($orders as $order)
            @php
                $statusColors = [
                    'pending' => 'bg-warning text-dark',
                    'confirmed' => 'bg-primary text-white',
                    'cancelled' => 'bg-danger text-white',
                    'done' => 'bg-success text-white',
                ];
                $badge = $statusColors[$order->status] ?? 'bg-secondary text-white';
            @endphp

            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div>
                            <div class="fw-bold">#{{ $order->order_number ?? $order->id }}</div>
                            <div class="small text-muted">{{ $order->user->name ?? 'User' }} — {{ optional($order->created_at)->format('d M Y H:i') }}</div>
                            <div class="mt-1">Total: Rp{{ number_format($order->total_price ?? 0,0,',','.') }}</div>
                        </div>

                        <div class="text-end">
                            <span class="badge {{ $badge }}" style="font-size:0.9rem; padding:0.45rem 0.6rem;">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>

                    {{-- Items --}}
                    <div class="mb-3 p-2 bg-light rounded">
                        @foreach($order->items as $item)
                            <div class="small mb-2">
                                <span class="fw-semibold">{{ $item->product->name ?? 'Produk' }}</span> 
                                — {{ $item->quantity }} x Rp{{ number_format($item->price,0,',','.') }}
                            </div>
                        @endforeach
                    </div>

                    {{-- Update Status Form --}}
                    <form method="POST" action="{{ route('admin.orders.status', $order) }}" class="d-flex gap-2">
                        @csrf
                        @method('PATCH')
                        
                        <select name="status" class="form-select form-select-sm" style="width:180px;">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="done" {{ $order->status === 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                        <button class="btn btn-sm btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection