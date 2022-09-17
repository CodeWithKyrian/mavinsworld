<x-admin-layout title="Shipping Settings">
    <div class="content-header">
        <h2 class="content-title">Shipping settings</h2>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="">All Shipping Costs</div>
        </header>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th scope="col">Group Name</th>
                            <th style="white-space: nowrap" scope="col">Pickup Amount</th>
                            <th style="white-space: nowrap" scope="col">Delivery Amount</th>
                            <th scope="col">States</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($costs as $cost)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="white-space: nowrap" ><b>{{ $cost->group_name }}</b></td>
                                <td>{{ format_price($cost->pickup_amount) }}</td>
                                <td>{{ format_price($cost->delivery_amount) }}</td>
                                <td>
                                    @foreach ($cost->states as $state)
                                        {{ $state->name }}{{ $loop->last ? '.' : ' ,' }}
                                    @endforeach
                                </td>
                                <td class="text-end" style="white-space: nowrap">
                                    <a href="{{route('admin.settings.shipping.edit', $cost)}}" class="btn btn-md rounded font-sm">Edit</a>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown"
                                            class="btn btn-light rounded btn-sm font-sm">
                                            <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.settings.shipping.edit', $cost)}}">Edit</a>
                                            <button onclick="confirmDelete({{$cost}})" class="dropdown-item text-danger" href="">Delete</button>
                                        </div>
                                    </div>
                                    <!-- dropdown //end -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- card-body .//end -->
    </div>
    <!-- card .//end -->

    @push('inline-scripts')
    <script>
        function confirmDelete(cost) {
            $.ajax({
                url: route('admin.settings.shipping.destroy', cost),
                type: 'delete',
                data: {
                    _token: MARVINS.data.csrf,
                },
                success: function(data) {
                    MARVINS.plugins.notify('success', 'Product Deleted Succesfully')
                    window.location.reload()
                }
            })
            // $('#confirm-delete-modal').modal()
        }
    </script>
    @endpush
</x-admin-layout>
