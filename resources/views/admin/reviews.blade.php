@extends('layouts.mainlayout')

@section('title', 'Admin - Reviews')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Reviews (Admin)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($reviews->isEmpty())
        <div class="alert alert-info">Belum ada review.</div>
    @else
        @foreach($reviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <div class="fw-bold">{{ $review->user->name ?? 'User' }}</div>
                            <div class="text-muted small">{{ optional($review->created_at)->format('d M Y H:i') }}</div>
                            
                            {{-- Rating --}}
                            <div class="text-warning mt-2 mb-2">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                                @for ($i = $review->rating; $i < 5; $i++)
                                    <i class="bi bi-star"></i>
                                @endfor
                                <span class="ms-2 text-dark small">({{ $review->rating }}/5)</span>
                            </div>

                            {{-- Content --}}
                            <div class="mt-2">
                                <p class="mb-0 text-secondary">{{ $review->content }}</p>
                            </div>
                        </div>

                        {{-- Tidak ada tombol hapus (read-only) --}}
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $reviews->links() }}
        </div>
    @endif
</div>
@endsection