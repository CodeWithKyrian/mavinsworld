<x-app-layout title="{{ $category->name }}">
    <div class="page-header mb-50">
        <div class="pl-5 pr-5 mt-5">
            <div class="sub-page-header" style="background-image: url({{asset('img/long-banner-two.jpeg')}})">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        @if (request()->has('s'))
                            <h1 class="heading-1 mb-15">
                                {{                                 __('product.search_results', ['search' => request()->input('s')]) }}
                            </h1>
                            <div class="breadcrumb">
                                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span>
                                <a href="{{ route('shop') }}" rel="nofollow">Shop </a>
                                <span></span>
                                <a href="{{ route('category.show', $category) }}" rel="nofollow">{{ $category->name }}
                                </a>
                                <span></span>
                                "{{ request()->input('s') }}"
                            </div>
                        @else
                            <h1 class="heading-1 mb-15">{{ $category->name }}</h1>
                            <div class="breadcrumb">
                                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span>
                                <a href="{{ route('shop') }}" rel="nofollow">Shop </a>
                                <span></span> {{ $category->name }}
                            </div>
                        @endif
                    </div>
                    {{-- <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                            </li>
                            <li class="hover-up active">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Artichoke</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Celery</a>
                            </li>
                            <li class="hover-up mr-0">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Spinach</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ $category->products->total() }}</strong> items
                            for you!
                        </p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ($category->products as $product)
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.details', $product) }}">
                                            {{ $product->getFirstMedia('thumbnail') }}
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                                    </div>
                                    <h2><a href="{{ route('product.details', $product) }}">{{ $product->name }}</a>
                                    </h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating"
                                                style="width: {{ ($product->rating / 5) * 100 }}%">
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
                </div>
                {{ $category->products->links('pagination::marvins-front') }}
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Categories</h5>
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category.show', $category) }}">
                                    <img src="/img/theme/icons/category-1.svg" alt="" />{{ $category->name }}
                                </a>
                                <span class="count">{{ $category->products_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                    <img src="/img/banner/banner-11.png" alt="" />
                    <div class="banner-text">
                        <span>Oganic</span>
                        <h4>
                            Save 17% <br />
                            on <span class="text-brand">Oganic</span><br />
                            Juice
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
