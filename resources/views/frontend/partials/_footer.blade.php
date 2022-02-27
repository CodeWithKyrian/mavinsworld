<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Are you worried about your <br />
                                sexual performance in bed?
                            </h2>
                            <p class="mb-45">Get started with all sexual enhancement products from <span
                                    class="text-brand">Marvins
                                    World</span></p>
                            @php
                                $sex_enh_category = \App\Models\Category::where('name', 'LIKE', '%Sexual%')->first();
                            @endphp
                            <a href="{{ route('category.show', $sex_enh_category) }}" class="btn">Shop Now <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                        {{-- <img src="/img/light-gold-bg.svg" alt="newsletter" /> --}}
                    </div>
                </div>
            </div>
    </section>
    <section class="featured section-padding">
        <div class="row">
            <div class="col-lg-1-4 col-md-4 col-12 col-sm-6 mb-10 mb-xl-0">
                <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                    data-wow-delay="0">
                    <div class="banner-icon">
                        <img src="/img/theme/icons/icon-1.svg" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Best prices & offers</h3>
                        <p>Orders ₦50 or more</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-4 col-md-4 col-12 col-sm-6 mb-10">
                <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                    data-wow-delay=".1s">
                    <div class="banner-icon">
                        <img src="/img/theme/icons/icon-2.svg" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Free delivery</h3>
                        <p>24/7 amazing services</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-4 col-md-4 col-12 col-sm-6 mb-10">
                <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                    data-wow-delay=".2s">
                    <div class="banner-icon">
                        <img src="/img/theme/icons/icon-3.svg" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Great daily deal</h3>
                        <p>When you sign up</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-4 col-md-4 col-12 col-sm-6 mb-10">
                <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                    data-wow-delay=".3s">
                    <div class="banner-icon">
                        <img src="/img/theme/icons/icon-4.svg" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Wide assortment</h3>
                        <p>Mega Discounts</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="pt-15 pb-20">
            <div class="row">
                <div class="footer-link-widget col">
                    <div class="widget-about font-md mb-md-3 pr-20 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img src="/img/mavinsworld.png"
                                    alt="logo" /></a>
                            <p class="font-lg text-heading">Restoring your sexual confidence...</p>
                        </div>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('auth.login') }}">Sign In</a></li>
                        <li><a href="{{ route('cart.index') }}">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget  col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                    <h4 class="widget-title">Reach us</h4>
                    <ul class="contact-infor">
                        <li><img src="/img/theme/icons/icon-location.svg" alt="" /><strong>Address:
                            </strong> <span>Anambra State, Nigeria</span>
                        </li>
                        <li><img src="/img/theme/icons/icon-contact.svg" alt="" /><strong>Call
                                Us:</strong><span>+234 907 6363 8553</span></li>
                        <li><img src="/img/theme/icons/icon-email-2.svg" alt="" /><strong>Email:
                            </strong><span>support@marvinsworld.com</span></li>
                    </ul>
                </div>
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-md-6">
                <p class="font-sm mb-0">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>, <strong class="text-brand">Marvins World</strong> -
                    Powered By <strong class="text-brand">CodeWithKyrian</strong> <br />All rights reserved</p>
            </div>
            <div class="col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="#"><img src="/img/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="/img/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="/img/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="/img/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="#"><img src="/img/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
        </div>
    </div>
</footer>
