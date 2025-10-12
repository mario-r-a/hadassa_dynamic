@extends('layouts.mainlayout')

@section('title', 'Produk - Hadassa Mur & Baut')

@section('content')

<section class="section-padding">
    <div class="container mb-5">
        <h1 class="mt-5 text-center" style="color:#1b2f66;">Katalog Produk</h1>

        @foreach ($categories as $category)
            <h3 class="mt-5" style="color:#1b2f66;">{{ $category->name }}</h3>

            <div class="row g-4 justify-content-start">
                @foreach ($category->products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}"
                            class="text-decoration-none">
                            <div class="card shadow-sm text-center h-100">
                                <div class="p-4 bg-white">
                                    <img src="{{ asset('images/products/' . strtolower(str_replace(' ', '', $category->name)) . '/main/' . $product->main_image) }}"
                                        class="img-fluid mb-3 rounded-3" alt="{{ $product->name }}"
                                        style="height: 150px; object-fit: contain;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>

{{-- POPUP (PRODUCT DETAIL) --}}
@foreach ($categories as $category)
    @foreach ($category->products as $product)
        @include('product_popup', ['product' => $product])
    @endforeach
@endforeach

@endsection
