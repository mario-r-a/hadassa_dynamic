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

        <div class="ticker-wrapper">
            <div class="ticker">
                {{--ORI--}}
                @foreach ($reviews as $review)
                    <div class="card shadow-sm border-0 p-4 me-3" style="min-width: 320px;">
                        <i class="bi bi-quote display-1 text-warning mb-3"></i>
                        <p class="fst-italic text-secondary mb-2">"{{ $review->content }}"</p>
                        <p class="fw-bold mb-1" style="color:#1b2f66;">- {{ Str::mask($review->name, '*', 1, -1) }}</p>
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

                {{--REPEAT--}}
                @foreach ($reviews as $review)
                    <div class="card shadow-sm border-0 p-4 me-3" style="min-width: 320px;">
                        <i class="bi bi-quote display-1 text-warning mb-3"></i>
                        <p class="fst-italic text-secondary mb-2">"{{ $review->content }}"</p>
                        <p class="fw-bold mb-1" style="color:#1b2f66;">- {{ Str::mask($review->name, '*', 1, -1) }}</p>
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
    </div>
</section>
