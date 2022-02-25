<x-admin-layout title="Add New Category">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Add New Category</h2>
            <p>Add a category</p>
        </div>
        <div>
            <input type="text" placeholder="Search Categories" class="form-control bg-white" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('admin.category.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Name</label>
                                    <input type="text" placeholder="Type here" class="form-control"
                                        id="product_name" name="name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_slug" class="form-label">Slug</label>
                                    <input type="text" placeholder="Type here" class="form-control"
                                        id="product_slug" name="slug" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" name="meta_description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">Create Category</button>
                        </div>
                    </form>
                </div>
                <!-- .col// -->
            </div>
            <!-- .row // -->
        </div>
        <!-- card body .// -->
    </div>
    <!-- card .// -->
</x-admin-layout>
