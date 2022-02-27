<x-admin-layout title="Add New Product">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Add New Product</h2>
                <div>
                    <button onclick="submit(0)" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to
                        draft</button>
                    <button onclick="submit(1)" class="btn btn-md rounded font-sm hover-up">Publish</button>
                </div>
            </div>
        </div>
    </div>
    <form id="product-create-form" enctype="multipart/form-data" action="{{ route('admin.product.store') }}"
        method="POST">
        @csrf
        <input type="hidden" name="should_publish">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Basic</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Product title</label>
                            <input type="text" placeholder="Type here" class="form-control" name="product_name" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Meta Description</label>
                            <input type="text" placeholder="Type here" class="form-control" name="meta_description" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Full description</label>
                            <textarea placeholder="Type here" class="form-control" rows="4" name="description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Regular price</label>
                                        <div class="row gx-2">
                                            <input placeholder="₦" type="text" name="cost_price" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Promotional price</label>
                                        <input placeholder="₦" type="text" name="sell_price" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">SKU</label>
                                        <input placeholder="Product SKU" type="text" class="form-control" name="sku"/>
                                    </div>
                                </div>
                            </div>
                            <label for="is_featured" class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="is_featured" />
                                <span class="form-check-label"> Featured </span>
                            </label>
                    </div>
                </div>
                <!-- card end// -->
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="/img/theme/upload.svg" alt="" />
                            <input class="form-control" type="file" name="thumbnail" />
                        </div>
                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Organization</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Tags</label>
                                <div class="form-control taggle" id="tags" ></div>
                            </div>
                        </div>
                        <!-- row.// -->
                    </div>
                </div>
                <!-- card end// -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Discount</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="has_discount" class="form-check mb-4" data-bs-toggle="collapse"
                                href="#collapseDiscount" data-target="#collapseDiscount"
                                aria-controls="collapseDiscount">
                                    <input class="form-check-input" type="checkbox" name="has_discount" id="has_discount" />
                                    <span class="form-check-label"> Has Discount </span>
                                </label>
                            </div>
                        </div>
                        <div class="row collapse in" id="collapseDiscount">
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label class="form-label">Discount Type</label>
                                    <select class="form-select" name="discount_type">
                                        <option value="percent">Percent</option>
                                        <option value="amount">Amount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label class="form-label">Discount Amount</label>
                                    <input placeholder="₦" type="number" name="discount_amount" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Duration</label>
                                    <div class="input-daterange d-flex flex-wrap" id="datepicker">
                                        <div class="col-12 col-md-5">
                                            <input type="text" class="input-sm form-control" name="discount_started_at"  />
                                        </div>
                                        <div class="col-12 col-md-2 p-5 text-center input-group-addon">to</div>
                                        <div class="col-12 col-md-5">
                                        <input type="text" class="col-12 col-md-5 input-sm form-control" name="discount_ended_at" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/plugins/taggle.js') }}"></script>

    @push('inline-scripts')
    <script>
        new Taggle('tags', {
            placeholder: 'Enter tags (seperate by comma)',
            hiddenInputName: 'tags[]',
            // tags: ['me'],
            maxTags: 3
        })

        function submit(val) {
            $("#product-create-form input[name='should_publish']").val(val)
            $('#product-create-form').submit()
        }
    </script>
@endpush
</x-admin-layout>
