<x-app-layout title="Orders">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span>
                My Account <span></span>
                 Orders
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
                            <div class="account dashboard-content lg-pl-50 order-details">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr style="white-space: n">
                                                            <td style="white-space: nowrap">{{ $order->code }}</td>
                                                            <td style="white-space: nowrap">{{ $order->ordered_at->format('jS M, Y') }}</td>
                                                            <td style="white-space: nowrap">
                                                                <span
                                                                    class="badge rounded-pill {{ $order->status_color }}">{{ $order->status }}</span>
                                                            </td>
                                                            <td style="white-space: nowrap">
                                                                {{format_price($order->grand_total)}} for {{$order->item_count}} items
                                                            </td>
                                                            <td style="white-space: nowrap">
                                                                <a href="{{route('account.orders.show', $order)}}" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
