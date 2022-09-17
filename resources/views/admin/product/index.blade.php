<x-admin-layout title="All Products">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">All Products</h2>
            <p>Here are all your beautiful effective products.</p>
        </div>
        <div>
            <a href="#" class="btn btn-light rounded font-md">Export</a>
            <a href="#" class="btn btn-light rounded font-md">Import</a>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm rounded">Create new</a>
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
                        <option>All category</option>
                        <option>Electronics</option>
                        <option>Clothings</option>
                        <option>Something else</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Latest added</option>
                        <option>Cheap first</option>
                        <option>Most viewed</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card card-product-grid">
                            <div href="#" class="img-wrap">
                                {{ $product->getFirstMedia('thumbnail') }}
                            </div>
                            <div class="info-wrap">
                                <a href="{{ route('product.details', $product) }}" target="_blank"
                                    class="title text-truncate">{{ $product->name }}</a>
                                <div class="price mb-2">{{ format_price($product->selling_price) }}</div>
                                <!-- price.// -->
                                <a href="{{ route('admin.product.edit', $product) }}"
                                    class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="material-icons md-edit"></i>
                                    Edit </a>
                                <button class="btn btn-sm font-sm btn-light rounded"
                                    onclick="confirmDelete({{ $product->slug }})">
                                    <i class="material-icons md-delete_forever"></i> Delete
                                </button>
                            </div>
                        </div>
                        <!-- card-product  end// -->
                    </div>
                @endforeach
            </div>
            <!-- row.// -->
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->

    {{ $products->links('pagination::marvins') }}

    <div id="confirm-delete-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    @push('inline-scripts')
        <script>
            function confirmDelete(slug) {
                console.log(slug);
                $.ajax({
                    url: route('admin.product.destroy', slug),
                    type: 'delete',
                    data: {
                        _token: MARVINS.data.csrf,
                    },
                    success: function(data) {
                        MARVINS.plugins.notify('success', 'Product Deleted Succesfully')
                        window.location.reload()
                    }
                })
                $('#confirm-delete-modal').modal()
            }
        </script>
    @endpush
</x-admin-layout>
