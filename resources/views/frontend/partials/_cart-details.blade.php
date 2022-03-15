<div class="col-lg-8 mb-10">
    <div class="card cart-summary">
        <div class="loading-overlay" style="display: none">
            <div class="spinner-border" style="width: 20px;height:20px" role="status">
            </div>
        </div>
        <div class="card-header">
            Cart Details
        </div>
        <div class="card-body">
            @foreach ($cart->items as $item)
                <article>
                    <div class="cart-item">
                        <div class="cart-item-img">
                            {{ $item->product->getFirstMedia('thumbnail') }}
                        </div>
                        <div class="cart-item-main">
                            <h5>
                                <a
                                    href="{{ route('product.details', $item->product) }}">{{ $item->product->name }}</a>
                            </h5>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: {{ ($item->product->rating / 5) * 100 }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-item-price">
                            <strong
                                class="text-brand">{{ format_price(get_sell_price($item->product, false) * $item->quantity) }}</strong>
                        </div>
                    </div>
                    <footer class="cart-item-footer">
                        <button class="btn btn-sm"
                            data-item-delete-id="{{ $item->id }}">Remove</button>
                        <div class="detail-qty border radius mr-10">
                            <a href="javascript:void(0)" class="qty-down"
                                onclick="decreaseItem({{ $item->id }}, {{ $item->quantity }})">
                                <i class="fi-rs-minus-small"></i>
                            </a>
                            <input type="number" autocomplete="off" name="quantity" value="{{ $item->quantity }}"
                                class="qty-val">
                            <a href="javascript:void(0)" class="qty-up"
                                onclick="increaseItem({{ $item->id }})">
                                <i class="fi-rs-plus-small"></i>
                            </a>
                        </div>
                    </footer>
                </article>
                @if (!$loop->last)
                    <div class="divider-2 mt-10 mb-10"></div>
                @endif
            @endforeach
        </div>

    </div>
    <div class="divider-2 mb-30"></div>
    <div class="cart-action d-flex justify-content-between">
        <a href="{{ route('home') }}" class="btn  mb-sm-15"><i
                class="fi-rs-arrow-left mr-10"></i>Back to
            Shop</a>
        {{-- <a class="btn mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Update Cart</a> --}}
    </div>
</div>
<div class="col-lg-4 mb-10">
    <div class="card cart-summary">
        <div class="loading-overlay" style="display: none">
            <div class="spinner-border" style="width: 20px;height:20px" role="status">
            </div>
        </div>
        <div class="card-header">
            Cart Summary
        </div>
        <div class="card-body">
            <article>
                <div class="cart-item">
                    <div class="col-6 lg-text">Items Total</div>
                    <div class="col-6 lg-text text-brand" style="text-align: right">
                        {{ format_price($cart->total) }}</div>
                </div>
            </article>
            <div class="divider-2 mt-10 mb-10"></div>
            <article>
                <div class="cart-item">
                    <div class="col-6 lg-text">Sub Total</div>
                    <div class="col-6 lg-text text-brand" style="text-align: right">
                        {{ format_price($cart->total) }}</div>
                </div>
            </article>

            <a href="{{ route('cart.checkout') }}" class="btn mt-20 mb-20 w-100">Proceed To
                CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
        </div>
    </div>

</div>