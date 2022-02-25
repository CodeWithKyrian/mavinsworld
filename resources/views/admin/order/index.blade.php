<x-admin-layout title="All orders">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order List</h2>
            <p>Here's a list of all orders</p>
        </div>
        <div>
            <input type="text" placeholder="Search order ID" class="form-control bg-white" />
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control" />
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option disabled>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->code }}</td>
                                <td><b>{{ $order->user->full_name }}</b></td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ format_price($order->grand_total) }}</td>
                                <td>
                                    <span class="badge rounded-pill {{ $order->status_color }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td>{{ $order->ordered_at->format('jS M, Y') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.order.show', $order) }}"
                                        class="btn btn-md rounded font-sm">Detail</a>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown"
                                            class="btn btn-light rounded btn-sm font-sm">
                                            <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.order.destroy', $order) }}">View detail</a>
                                            <a class="dropdown-item text-danger"
                                                href="{{ route('admin.order.destroy', $order) }}">Delete</a>
                                        </div>
                                    </div>
                                    <!-- dropdown //end -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->

    {{ $orders->links('pagination::marvins') }}
</x-admin-layout>
