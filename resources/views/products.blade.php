@extends('layouts.mainlayout')

@section('title', 'Produk - Hadassa Mur & Baut')

@section('content')

<section class="section-padding py-5" style="background-color: #f9f5ee;">
    <div class="container mb-5">

        {{-- Judul Halaman --}}
        <h1 class="mt-5 text-center fw-bold" style="color:#1b2f66;">Katalog Produk</h1>

        {{-- Search Bar + Add Product Button --}}
        <div class="d-flex justify-content-center align-items-center my-4 gap-3">
            <form action="{{ route('products.index') }}" method="GET" class="d-flex w-75 w-md-50 w-lg-25 gap-2">
                <input type="text" placeholder="Cari produk..." name="search"
                       value="{{ request('search') }}" class="form-control rounded-pill px-3 shadow-sm border-0">
                <button type="submit" class="btn px-4 rounded-pill text-white"
                        style="background-color:#1b2f66;">Cari</button>
            </form>

            {{-- Add Product Button (Only for Admin) --}}
            @if(auth()->check() && auth()->user()->status === 'admin')
                <button type="button" class="btn px-4 rounded-pill text-white" style="background-color:#28a745;"
                        data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus-circle"></i> Tambah Produk
                </button>
            @endif
        </div>

        {{-- Jika ada pencarian --}}
        @if ($search)
            <h3 class="mt-4 text-center fw-semibold" style="color:#1b2f66;">
                Hasil pencarian untuk: "{{ $search }}"
            </h3>

            <div class="row g-4 justify-content-center mt-3">
                @forelse ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 product-card shadow-sm h-100 hover-scale"
                             style="transition: all 0.3s ease; background-color: #ffffff;">
                            <a href="#" data-bs-toggle="modal"
                               data-bs-target="#productModal{{ $product->id }}" class="text-decoration-none text-dark">
                                <div class="p-3">
                                    <img src="{{ asset('storage/' . $product->main_image) }}"
                                         class="img-fluid mb-3 rounded-3"
                                         alt="{{ $product->name }}"
                                         style="height: 200px; object-fit: contain;">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="fw-semibold">{{ $product->name }}</h6>
                                    <p class="text-muted small mb-0">{{ $product->category->name }}</p>
                                    <div class="mt-2 fw-bold">Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}</div>
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
                                        <img src="{{ asset('storage/' . $product->main_image) }}"
                                             class="img-fluid mb-3 rounded-3"
                                             alt="{{ $product->name }}"
                                             style="height: 200px; object-fit: contain;">
                                    </div>
                                    <div class="card-body text-center">
                                        <h6 class="fw-semibold">{{ $product->name }}</h6>
                                        <div class="mt-2 fw-bold">Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}</div>
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

{{-- ADD PRODUCT MODAL (Admin Only) --}}
@if(auth()->check() && auth()->user()->status === 'admin')
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Produk --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Nama produk" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="3" placeholder="Deskripsi produk" required></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                                   placeholder="0" min="0" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Main Image --}}
                        <div class="mb-3">
                            <label class="form-label">Foto Utama</label>
                            <input type="file" name="main_image" class="form-control @error('main_image') is-invalid @enderror" 
                                   accept="image/*" required>
                            <small class="text-muted">Format: JPG, PNG. Max 2MB</small>
                            @error('main_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn text-white" style="background-color:#28a745;">Simpan Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection