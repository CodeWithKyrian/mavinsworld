<x-app-layout title="Orders">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span>
                My Account <span></span>
                <a href="{{ route('account.orders.index') }}" rel="nofollow"> Orders</a>
                <span></span>
                {{ $order->code }}
            </div>
        </div>
    </div>
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            @include('frontend.partials._dashboard-menu')
                        </div>
                        <div class="col-md-9">
                            <div class="account dashboard-content lg-pl-50 order-confirmation">
                                <div class="receipt bg-white p-3 rounded">
                                    <div class="row order-details">
                                        <div class="col-md-3 col-6">
                                            <span class="d-block font-xxs">Order date</span>
                                            <span
                                                class="font-weight-bold">{{ $order->ordered_at->format('l jS M, Y') }}</span>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <span class="d-block font-xxs">Order number</span>
                                            <span class="font-weight-bold">{{ $order->code }}</span>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <span class="d-block font-xxs">Order Status</span>
                                            <span
                                                class="badge rounded-pill {{ $order->status_color }}">{{ $order->status }}</span>

                                        </div>
                                        <div class="col-md-3 col-6">
                                            <span class="d-block font-xxs">Shipping Address</span>
                                            <span
                                                class="font-weight-bold text-brand">{{ $order->address->state->name }}
                                                State, {{ $order->address->country->name }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach ($order->items as $item)
                                        <div
                                            class="product-details d-flex justify-content-between align-items-center mt-10">
                                            <div class="d-flex">
                                                <div class="product-image">
                                                    {{ $item->product->getFirstMedia('thumbnail') }}
                                                </div>
                                                <div class="d-flex flex-column justify-content-between">
                                                    <div>
                                                        <strong class="d-block font-weight-bold p-name">
                                                            {{ $item->product->name }}
                                                        </strong>
                                                        <span
                                                            class="font-xxs">{{ $item->product->category->name }}</span>
                                                    </div>
                                                    <span class="font-xxs">Qty: {{ $item->quantity }}</span>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <div class="font-weight-bold">{{ format_price($item->total_price) }}
                                                </div>
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
                                                    <span
                                                        class="font-weight-bold">{{ format_price($order->sub_total) }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <span>Shipping fee</span>
                                                    <span
                                                        class="font-weight-bold">{{ format_price($order->shipping_fee) }}</span>
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
                                    <hr>
                                    <div class="d-flex justify-content-center footer">
                                        @if ($order->status == \App\Models\Order::STATUS_UNPAID)
                                            <a href="{{ route('order.pay', $order) }}" class="btn mt-10 mb-sm-15 mr-20">
                                                Pay Now</a>
                                            <button onclick="document.getElementById('delete-order-form').submit();" class="btn mt-10 mb-sm-15">
                                                Cancel Order</button>
                                            <form id="delete-order-form" action="{{ route('account.orders.destroy', $order) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                        @if ($order->status == \App\Models\Order::STATUS_PAID)
                                            <a href="" class="btn mt-10 mb-sm-15">
                                                Track Order</a>
                                        @endif
                                        @if ($order->status == \App\Models\Order::STATUS_DISPATCHED)
                                            <a href="" class="btn mt-10 mb-sm-15">
                                                Track Order</a>
                                        @endif
                                        @if ($order->status == \App\Models\Order::STATUS_DELIVERED)
                                            <a href="{{ route('account.orders') }}" class="btn mt-10 mb-sm-15">
                                                <i class="fi-rs-arrow-left mr-10"></i>Back to Orders</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
