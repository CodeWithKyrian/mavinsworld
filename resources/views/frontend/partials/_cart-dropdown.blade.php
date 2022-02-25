@php

if (!isset($cart->items->product)) {
    $cart->items->load(['product.discount', 'product.media']);
}

@endphp

<ul class="position-relative">
    <div class="loading-overlay" style="display: none">
        <div class="spinner-border" style="width: 20px;height:20px"
            role="status">
        </div>
    </div>
    @forelse ($cart->items as $item)
        <li>
            <div class="shopping-cart-img">
                <a href="shop-product-right.html">
                    {{ $item->product->getFirstMedia('thumbnail') }}
                </a>
            </div>
            <div class="shopping-cart-title">
                <h4><a href="{{route('product.details', $item->product)}}">{{ $item->product->name }}</a></h4>
                <h4><span>{{ $item->quantity }} × </span>{{ get_sell_price($item->product) }}</h4>
            </div>
            <div class="shopping-cart-delete">
                <a onclick="removeFromCart({{ $item->id }})"><i class="fi-rs-cross-small"></i></a>
            </div>
        </li>
    @empty
        <li class="text-center">There's no item in your cart!</li>
    @endforelse
</ul>
@if (count($cart->items) > 0)
    <div class="shopping-cart-footer">
        <div class="shopping-cart-total">
            <h4>Total <span>{{ format_price($cart->total) }}</span></h4>
        </div>
        <div class="shopping-cart-button">
            <a href="{{ route('cart.index') }}" class="outline">View cart</a>
            <a href="{{ route('cart.checkout') }}">Checkout</a>
        </div>
    </div>
@endif
