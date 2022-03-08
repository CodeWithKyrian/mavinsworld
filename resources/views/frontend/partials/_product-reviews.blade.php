<div class="row">
    <div class="col-lg-8">
        <h4 class="mb-30">Customer Reviews</h4>
        <div class="comment-list">
            @forelse ($reviews as $review)
                <div class="single-comment justify-content-between d-flex mb-20">
                    <div class="user justify-content-between d-flex w-100">
                        <div class="desc w-100">
                            <div class="d-flex justify-content-between w-100 mb-10">
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="font-heading text-brand">{{ $review->display_name }}
                                    </div>
                                    <span
                                        class="font-xs text-muted">{{ $review->created_at->format('jS M Y \a\t h:i a') }}
                                    </span>
                                </div>
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: {{ ($review->rating / 5) * 100 }}%">
                                    </div>
                                </div>
                            </div>
                            <p class="mb-5 font-heading">{{ $review->title }}</p>

                            <p class="mb-10">{{ $review->content }}
                                @auth
                                    @if ($review->user_id == auth()->id())
                                        <a href="javascript:void(0)" onclick="editRating({{$review}})" class="reply">Edit</a>
                                    @endif
                                @endauth
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <h4 class="text-center">No reviews on this product yet!</h4>
            @endforelse
        </div>
    </div>
    <div class="col-lg-4">
        @if ($reviews->count())
            <h4 class="mb-30">Customer Ratings</h4>

            <div class="d-flex mb-30">
                <div class="product-rate d-inline-block mr-15">
                    <div class="product-rating" style="width: {{ ($reviews->avg('rating') / 5) * 100 }}%"></div>
                </div>
                <h6>{{ round($reviews->avg('rating'), 1) }} out of 5</h6>
            </div>
            <div class="progress">
                <span>5 star</span>
                <div class="progress-bar" role="progressbar"
                    style="width: {{ ($reviews->where('rating', 5)->count() / $reviews->count()) * 100 }}%"
                    aria-valuenow="{{ ($reviews->where('rating', 5)->count() / $reviews->count()) * 100 }}"
                    aria-valuemin="0" aria-valuemax="100">
                    {{ round($reviews->where('rating', 5)->count() / $reviews->count(), 2) * 100 }}%
                </div>
            </div>
            <div class="progress">
                <span>4 star</span>
                <div class="progress-bar" role="progressbar"
                    style="width: {{ ($reviews->where('rating', 4)->count() / $reviews->count()) * 100 }}%"
                    aria-valuenow="{{ ($reviews->where('rating', 4)->count() / $reviews->count()) * 100 }}"
                    aria-valuemin="0" aria-valuemax="100">
                    {{ round($reviews->where('rating', 4)->count() / $reviews->count(), 2) * 100 }}%
                </div>
            </div>
            <div class="progress">
                <span>3 star</span>
                <div class="progress-bar" role="progressbar"
                    style="width: {{ ($reviews->where('rating', 3)->count() / $reviews->count()) * 100 }}%"
                    aria-valuenow="{{ ($reviews->where('rating', 3)->count() / $reviews->count()) * 100 }}"
                    aria-valuemin="0" aria-valuemax="100">
                    {{ round($reviews->where('rating', 3)->count() / $reviews->count(), 2) * 100 }}%
                </div>
            </div>
            <div class="progress">
                <span>2 star</span>
                <div class="progress-bar" role="progressbar"
                    style="width: {{ ($reviews->where('rating', 2)->count() / $reviews->count()) * 100 }}%"
                    aria-valuenow="{{ ($reviews->where('rating', 2)->count() / $reviews->count()) * 100 }}"
                    aria-valuemin="0" aria-valuemax="100">
                    {{ round($reviews->where('rating', 2)->count() / $reviews->count(), 2) * 100 }}%
                </div>
            </div>
            <div class="progress mb-30">
                <span>1 star</span>
                <div class="progress-bar" role="progressbar"
                    style="width: {{ ($reviews->where('rating', 1)->count() / $reviews->count()) * 100 }}%"
                    aria-valuenow="{{ ($reviews->where('rating', 1)->count() / $reviews->count()) * 100 }}"
                    aria-valuemin="0" aria-valuemax="100">
                    {{ round($reviews->where('rating', 1)->count() / $reviews->count(), 2) * 100 }}%
                </div>
            </div>
            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
        @endif

    </div>
</div>
