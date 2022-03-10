<x-app-layout title="The Best Herbals for You">

    <section class="home-slider position-relative mb-10">
        <div class="home-row d-flex flex-wrap space-x-4">
            <div class="col-md-8 pr-0 col-12 home-slide-cover">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    @foreach ($mediaLibrary->getMedia('banners_xl') as $media)
                        <div class="single-hero-slider single-animation-wrap">
                            {{ $media }}
                        </div>
                    @endforeach
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
            <div class="col-md-4 col-12">
                <div class="d-flex flex-wrap home-banner">
                    @foreach ($mediaLibrary->getMedia('hero_banners_sm') as $media)
                        <div class="col-md-12 col-6">
                            <div class="banner-img">
                                {{ $media }}
                                <div class="banner-text d-none d-md-block">
                                    <a href="{{route('shop')}}" class="btn btn-xs">Shop Now <i
                                            class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 d-md-none">
                        <div class="banner-img mb-sm-0">
                            {{ $mediaLibrary->getFirstMedia('hero_banners_md') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End hero slider-->

    <section class="product-tabs section-padding position-relative">
        <div class="my-container section-title style-2">
            <h3>Featured Products</h3>
        </div>
        <!--End nav-tabs-->
        <div class="my-container">
            <div class="row product-grid-4">
                @foreach ($featured as $product)
                    <div class="col-lg-1-4 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoo">
                                    <a href="{{ route('product.details', $product) }}">
                                        {{ $product->getFirstMedia('thumbnail') }}
                                    </a>
                                </div>
                                @if ($product->hasDiscount())
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="best">-{{ calc_percentage_off($product) }}%</span>
                                    </div>
                                @endif
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a
                                        href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a>
                                </div>
                                <h2>
                                    <a href="{{ route('product.details', $product) }}">{{ $product->name }}</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating"
                                            style="width: {{ ($product->rating / 5) * 100 }}%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted">{{ $product->rating }}</span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>{{ get_sell_price($product) }}</span>
                                        @if ($product->hasPromoPrice())
                                            <span class="old-price">{{ get_cost_price($product) }}</span>
                                        @endif
                                    </div>
                                    <div class="add-cart">
                                        <button class="add" data-product-id="{{ $product->id }}"
                                            style="position: relative">
                                            <div class="loading-overlay" style="display: none">
                                                <div class="spinner-border" style="width: 20px;height:20px"
                                                    role="status">
                                                </div>
                                            </div>
                                            <span id="idle">
                                                <i class="fi-rs-shopping-cart mr-5"></i>
                                                Add
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                @endforeach
            </div>
        </div>
        <!--End tab-content-->
    </section>
    <!--Products Tabs-->

    <section class="section-padding pb-5">
        <div class="my-container section-title wow animate__animated animate__fadeIn">
            <h3 class="">Popular Deals</h3>
            <a class="show-all" href="{{ route('shop') }}">
                Shop Now
                <i class="fi-rs-angle-right"></i>
            </a>
        </div>
        <div class="my-container">
            <div class="row">
                <div class="col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    <div class="carausel-4-columns-cover arrow-center position-relative mb-15">
                        <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                            id="carausel-4-columns-arrows">
                        </div>
                        <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                            @foreach ($popular as $product)
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', $product) }}">
                                                {{ $product->getFirstMedia('thumbnail') }}
                                            </a>
                                        </div>
                                        @if ($product->hasDiscount())
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Save
                                                    {{ calc_percentage_off($product) }}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a
                                                href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product.details', $product) }}">{{ $product->name }}</a>
                                        </h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating"
                                                style="width: {{ ($product->rating / 5) * 100 }}%">
                                            </div>
                                        </div>
                                        <div class="product-price mt-10">
                                            <span>{{ get_sell_price($product) }} </span>
                                            @if ($product->hasPromoPrice())
                                                <span class="old-price">{{ get_cost_price($product) }}</span>
                                            @endif
                                        </div>
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <button class="btn w-100 hover-up" data-product-id="{{ $product->id }}"
                                            style="position: relative">
                                            <div class="loading-overlay" style="display: none">
                                                <div class="spinner-border" style="width: 20px;height:20px"
                                                    role="status">
                                                </div>
                                            </div>
                                            <span id="idle">
                                                <i class="fi-rs-shopping-cart mr-5"></i>
                                                Add
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-10">
                        <a href="{{ route('shop') }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>
    <!--End Best Sales-->
</x-app-layout>
