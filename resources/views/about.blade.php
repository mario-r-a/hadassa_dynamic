@extends('layouts.mainlayout')

@section('title', 'Tentang Kami - Hadassa Mur & Baut')

@section('content')

{{-- SHORT STORY --}}
<section class="section-padding py-5">
    <div class="container">
        <h1 class="text-center mb-4" style="color:#1b2f66; font-size:3rem;">Tentang Kami</h1>
        <p class="text-center text-secondary fs-5" style="max-width:800px; margin:auto;">
            Sejak 2016, Hadassa Mur & Baut telah menjadi mitra terpercaya untuk peralatan teknik dan mur baut di Lumajang. 
            Kami mengutamakan kualitas, layanan cepat, dan kepuasan pelanggan, dengan selalu menyediakan berbagai produk lengkap 
            untuk kebutuhan industri maupun proyek pribadi.
        </p>
    </div>
</section>

{{-- PHOTO GALLERY BESAR --}}
<section class="section-padding py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5" style="color:#1b2f66;">Hadassa</h2>

        <div class="row g-3 justify-content-center align-items-start">
            {{-- Foto Kiri --}}
            <div class="col-md-4 d-flex flex-column gap-3">
                <img src="{{ asset('images/gallery/hadassaPhoto1.jpeg') }}" class="img-fluid rounded shadow-sm" style="height:200px; object-fit:cover;" alt="Gallery">
                <img src="{{ asset('images/gallery/hadassaPhoto2.jpeg') }}" class="img-fluid rounded shadow-sm" style="height:200px; object-fit:cover;" alt="Gallery">
            </div>

            {{-- Foto Tengah Besar --}}
            <div class="col-md-4">
                <img src="{{ asset('images/gallery/hadassaPhoto3.jpeg') }}" class="img-fluid rounded shadow-sm" style="height:420px; object-fit:cover;" alt="Gallery">
            </div>

            {{-- Foto Kanan --}}
            <div class="col-md-4 d-flex flex-column gap-3">
                <img src="{{ asset('images/gallery/hadassaPhoto4.jpeg') }}" class="img-fluid rounded shadow-sm" style="height:200px; object-fit:cover;" alt="Gallery">
                <img src="{{ asset('images/gallery/hadassaPhoto5.jpeg') }}" class="img-fluid rounded shadow-sm" style="height:200px; object-fit:cover;" alt="Gallery">
            </div>
        </div>
    </div>
</section>


{{-- AUTO SCROLLING REVIEWS --}}
<section class="section-padding py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color:#1b2f66;">Apa Kata Pelanggan</h2>

        @if ($reviews->count())
        <div class="ticker-wrapper">
            <div class="ticker">
                @foreach (collect($reviews)->concat($reviews) as $review)
                    <div class="card shadow-sm border-0 p-4 me-3" style="min-width: 320px;">
                        <i class="bi bi-quote display-1 text-warning mb-3"></i>

                        <p class="fst-italic text-secondary mb-2">
                            "{{ $review->content }}"
                        </p>

                        {{-- masking user name --}}
                        <p class="fw-bold mb-1" style="color:#1b2f66;">
                            - {{ Str::mask($review->user->name, '*', 1, -1) }}
                        </p>

                        {{-- rating --}}
                        <p>
                            @for ($i = 0; $i < $review->rating; $i++)
                                <i class="bi bi-star-fill text-warning"></i>
                            @endfor
                            @for ($i = $review->rating; $i < 5; $i++)
                                <i class="bi bi-star text-secondary"></i>
                            @endfor
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        @else
            <p class="text-center text-muted">Belum ada review.</p>
        @endif

    </div>
</section>

{{-- LOGIC TAMPILAN REVIEW UNTUK USER --}}
@if(auth()->check() && auth()->user()->status === 'member')

    {{-- Jika user sudah membuat review --}}
    @if (auth()->user()->review)

        <div class="p-4 my-4 rounded-4 shadow-sm"
             style="background:#e9fff3; border-left:6px solid #28a745; max-width:650px; margin:auto;">

            <div class="d-flex">
                <i class="bi bi-check-circle-fill fs-1 text-success me-3"></i>

                <div>
                    <h5 class="fw-bold mb-1" style="color:#28a745;">Terima kasih atas review Anda!</h5>

                    <p class="text-secondary">
                        Kami sangat menghargai masukan Anda.  
                        Jika Anda ingin mengubah pendapat atau memperbarui pengalaman, Anda dapat menghapus review Anda dan membuat yang baru.
                    </p>

                    {{-- TOMBOL HAPUS REVIEW --}}
                    <form action="{{ route('review.delete', auth()->user()->review->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger px-4 mt-2">
                            <i class="bi bi-trash3 me-1"></i> Hapus Review
                        </button>
                    </form>
                </div>
            </div>
        </div>

    @else

        {{-- FORM REVIEW --}}
        <div class="card shadow-sm p-4 my-4">
            <h4 class="mb-3">Tulis Review Anda</h4>

            {{-- Pesan berhasil atau error --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('review.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select" required>
                        <option value="">Pilih Rating</option>
                        <option value="5">5 - Sangat Puas ★★★★★</option>
                        <option value="4">4 - Puas ★★★★☆</option>
                        <option value="3">3 - Cukup ★★★☆☆</option>
                        <option value="2">2 - Kurang ★★☆☆☆</option>
                        <option value="1">1 - Buruk ★☆☆☆☆</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Review</label>
                    <textarea name="content" rows="4" class="form-control"
                        placeholder="Tulis pengalaman Anda..." required>{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Review</button>
            </form>
        </div>

    @endif

@elseif(auth()->check() && auth()->user()->status === 'admin')
    {{-- Admin tidak boleh review --}}
@else
    {{-- Reminder login --}}
    <div class="p-4 rounded-4 shadow-sm my-4 mx-auto"
        style="background:#f7f9fc;border-left:6px solid #1b2f66;max-width:420px;">

        <div class="d-flex align-items-center">
            <i class="bi bi-person-lock fs-1 me-3" style="color:#1b2f66;"></i>

            <div>
                <p class="mb-1 fw-semibold text-center" style="color:#1b2f66;">Anda belum login</p>
                <p class="text-secondary text-center">Silakan login terlebih dahulu untuk memberikan review.</p>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="btn px-4 py-2" style="background:#1b2f66;color:white;border-radius:12px;">
                        Login Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
