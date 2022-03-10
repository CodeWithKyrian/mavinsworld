<x-app-layout title="{{ $product->name }}">
    <section class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span>
                </span>
                <a href="{{ route('category.show', $product->category) }}">
                    {{ $product->category->name }}
                </a>
                <span></span>
                {{ $product->name }}
            </div>
        </div>
    </section>
    <section class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    @foreach ($product->media as $media)
                                        <figure class="border-radius-10">
                                            {{ $media }}
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <!-- <span class="stock-status out-stock"> Sale Off </span> -->
                                <h2 class="title-detail">{{ $product->name }}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating"
                                                style="width: {{ ($product->rating / 5) * 100 }}%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> ({{ $product->reviews_count }}
                                            reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">{{ get_sell_price($product) }}</span>
                                        @if ($product->hasPromoPrice())
                                            <span>
                                                <span class="save-price font-md color3 ml-15">
                                                    {{ calc_percentage_off($product) }} % Off</span>
                                                <span
                                                    class="old-price font-md ml-15">{{ get_cost_price($product) }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{{ $product->details?->description }}
                                </div>
                                <form id="product-buy-form" method="POST" class="detail-extralink mb-50">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="detail-qty border radius mr-10">
                                        <a href="#" class="qty-down">
                                            <i class="fi-rs-minus-small"></i>
                                        </a>
                                        <input type="number" name="quantity" value="1" class="qty-val">
                                        <a href="#" class="qty-up">
                                            <i class="fi-rs-plus-small"></i>
                                        </a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="button" id="cart-add" class="button button-add-to-cart"
                                            onclick="addToCart()">
                                            <div class="loading-overlay" style="display: none">
                                                <div class="spinner-border" style="width: 20px;height:20px"
                                                    role="status">
                                                </div>
                                            </div>
                                            <span id="idle">
                                                <i class="fi-rs-shopping-cart"></i>Add to cart
                                            </span>
                                        </button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
                                    </div>
                                </form>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    
                    <div class="row mt-60">
                        <div class="col-12">
                            <h2 class="section-title style-1 mb-30">Related products</h2>
                        </div>
                        <div class="col-12">
                            <div class="row related-products">
                                @foreach ($related_products as $related)
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('product.details', $related) }}" tabindex="0">
                                                        {{ $related->getFirstMedia('thumbnail') }}
                                                    </a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2>
                                                    <a href="{{ route('product.details', $related) }}"
                                                        tabindex="0">{{ $related->name }}</a>
                                                </h2>
                                                {{-- <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div> --}}
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating"
                                                        style="width: {{ ($related->rating / 5) * 100 }}%">
                                                    </div>
                                                </div>
                                                <div class="product-price">
                                                    <span>{{ get_sell_price($related) }}</span>
                                                    <span
                                                        class="old-price">{{ get_cost_price($related) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick view -->
        <div class="modal fade custom-modal" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Your Review</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body position-relative">
                        <div class="loading-overlay" style="display: none">
                            <div class="spinner-border" style="width: 20px;height:20px" role="status">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form id="editReviewForm" method="POST" action="">
                                    <input type="hidden" id="inputRating" required name="rating" autocomplete="off">
                                    <input type="hidden" name="review_id">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" name="display_name" type="text"
                                                    placeholder="Display Name" required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" name="title" type="text"
                                                    placeholder="Review Title" required />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="content" id="comment"
                                                    cols="30" rows="9" placeholder="Write Review" required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button button-contactForm">Update Changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- .col// -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('inline-scripts')
        <script>
            $(window).load(function() {
                const ratingStars = [...document.getElementsByClassName("rating__star")];

                function executeRating(stars) {
                    const starClassActive = "rating__star star-filled";
                    const starClassInactive = "rating__star star-empty";
                    const starsLength = stars.length;
                    let i;

                    stars.map((star) => {
                        star.onclick = () => {
                            i = stars.indexOf(star);

                            $('#inputRating').val(i + 1)

                            if (star.className === starClassInactive) {
                                for (i; i >= 0; --i) stars[i].className = starClassActive;
                            } else {
                                for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                            }
                        };
                    });
                }

                executeRating(ratingStars);

                $.get({
                    url: route('product.reviews.index', '{{ $product->slug }}'),
                    success: function(data) {
                        $('.comments-area').html(data.reviews_view)
                    },
                    complete: function() {
                        $('.comments-area .loading-overlay').hide()
                    }
                });

                $("#reviewForm").submit(function(e) {
                    e.preventDefault();

                    var rating = $('#inputRating').val()
                    if (rating < 1) {
                        MARVINS.plugins.notify('danger', 'Please fill the star rating');
                    } else {
                        $('.comments-area .loading-overlay').show()
                        $.post({
                            url: route('product.reviews.index', '{{ $product->slug }}'),
                            data: {
                                _token: MARVINS.data.csrf,
                                display_name: $("#reviewForm [name='display_name']").val(),
                                rating: $("#reviewForm [name='rating']").val(),
                                title: $("#reviewForm [name='title']").val(),
                                content: $("#reviewForm [name='content']").val(),
                            },
                            success: function(data) {
                                $('.comments-area').html(data.reviews_view)
                                $('#reviewForm')[0].reset();
                                MARVINS.plugins.notify('success', 'Review recorded successfully');
                            },
                            complete: function() {
                                $('.comments-area .loading-overlay').hide()
                            }
                        });
                    }
                });

                $("#editReviewForm").submit(function(e) {
                    e.preventDefault();

                    review_id = parseInt($("#editReviewForm [name='review_id']").val())
                    $('#editCommentModal .loading-overlay').show()
                    $.ajax({
                        type: 'PUT',
                        url: route('product.reviews.update', ['{{ $product->slug }}', review_id]),
                        data: {
                            _token: MARVINS.data.csrf,
                            display_name: $("#editReviewForm [name='display_name']").val(),
                            title: $("#editReviewForm [name='title']").val(),
                            content: $("#editReviewForm [name='content']").val(),
                        },
                        success: function(data) {
                            $('.comments-area').html(data.reviews_view)
                            $('#editReviewForm')[0].reset();
                            MARVINS.plugins.notify('success', 'Review updated successfully');
                            $('#editCommentModal').modal("hide")
                        },
                        complete: function() {
                            $('#editCommentModal .loading-overlay').hide()
                        }
                    });
                });

            });

            function editRating(review) {
                $("#editCommentModal [name='display_name']").val(review.display_name)
                $("#editCommentModal [name='title']").val(review.title)
                $("#editCommentModal [name='content']").val(review.content)
                $("#editCommentModal [name='review_id']").val(review.id)
                $('#editCommentModal').modal("show")
            }
        </script>
    @endpush
</x-app-layout>
