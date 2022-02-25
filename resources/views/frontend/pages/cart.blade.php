<x-app-layout title="Your Cart">
    <section class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Cart
                <span></span> Checkout
            </div>
        </div>
    </section>
    <section class="container mb-80 mt-50">
        @if ($cart->item_count > 0)
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-1 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span
                                class="text-brand cart-count">{{ $cart->item_count }}</span>
                            products in your cart</h6>
                        <h6 class="text-body"><a href="#" class="text-muted"><i
                                    class="fi-rs-trash mr-5"></i>Clear
                                Cart</a></h6>
                    </div>
                </div>
            </div>
            <div class="row" id="cart-details">
                @include('frontend.partials._cart-details')
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Your Cart</h5>
                        </div>
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center ptb-30">
                                <i class="fi-rs-shopping-cart"></i> <br>
                                <h3 class="mt-5"><strong>Your Cart is currently Empty</strong></h3>
                                <p>Before you proceed to checkout you must add some products to your shopping cart.
                                    You will find a lot of interesting products on our "Shop" page.</p>
                                <a href="{{ route('home') }}" class="btn mt-10 mb-sm-15">
                                    <i class="fi-rs-arrow-left mr-10"></i>Back to Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </section>

    @push('inline-scripts')
        <script>
            $('[data-item-delete-id]').click(function() {
                var item_id = $(this).data('item-delete-id')
                $('.cart-summary .loading-overlay').show()

                $.ajax({
                    type: "POST",
                    url: route('cart.delete'),
                    data: {
                        _token: MARVINS.data.csrf,
                        item_id: item_id,
                    },
                    success: function(data) {
                        window.location.reload()
                    }
                });
            })

            function increaseItem(item_id) {
                $('.cart-summary .loading-overlay').show()

                $.ajax({
                    type: "POST",
                    url: route('cart.increase', item_id),
                    data: {
                        _token: MARVINS.data.csrf,
                    },
                    success: function(data) {
                        $('#cart-details').html(data.cart_summary_view)
                        updateUiCart(data.cart_view, data.cart_count);
                    },
                    complete: function() {
                        $('.cart-summary .loading-overlay').hide()
                    }
                });
            }

            function decreaseItem(item_id, quantity) {
                if (quantity > 1) {
                    $('.cart-summary .loading-overlay').show()

                    $.ajax({
                        type: "POST",
                        url: route('cart.decrease', item_id),
                        data: {
                            _token: MARVINS.data.csrf,
                        },
                        success: function(data) {
                            $('#cart-details').html(data.cart_summary_view)
                            updateUiCart(data.cart_view, data.cart_count);
                        },
                        complete: function() {
                            $('.cart-summary .loading-overlay').hide()
                        }
                    });
                }
            }
        </script>
    @endpush
</x-app-layout>
