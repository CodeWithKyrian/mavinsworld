<x-admin-layout title="Edit Category">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Edit Category</h2>
            <p>Edit this category</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('admin.category.update', $category) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Name</label>
                                    <input required type="text" placeholder="Type here" class="form-control" id="name" name="name"
                                        value="{{ $category->name }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input required type="text" placeholder="Type here" class="form-control" id="slug" name="slug"
                                        value="{{ $category->slug }}" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea required placeholder="Type here" name="meta_description"
                                class="form-control">{{ $category->meta_description }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">Save Changes</button>
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
