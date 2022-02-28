<x-app-layout title="Payment Complete">
    <div class="container mt-5 mb-5 order-confirmation">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="receipt bg-white p-3 rounded">
                    <img src="{{ asset('img/theme/check-mark.png') }}" width="120">
                    <h4 class="mt-2 mb-3">Your order is confirmed!</h4>
                    <h6 class="name">Hello {{ auth()->user()->firstname }},</h6>
                    <span class="font-xxs text-black-50">your order has been confirmed and will be shipped in a few days
                        time</span>
                    <hr>
                    <div class="row order-details">
                        <div class="col-md-3 col-6">
                            <span class="d-block font-xxs">Order date</span>
                            <span class="font-weight-bold">{{ $order->ordered_at->format('l jS M, Y') }}</span>
                        </div>
                        <div class="col-md-3 col-6">
                            <span class="d-block font-xxs">Order number</span>
                            <span class="font-weight-bold">{{ $order->code }}</span>
                        </div>
                        <div class="col-md-3 col-6">
                            <span class="d-block font-xxs">Order Status</span>
                            <span class="badge rounded-pill {{ $order->status_color }}">{{ $order->status }}</span>

                        </div>
                        <div class="col-md-3 col-6">
                            <span class="d-block font-xxs">Shipping Address</span>
                            <span class="font-weight-bold text-brand">{{ $order->address->state->name }} State,
                                {{ $order->address->country->name }}</span>
                        </div>
                    </div>
                    <hr>
                    @foreach ($order->items as $item)
                        <div class="product-details d-flex justify-content-between align-items-center mt-10">
                            <div class="d-flex">
                                <div class="product-image">
                                    {{ $item->product->getFirstMedia('thumbnail') }}
                                </div>
                                <div class="d-flex flex-column justify-content-between">
                                    <div>
                                        <strong class="d-block font-weight-bold p-name">
                                            {{ $item->product->name }}
                                        </strong>
                                        <span class="font-xxs">{{ $item->product->category->name }}</span>
                                    </div>
                                    <span class="font-xxs">Qty: {{ $item->quantity }}</span>
                                </div>
                            </div>
                            <div class="product-price">
                                <div class="font-weight-bold">{{ format_price($item->total_price) }}</div>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-5 amount row">
                        <div class="d-flex justify-content-center col-md-6">
                            {{-- <img src="https://i.imgur.com/AXdWCWr.gif" width="250" height="100"> --}}
                        </div>
                        <div class="col-md-6">
                            <div class="billing">
                                <div class="d-flex justify-content-between">
                                    <span>Subtotal</span>
                                    <span class="font-weight-bold">{{ format_price($order->sub_total) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span>Shipping fee</span>
                                    <span class="font-weight-bold">{{ format_price($order->shipping_fee) }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mt-1">
                                    <span class="font-weight-bold font-lg">Total</span>
                                    <span
                                        class="font-weight-bold text-brand font-lg">{{ format_price($order->grand_total) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div>Expected delivery date</div>
                    <div class="font-weight-bold text-brand">12 March 2020</div> --}}
                    <div class="mt-3 text-black-50 font-md">We will be sending a shipping confirmation email when the
                        item is shipped!</div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center footer">
                        <div class="thanks">
                            <div class="font-weight-bold">Thanks for
                                shopping</div>
                            <div>Marvins World</div>
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-end">
                            <div class="font-weight-bold">Need Help?</div>
                            <div>Call - <a href="tel:+23490763638553">+234 903 351 0205</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-15">
            <div class="mt-3 text-black-50 font-md">
                <strong>* Please take a screenshot of this page (including the order number). Click on the WhatsApp
                    button on the bottom left corner and forward the screenshot to the Admin.</strong>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-15">
            <a href="{{ route('home') }}" class="btn mt-10 mb-sm-15 mr-5">
                <i class="fi-rs-arrow-left mr-20"></i>Back to Shop</a>
            <a href="{{ route('account.orders.index') }}" class="btn mt-10 mb-sm-15 ml-5">
                My Orders<i class="fi-rs-arrow-right"></i></a>
        </div>

    </div>
</x-app-layout>
