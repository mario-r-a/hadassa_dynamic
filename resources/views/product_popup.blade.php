<div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">{{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    {{-- Carousel --}}
                    <div class="col-md-6">
                        <div id="productCarousel{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($product->productPhotos as $key => $photo)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/products/detail/' . $photo->image_path) }}"
                                             class="d-block w-100"
                                             alt="{{ $product->name }}"
                                             style="height: 300px; object-fit: contain;">
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>

                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6">

                        {{-- Deskripsi --}}
                        <p>{{ $product->description }}</p>

                        {{-- *** TOGGLE STATUS (ADMIN ONLY) *** --}}
                        {{-- @if(auth()->check() && auth()->user()->status === 'admin')
                            <form action="{{ route('products.toggleStatus', $product->id) }}"
                                  method="POST" class="mb-3">
                                @csrf
                                @method('PATCH')

                                @if($product->status === 'active')
                                    <button class="btn btn-warning w-100 fw-semibold py-2">
                                        Nonaktifkan Produk
                                    </button>
                                @else
                                    <button class="btn btn-success w-100 fw-semibold py-2">
                                        Aktifkan Produk
                                    </button>
                                @endif
                            </form>
                        @endif --}}

                        {{-- Tombol Tambah ke Keranjang untuk NON-admin --}}
                        @unless(optional(Auth::user())->status === 'admin')
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit"
                                        class="btn w-100 py-2 fw-semibold"
                                        style="background:#1b2f66; color:white; border-radius:10px;">
                                    Tambah ke Keranjang
                                </button>
                            </form>
                        @endunless

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
