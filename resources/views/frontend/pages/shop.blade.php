<x-app-layout title="{!! request()->has('s') ? __('product.search_results', ['search' => request()->input('s')]) : 'Shop' !!}">
    <div class="page-header mt-5 pl-5 pr-5 mb-50">
        <div class="my-container">
            <div class="sub-page-header" style="background-image: url({{asset('img/banner/long-banner-two.jpeg')}})">
                <div class="row align-items-center">
                    <div class="col-xl-5">
                        @if (request()->has('s'))
                            <h1 class="heading-1 mb-15">
                                {{ __('product.search_results', ['search' => request()->input('s')]) }}
                            </h1>
                            <div class="breadcrumb">
                                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span>
                                <a href="{{ route('shop') }}" rel="nofollow">Shop </a>
                                <span></span>
                                "{{ request()->input('s') }}"
                            </div>
                        @else
                            <h1 class="heading-1 mb-15">Shop</h1>
                            <div class="breadcrumb">
                                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Shop
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-container mb-30">
        <div class="row">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>{!! trans_choice('product.search_count', $products->total()) !!}</p>
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
                <div class="row justify-content-center product-grid">
                    @include('frontend.partials._shop-posts')
                </div>
                {{-- {{ $products->links('pagination::marvins-front') }} --}}
                <div class="ajax-load text-center mb-15" style="display:none">
                    <button class="button position-relative" style="min-height: 40px;width: 80px">
                        <div class="loading-overlay">
                            <div class="spinner-border" style="width: 20px;height:20px" role="status">
                            </div>
                        </div>
                    </button>
                </div>
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

    @push('inline-scripts')
        <script type="text/javascript">
            var page = 1;
            var load_more = true;
            $(function() {
                $(window).scroll(function() {
                    if (load_more) {
                        if ($(window).scrollTop() >= ($('.product-grid').offset().top + $('.product-grid')
                                .outerHeight() -
                                window
                                .innerHeight)) {

                            /* load ajax content */
                            load_more = false;
                            page++;
                            loadMoreData(page);
                        }

                    }
                });
            });


            function loadMoreData(page) {
                $.ajax({
                        url: '?page=' + page,
                        type: "get",
                        beforeSend: function() {
                            $('.ajax-load').show();
                        }
                    })
                    .done(function(data) {
                        if (data.posts_view == "") {
                            $('.ajax-load').html("<h6>No more records found</h6>");
                            load_more = false;
                            return;
                        }
                        $('.ajax-load').hide();
                        $(".product-grid").append(data.posts_view);
                        load_more = true;
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            }
        </script>
    @endpush
</x-app-layout>
