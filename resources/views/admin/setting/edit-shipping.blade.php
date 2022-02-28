<x-admin-layout title="Edit Shipping Cost">
    <div class="content-header">
        <h2 class="content-title">Edit Shipping Cost</h2>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="">Edit Details</div>
        </header>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <section class="content-body p-xl-4">
                        <form method="POST" action="{{route('admin.settings.shipping.update', $cost)}}">
                            @csrf
                            @method('PUT')
                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Group Name</label>
                                        <input class="form-control" type="text" name="group_name"
                                            placeholder="Type here" value="{{ $cost->group_name }}" />
                                    </div>
                                </div><div class="col-md-6"></div>
                               
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pickup Cost</label>
                                        <input class="form-control" type="text" name="pickup_amount" placeholder="₦"
                                            value="{{ $cost->pickup_amount }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Home Delivery Cost</label>
                                        <input class="form-control" type="text" name="delivery_amount" placeholder="₦"
                                            value="{{ $cost->delivery_amount }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">States</label>
                                        <select name="state_ids[]" multiple class="form-select select-multiple select-custom"
                                            id="states_select">
                                        </select>
                                    </div>
                                </div>
                                <!-- col.// -->
                            </div>
                            <!-- row.// -->
                            <button class="btn btn-primary" type="submit">Save changes</button> &nbsp;
                        </form>
                    </section>
                    <!-- content-body .// -->
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- card-body .//end -->
    </div>
    <!-- card .//end -->

    @push('inline-scripts')
    <script>
        $(document).ready(function () {
            $(".select-custom").select2({
                data: <?= json_encode($stateData) ?>
            })
        })
    </script>
    @endpush
</x-admin-layout>
