@extends('layouts.mainlayout')

@section('title', 'Home - Hadassa Mur & Baut')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section text-center py-5 mb-5 position-relative" style="min-height:500px; overflow:hidden;">
    <div id="heroCarousel" class="carousel slide h-100 position-absolute top-0 start-0 w-100" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100">
                <div class="carousel-bg-image" style="background-image:url('{{ asset('images/gallery/hadassaHero3.png') }}'); background-size:cover; background-position:center; height:100%;"></div>
            </div>
            <div class="carousel-item h-100">
                <div class="carousel-bg-image" style="background-image:url('{{ asset('images/gallery/hadassaHero2.png') }}'); background-size:cover; background-position:center; height:100%;"></div>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.7); z-index:1;"></div>

    <div class="container position-relative h-100 d-flex flex-column justify-content-center align-items-center text-center" style="z-index:2;">
        <h1 class="display-3 fw-bold mt-5 mb-3 text-white">Mitra Terpercaya Peralatan Teknik</h1>
        <p class="lead mb-4 mb-md-5 mx-auto text-white" style="max-width:700px;">
            Kualitas terjamin untuk semua kebutuhan peralatan teknik dan mur baut Anda di Lumajang.
        </p>
        <a href="{{ route('products') }}" class="btn btn-lg shadow-lg px-4 px-md-5 py-2 py-md-3" style="background-color:#d97582; border-color:#d97582; color:#fff;">
            Jelajahi Katalog <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>
</section>

{{-- CATEGORIES SECTION --}}
<section class="section-padding">
    <div class="container">
        <h2 class="mb-2 text-center" style="color:#1b2f66;">Jelajahi Kategori Utama Kami</h2>
        <p class="text-center text-muted mb-5">Temukan Bearing, Mata Gerinda, dan Alat Teknik unggulan.</p>

        <div class="row g-4 justify-content-center">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="{{ route('products') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm text-center">
                            <div class="p-4 bg-white">
                                <img src="{{ asset('images/products/' . strtolower(str_replace(' ', '', $category->name)) . '/main/' . $category->featured_product->main_image) }}"
                                    class="img-fluid mb-3 rounded-3" alt="Foto {{ $category->name }}">
                            </div>
                            <div class="card-body d-flex flex-column pt-3 pb-4">
                                <h5 class="card-title fw-bold mb-3" style="color:#1b2f66;">{{ $category->name }}</h5>
                                <span class="btn btn-sm mt-auto btn-custom">Lihat Produk <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="text-center my-5">
            <a href="{{ route('products') }}" class="btn btn-outline-dark btn-lg rounded-pill px-5">
                Lihat Seluruh Katalog Kami
            </a>
        </div>
    </div>
</section>

{{-- REVIEWS SECTION --}}
@if ($reviews->count())
<section class="py-5" style="background-color: #fff3e6;">
    <div class="container text-center">
        <h2 class="mb-5" style="color:#1b2f66;">Kata Pelanggan</h2>

        <div id="reviewCarousel" class="carousel slide mx-auto" data-bs-ride="carousel" style="max-width:700px;">
            <div class="carousel-inner p-4" style="min-height: 380px;">
                @foreach ($reviews as $key => $review)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">   {{--ini yg buat kita tau mana yg lagi dishow sm carousel--}}
                        <i class="bi bi-quote display-1 text-warning mb-2"></i>    {{--icon kutipan yg kek quote itu--}}
                        <p class="lead fst-italic text-secondary mt-3 mb-4 px-2 px-md-5">"{{ $review->content }}"</p>
                        <p class="fw-bold mb-0" style="color:#1b2f66;">
                            - {{ Str::mask($review->name, '*', 1, -1) }}   {{--utk masking nama user canggih bet--}}
                        </p>
                        <p class="text-warning mb-4">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <i class="bi bi-star-fill small"></i>     {{--icon bintang lumayan canggih la--}}
                            @endfor
                        </p>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:#1b2f66; border-radius:50%;"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:#1b2f66; border-radius:50%;"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('about') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-4">Lihat selengkapnya</a>
        </div>
    </div>
</section>
@endif

{{-- EXTRA FOOTER --}}
<section class="py-5 text-center" style="background-color: #1b2f66; color:#f2ede1;">
    <div class="container">
        <h3 class="fw-bold mb-3" style="color:#d97582;">Butuh Mur Baut Khusus?</h3>
        <p class="lead mb-4">Tim kami siap membantu Anda menemukan peralatan atau ukuran yang spesifik.</p>
        <a href="{{ route('contact') }}" class="btn btn-custom btn-lg text-white shadow-lg px-4 px-md-5 py-2 py-md-3">Hubungi Kami Sekarang</a>
    </div>
</section>

@endsection
