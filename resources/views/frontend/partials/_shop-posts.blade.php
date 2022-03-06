@foreach ($products as $product)
    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
        <div class="product-cart-wrap mb-30">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="{{ route('product.details', $product) }}">
                        {{ $product->getFirstMedia('thumbnail') }}
                    </a>
                </div>
                <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                            class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                            class="fi-rs-shuffle"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                </div>
                @if ($product->hasDiscount())
                    <div class="product-badges product-badges-position product-badges-mrg">
                        <span class="hot">-{{ calc_percentage_off($product) }}%</span>
                    </div>
                @endif
            </div>
            <div class="product-content-wrap">
                <div class="product-category">
                    <a href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a>
                </div>
                <h2><a href="{{ route('product.details', $product) }}">{{ $product->name }}</a>
                </h2>
                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: {{ ($product->rating / 5) * 100 }}%">
                        </div>
                    </div>
                    <span class="font-small ml-5 text-muted"> {{ $product->rating }}</span>
                </div>
                {{-- <div class="product-card-bottom"> --}}
                <div class="product-price">
                    <span>{{ get_sell_price($product) }}</span>
                    @if ($product->hasPromoPrice())
                        <span class="old-price">{{ get_cost_price($product) }}</span>
                    @endif
                </div>
                <button class="btn mt-15 w-100 hover-up" data-product-id="{{ $product->id }}"
                    style="position: relative">
                    <div class="loading-overlay" style="display: none">
                        <div class="spinner-border" style="width: 20px;height:20px" role="status">
                        </div>
                    </div>
                    <span id="idle">
                        <i class="fi-rs-shopping-cart mr-5"></i>
                        Add
                    </span>
                </button>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endforeach
