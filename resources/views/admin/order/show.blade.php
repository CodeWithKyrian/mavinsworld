<x-admin-layout title="{{ $order->code }}">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order detail</h2>
            <p>Details for Order ID: {{ $order->code }}</p>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span> <i class="material-icons md-calendar_today"></i>
                        <b>{{ $order->ordered_at->format('l, M j, Y, h:i A') }}</b> </span>
                    <br />
                    <small class="text-muted">Order ID: {{ $order->code }}</small>
                </div>
                <form method="POST" action="{{ route('admin.order.update', $order) }}"
                    class="col-lg-6 col-md-6 ms-auto text-md-end">
                    @csrf
                    @method('PUT')
                    <select name="new_status" required class="form-select d-inline-block mb-lg-0 mr-5 mw-200">
                        <option disabled selected>Change status</option>
                        @if ($order->status_level < 1)
                            <option value="{{ \App\Models\Order::STATUS_PAID }}">
                                {{ \App\Models\Order::STATUS_PAID }}
                            </option>
                        @endif
                        @if ($order->status_level < 2)
                            <option value="{{ \App\Models\Order::STATUS_DISPATCHED }}">
                                {{ \App\Models\Order::STATUS_DISPATCHED }}
                            </option>
                        @endif
                        @if ($order->status_level < 3)
                            <option value="{{ \App\Models\Order::STATUS_DELIVERED }}">
                                {{ \App\Models\Order::STATUS_DELIVERED }}
                            </option>
                        @endif
                    </select>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-secondary print ms-2" type="button"><i
                            class="icon material-icons md-print"></i></button>
            </div>
    </div>
    </header>
    <!-- card-header end// -->
    <div class="card-body">
        <div class="row mb-50 mt-20 order-info-wrap">
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-person"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Customer</h6>
                        <p class="mb-1">
                            {{ $order->user->full_name }}<br />
                            {{ $order->user->email }}<br />
                            {{ $order->user->phone }}
                        </p>
                        {{-- <a href="#">View profile</a> --}}
                    </div>
                </article>
            </div>
            <!-- col// -->
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-local_shipping"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Order info</h6>
                        <p class="mb-1">
                            Pay method: {{ $order->transaction?->meta['channel'] }} <br />
                            Status: <span
                                class="badge rounded-pill {{ $order->status_color }}">{{ $order->status }}</span>
                            <br />
                            Additional Info:
                        </p>
                    </div>
                </article>
            </div>
            <!-- col// -->
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-place"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Deliver to</h6>
                        <p class="mb-1">
                            @if ($order->address)
                                {{ ucfirst($order->address->name) }}<br />
                                {{ $order->address->state->name }} State,
                                {{ $order->address->country->name }}.<br />
                            @else
                                No shipping address specified
                            @endif
                            Method: <strong class="text-brand">{{ ucfirst($order->shipping_method) }}</strong>
                        </p>
                    </div>
                </article>
            </div>
            <!-- col// -->
        </div>
        <!-- row // -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40%">Product</th>
                                <th width="20%">Unit Price</th>
                                <th width="20%">Quantity</th>
                                <th width="20%" class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>
                                        <a class="itemside" href="#">
                                            <div class="left">
                                                {{ $item->product->getFirstMedia('thumbnail')->img()->attributes(['class' => 'img-xs', 'width' => 40, 'height' => 30]) }}
                                            </div>
                                            <div class="info">{{ $item->product->name }}</div>
                                        </a>
                                    </td>
                                    <td>{{ format_price($item->unit_price) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td class="text-end">{{ format_price($item->total_price) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">
                                    <article class="float-end">
                                        <dl class="dlist">
                                            <dt>Subtotal:</dt>
                                            <dd>{{ format_price($order->sub_total) }}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Shipping cost:</dt>
                                            <dd>{{ format_price($order->shipping_fee) }}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Grand total:</dt>
                                            <dd><b class="h5">{{ format_price($order->grand_total) }}</b>
                                            </dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt class="text-muted">Status:</dt>
                                            <dd>
                                                <span
                                                    class="badge rounded-pill {{ $order->status_color }}">{{ $order->status }}</span>
                                            </dd>
                                        </dl>
                                    </article>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- table-responsive// -->
            </div>
            <!-- col// -->
            <!-- col// -->
        </div>
    </div>
    <!-- card-body end// -->
    </div>
</x-admin-layout>
