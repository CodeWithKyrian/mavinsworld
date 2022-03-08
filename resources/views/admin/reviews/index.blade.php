<x-admin-layout title="Product Reviews">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Product Reviews</h2>
            <p>List of all reviews on your products</p>
        </div>
        <div>
            <a href="" class="btn btn-primary btn-sm rounded">Create new</a>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-12 col-md-6">
                    <select class="form-select" onchange="getAgain(this)">
                        <option value="0">Show All</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @selected($product->id ==
                                request()->p)>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </header>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 position-relative">
                    <div class="loading-overlay" style="display: none">
                        <div class="spinner-border" style="width: 20px;height:20px" role="status">
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Reviewer</th>
                                    <th>Product</th>
                                    <th>Rating</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="white-space: nowrap"><b>{{ $review->display_name }}</b></td>
                                        <td>{{ $review->product->name }}</td>
                                        <td>{{ $review->rating }}/5</td>
                                        <td>{{ $review->title }}</td>
                                        <td>{{ $review->content }}</td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a data-delete-id="{{ $review->id }}"  href="javascript:void(0)"
                                                    class="btn btn-brand rounded btn-sm font-sm"> <i
                                                        class="material-icons md-delete_forever"></i> </a>
                                            </div>
                                            <!-- dropdown //end -->
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No reviews on yet!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- .col// -->
            </div>
            <!-- .row // -->
        </div>
        <!-- card body .// -->
    </div>
    <!-- card .// -->
    {{ $reviews->links('pagination::marvins') }}

    @push('inline-scripts')
        <script>
            function getAgain(sel) {
                if (sel.value == 0)
                    location.assign(route('admin.review.index'))
                else
                    location.assign(route('admin.review.index', {
                        p: sel.value
                    }))
            }

            $('[data-delete-id]').click(function() {
                const review_id = $(this).data('delete-id');
                $('.loading-overlay').show()

                $.ajax({
                    type: "DELETE",
                    url: route('admin.review.destroy', review_id),
                    data: {
                        _token: MARVINS.data.csrf,
                    },
                    success: function(data) {
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    }
                });
            })
        </script>
    @endpush
</x-admin-layout>
