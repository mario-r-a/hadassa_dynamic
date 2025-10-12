<div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">{{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    {{--Carousel--}}
                    <div class="col-md-6">
                        <div id="productCarousel{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($product->productPhotos as $key => $photo)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('images/products/' . strtolower(str_replace(' ', '', $product->category->name)) . '/detail/' . $photo->image_path) }}"
                                             class="d-block w-100" alt="{{ $product->name }}" style="height: 150px; object-fit: contain;">
                                    </div>
                                @endforeach
                            </div>

                            {{--Tombol prev/next--}}
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>