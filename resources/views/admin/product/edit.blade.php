<x-admin-layout title="Edit Product">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Edit Product</h2>

            </div>
        </div>
    </div>
    <form id="product-create-form" enctype="multipart/form-data"
        action="{{ route('admin.product.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
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
                            <input type="text" placeholder="Type here" class="form-control" name="product_name"
                                value="{{ $product->name }}" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Meta Description</label>
                            <input type="text" placeholder="Type here" class="form-control" name="meta_description"
                                value="{{ $product->details?->meta_description }}" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Full description</label>
                            <textarea placeholder="Type here" class="form-control" rows="4">
                            {{ $product->details?->description }}
                            </textarea name="description">
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Regular price</label>
                                    <div class="row gx-2">
                                        <input placeholder="₦" type="text" name="cost_price" class="form-control" value="{{ $product->cost_price }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Promotional price</label>
                                    <input placeholder="₦" type="text" name="sell_price" class="form-control" value="{{ $product->selling_price }}" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">SKU</label>
                                    <input placeholder="Product SKU" type="text" class="form-control" name="sku" value="{{ $product->sku }}" />
                                </div>
                            </div>
                        </div>
                        <label for="is_featured" class="form-check mb-4">
                            <input @if ($product->is_featured) checked @endif class="form-check-input" type="checkbox" name="is_featured" />
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
<option value="{{ $category->id }}" @if ($category->id == $product->id) selected @endif>{{ $category->name }}</option>
@endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Tags</label>
                                <div class="form-control taggle" id="tags"></div>
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
                                    <input @if ($product->hasDiscount()) checked @endif class="form-check-input" type="checkbox" name="has_discount" id="has_discount" />
                                    <span class="form-check-label"> Has Discount </span>
                                </label>
                            </div>
                        </div>
                        <div class="row collapse in" id="collapseDiscount">
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label class="form-label">Discount Type</label>
                                    <select class="form-select" name="discount_type">
                                        <option value="percent" @if ($product->discount?->type == 'percent') selected @endif >Percent</option>
                                        <option value="amount" @if ($product->discount?->type == 'amount') selected @endif >Amount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label class="form-label">Discount Amount</label>
                                    <input placeholder="₦" type="number" name="discount_amount" class="form-control" value="{{ $product->discount?->value }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Duration</label>
                                    <div class="input-daterange d-flex flex-wrap" id="datepicker">
                                        <div class="col-12 col-md-5">
                                            <input type="text" class="input-sm form-control" name="discount_started_at" value="{{ $product->discount?->started_at->format('jS M, Y') }}" />
                                        </div>
                                        <div class="col-12 col-md-2 p-5 text-center input-group-addon">to</div>
                                        <div class="col-12 col-md-5">
                                        <input type="text" class="col-12 col-md-5 input-sm form-control" name="discount_ended_at"  value="{{ $product->discount?->ended_at->format('jS M, Y') }}" />
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
    <div class="d-flex justify-content-center mb-50">
        <div>
            <button type="button" onclick="submit(0)" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to
                draft</button>
                </div>
                <div>
            <button type="button" onclick="submit(1)" class="btn btn-md rounded font-sm hover-up">Publish</button>
        </div>
    </div>


    @push('inline-scripts')
    <script src="{{ asset('js/plugins/taggle.js') }}"></script>
                <script src="{{ asset('js/plugins/datepicker.min.js') }}"></script>
                <script>
                    $(window).on("load", function() {
                        $('#collapseDiscount').collapse($('#has_discount').prop('checked') ? "show" : "hide");
                        $('.input-daterange').datepicker({
                            format: 'D, M dd, yyyy'
                        });
                    });
                    const taggle = new Taggle('tags', {
                        placeholder: 'Enter tags (seperate by comma)',
                        hiddenInputName: 'tags[]',
                        tags: <?= json_encode($product->tags) ?>,
                        maxTags: 3
                    })

                    function submit(val) {
                        $("#product-create-form input[name='should_publish']").val(val)
                        $('#product-create-form').submit()
                    }
                </script>
@endpush
</x-admin-layout>
