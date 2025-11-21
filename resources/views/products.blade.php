@extends('layouts.mainlayout')

@section('title', 'Produk - Hadassa Mur & Baut')

@section('content')

<section class="section-padding py-5" style="background-color: #f9f5ee;">
    <div class="container mb-5">

        {{-- Judul Halaman --}}
        <h1 class="mt-5 text-center fw-bold" style="color:#1b2f66;">Katalog Produk</h1>

        {{-- Search Bar --}}
        <div class="d-flex justify-content-center my-4">
            <form action="{{ route('products.index') }}" method="GET" class="d-flex w-75 w-md-50 w-lg-25 gap-2">
                <input type="text" placeholder="Cari produk..." name="search"
                       value="{{ request('search') }}" class="form-control rounded-pill px-3 shadow-sm border-0">
                <button type="submit" class="btn px-4 rounded-pill text-white"
                        style="background-color:#1b2f66;">Cari</button>
            </form>
        </div>

        {{-- Jika ada pencarian --}}
        @if ($search)
            <h3 class="mt-4 text-center fw-semibold" style="color:#1b2f66;">
                Hasil pencarian untuk: “{{ $search }}”
            </h3>

            <div class="row g-4 justify-content-center mt-3">
                @forelse ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 product-card shadow-sm h-100 hover-scale"
                             style="transition: all 0.3s ease; background-color: #ffffff;">
                            <a href="#" data-bs-toggle="modal"
                               data-bs-target="#productModal{{ $product->id }}" class="text-decoration-none text-dark">
                                <div class="p-3">
                                    <img src="{{ asset('images/products/' . strtolower(str_replace(' ', '', $product->category->name)) . '/main/' . $product->main_image) }}"
                                         class="img-fluid mb-3 rounded-3"
                                         alt="{{ $product->name }}"
                                         style="height: 200px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="fw-semibold">{{ $product->name }}</h6>
                                    <p class="text-muted small mb-0">{{ $product->category->name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center mt-4">Produk tidak ditemukan.</p>
                @endforelse
            </div>
        @else
            {{-- Default (Tampil Berdasarkan Kategori) --}}
            @foreach ($categories as $category)
                <h3 class="mt-5 fw-semibold" style="color:#1b2f66;">{{ $category->name }}</h3>
                <div class="row g-4 justify-content-start">
                    @foreach ($category->products as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card border-0 product-card shadow-sm h-100 hover-scale"
                                 style="transition: all 0.3s ease; background-color: #ffffff;">
                                <a href="#" data-bs-toggle="modal"
                                   data-bs-target="#productModal{{ $product->id }}" class="text-decoration-none text-dark">
                                    <div class="p-3">
                                        <img src="{{ asset('images/products/' . strtolower(str_replace(' ', '', $category->name)) . '/main/' . $product->main_image) }}"
                                             class="img-fluid mb-3 rounded-3"
                                             alt="{{ $product->name }}"
                                             style="height: 200px; object-fit: contain;">
                                    </div>
                                    <div class="card-body text-center">
                                        <h6 class="fw-semibold">{{ $product->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
</section>

{{-- POPUP --}}
@if ($search)
    @foreach ($products as $product)
        @include('product_popup', ['product' => $product])
    @endforeach
@else
    @foreach ($categories as $category)
        @foreach ($category->products as $product)
            @include('product_popup', ['product' => $product])
        @endforeach
    @endforeach
@endif

@endsection
