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
                                            <div class="product-rating" style="width: {{ ($product->rating / 5) * 100 }}%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">{{ get_sell_price($product) }}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">{{
                                                calc_percentage_off($product) }}%
                                                Off</span>
                                            <span class="old-price font-md ml-15">{{ get_cost_price($product) }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus
                                        dolore impedit fuga eum eligendi.</p>
                                </div>
                                <!-- <div class="attr-detail attr-size mb-30">
                                    <strong class="mr-10">Size / Weight: </strong>
                                    <ul class="list-filter size-filter font-small">
                                        <li><a href="#">50g</a></li>
                                        <li class="active"><a href="#">60g</a></li>
                                        <li><a href="#">80g</a></li>
                                        <li><a href="#">100g</a></li>
                                        <li><a href="#">150g</a></li>
                                    </ul>
                                </div> -->
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
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                        href="#Additional-info">Additional info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews
                                        (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>Uninhibited carnally hired played in whimpered dear gorilla koala depending
                                            and much yikes off far quetzal goodness and from for grimaced goodness
                                            unaccountably and meadowlark near unblushingly crucial scallop tightly
                                            neurotic hungrily some and dear furiously this apart.</p>
                                        <p>Spluttered narrowly yikes left moth in yikes bowed this that grizzly much
                                            hello on spoon-fed that alas rethought much decently richly and wow against
                                            the frequent fluidly at formidable acceptably flapped besides and much circa
                                            far over the bucolically hey precarious goldfinch mastodon goodness gnashed
                                            a jellyfish and one however because.</p>
                                        <ul class="product-more-infor mt-30">
                                            <li><span>Type Of Packing</span> Bottle</li>
                                            <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                            <li><span>Quantity Per Case</span> 100ml</li>
                                            <li><span>Ethyl Alcohol</span> 70%</li>
                                            <li><span>Piece In One</span> Carton</li>
                                        </ul>
                                        <hr class="wp-block-separator is-style-dots" />
                                        <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey hello
                                            far meadowlark imitatively egregiously hugged that yikes minimally unanimous
                                            pouted flirtatiously as beaver beheld above forward energetic across this
                                            jeepers beneficently cockily less a the raucously that magic upheld far so
                                            the this where crud then below after jeez enchanting drunkenly more much wow
                                            callously irrespective limpet.</p>
                                        <h4 class="mt-30">Packaging & Delivery</h4>
                                        <hr class="wp-block-separator is-style-wide" />
                                        <p>Less lion goodness that euphemistically robin expeditiously bluebird smugly
                                            scratched far while thus cackled sheepishly rigid after due one assenting
                                            regarding censorious while occasional or this more crane went more as this
                                            less much amid overhung anathematic because much held one exuberantly sheep
                                            goodness so where rat wry well concomitantly.</p>
                                        <p>Scallop or far crud plain remarkably far by thus far iguana lewd precociously
                                            and and less rattlesnake contrary caustic wow this near alas and next and
                                            pled the yikes articulate about as less cackled dalmatian in much less well
                                            jeering for the thanks blindly sentimental whimpered less across objectively
                                            fanciful grimaced wildly some wow and rose jeepers outgrew lugubrious
                                            luridly irrationally attractively dachshund.</p>
                                        <h4 class="mt-30">Suggested Use</h4>
                                        <ul class="product-more-infor mt-30">
                                            <li>Refrigeration not necessary.</li>
                                            <li>Stir before serving</li>
                                        </ul>
                                        <h4 class="mt-30">Other Ingredients</h4>
                                        <ul class="product-more-infor mt-30">
                                            <li>Organic raw pecans, organic raw cashews.</li>
                                            <li>This butter was produced using a LTG (Low Temperature Grinding) process
                                            </li>
                                            <li>Made in machinery that processes tree nuts but does not process peanuts,
                                                gluten, dairy or soy</li>
                                        </ul>
                                        <h4 class="mt-30">Warnings</h4>
                                        <ul class="product-more-infor mt-30">
                                            <li>Oil separation occurs naturally. May contain pieces of shell.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info">
                                    <table class="font-md">
                                        <tbody>
                                            <tr class="stand-up">
                                                <th>Stand Up</th>
                                                <td>
                                                    <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-wo-wheels">
                                                <th>Folded (w/o wheels)</th>
                                                <td>
                                                    <p>32.5″L x 18.5″W x 16.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-w-wheels">
                                                <th>Folded (w/ wheels)</th>
                                                <td>
                                                    <p>32.5″L x 24″W x 18.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="door-pass-through">
                                                <th>Door Pass Through</th>
                                                <td>
                                                    <p>24</p>
                                                </td>
                                            </tr>
                                            <tr class="frame">
                                                <th>Frame</th>
                                                <td>
                                                    <p>Aluminum</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-wo-wheels">
                                                <th>Weight (w/o wheels)</th>
                                                <td>
                                                    <p>20 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-capacity">
                                                <th>Weight Capacity</th>
                                                <td>
                                                    <p>60 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="width">
                                                <th>Width</th>
                                                <td>
                                                    <p>24″</p>
                                                </td>
                                            </tr>
                                            <tr class="handle-height-ground-to-handle">
                                                <th>Handle height (ground to handle)</th>
                                                <td>
                                                    <p>37-45″</p>
                                                </td>
                                            </tr>
                                            <tr class="wheels">
                                                <th>Wheels</th>
                                                <td>
                                                    <p>12″ air / wide track slick tread</p>
                                                </td>
                                            </tr>
                                            <tr class="seat-back-height">
                                                <th>Seat back height</th>
                                                <td>
                                                    <p>21.5″</p>
                                                </td>
                                            </tr>
                                            <tr class="head-room-inside-canopy">
                                                <th>Head room (inside canopy)</th>
                                                <td>
                                                    <p>25″</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_color">
                                                <th>Color</th>
                                                <td>
                                                    <p>Black, Blue, Red, White</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_size">
                                                <th>Size</th>
                                                <td>
                                                    <p>M, S</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Customer questions & answers</h4>
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex mb-30">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="assets/imgs/blog/author-2.png" alt="" />
                                                                <a href="#" class="font-heading text-brand">Sienna</a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="d-flex justify-content-between mb-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="font-xs text-muted">December 4,
                                                                            2021 at 3:12 pm </span>
                                                                    </div>
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width: 100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                    consectetur adipisicing elit. Delectus, suscipit
                                                                    exercitationem accusantium obcaecati quos voluptate
                                                                    nesciunt facilis itaque modi commodi dignissimos
                                                                    sequi repudiandae minus ab deleniti totam officia id
                                                                    incidunt? <a href="#" class="reply">Reply</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="assets/imgs/blog/author-3.png" alt="" />
                                                                <a href="#" class="font-heading text-brand">Brenna</a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="d-flex justify-content-between mb-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="font-xs text-muted">December 4,
                                                                            2021 at 3:12 pm </span>
                                                                    </div>
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width: 80%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                    consectetur adipisicing elit. Delectus, suscipit
                                                                    exercitationem accusantium obcaecati quos voluptate
                                                                    nesciunt facilis itaque modi commodi dignissimos
                                                                    sequi repudiandae minus ab deleniti totam officia id
                                                                    incidunt? <a href="#" class="reply">Reply</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="assets/imgs/blog/author-4.png" alt="" />
                                                                <a href="#" class="font-heading text-brand">Gemma</a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="d-flex justify-content-between mb-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="font-xs text-muted">December 4,
                                                                            2021 at 3:12 pm </span>
                                                                    </div>
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width: 80%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                    consectetur adipisicing elit. Delectus, suscipit
                                                                    exercitationem accusantium obcaecati quos voluptate
                                                                    nesciunt facilis itaque modi commodi dignissimos
                                                                    sequi repudiandae minus ab deleniti totam officia id
                                                                    incidunt? <a href="#" class="reply">Reply</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Customer reviews</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <h6>4.8 out of 5</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>5 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>4 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 25%"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>3 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 45%"
                                                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>2 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 65%"
                                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%
                                                    </div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>1 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 85%"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%
                                                    </div>
                                                </div>
                                                <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--comment form-->
                                    <div class="comment-form">
                                        <h4 class="mb-15">Add a review</h4>
                                        <div class="product-rate d-inline-block mb-30"></div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <form class="form-contact comment_form" action="#" id="commentForm">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" name="comment"
                                                                    id="comment" cols="30" rows="9"
                                                                    placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="name" id="name"
                                                                    type="text" placeholder="Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="email" id="email"
                                                                    type="email" placeholder="Email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input class="form-control" name="website" id="website"
                                                                    type="text" placeholder="Website" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button button-contactForm">Submit
                                                            Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                        class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html" tabindex="0"><i
                                                        class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html" tabindex="0"><i
                                                        class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2>
                                                <a href="{{ route('product.details', $related) }}" tabindex="0">{{
                                                    $related->name }}</a>
                                            </h2>
                                            <div class="rating-result" title="90%">
                                                <span> </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{ get_sell_price($related) }}</span>
                                                <span class="old-price">{{ get_cost_price($related) }}</span>
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
    </section>

    @push('inline-scripts')
    <script>
        $('#cart-add #loading').hide()
    </script>
    @endpush
</x-app-layout>