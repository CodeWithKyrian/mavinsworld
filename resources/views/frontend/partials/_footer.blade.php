@php
$testmonials = [
    [
        'name' => 'Michael',
        'comment' => 'The dick enlargement is really doing a great job 👏 I’m actually seeing the improvements. It’s my 3rd week now',
        'image' => 'https://ui-avatars.com/api/?length=1&background=0D8ABC&color=FFF&name=Micheal',
    ],
    [
        'name' => 'Obi Official',
        'comment' => 'I bought the infection dosage during your December promo, I must say, I felt the difference and it’s the best so far💯',
        'image' => 'https://ui-avatars.com/api/?length=1&background=0D8ABC&color=FFF&name=Obi+Official',
    ],
    [
        'name' => 'Miss Beauty',
        'comment' => 'Your infection dosage is lit🔥. The pains I feel around my waist and legs is gradually fading away. I don’t feel it too well again. I don’t regret buying your products.',
        'image' => 'https://ui-avatars.com/api/?length=1&background=0D8ABC&color=FFF&name=Miss+Beauty',
    ],
    [
        'name' => 'Dennison',
        'comment' => 'Since I started using your products, I now get my early morning erection very hard unlike before. I’m still taking the infection dosage. Ur products are very good 👍',
        'image' => 'https://ui-avatars.com/api/?length=1&background=0D8ABC&color=FFF&name=Dennison',
    ],
    [
        'name' => 'Okeke',
        'comment' => 'Ever since I started ur infection dosage, my stomach drastically changed. I used to feel pain and inches rounds my waist but they are no more. All thanks to ur products. Thou I have not seen much changes on the breast firming but am still using.',
        'image' => 'https://ui-avatars.com/api/?length=1&background=0D8ABC&color=FFF&name=Okeke',
    ],
    [
        'name' => 'Sixtus',
        'comment' => 'I ordered ur quick ejaculation treatment for my friend and it really worked very well for him. Ur products are very nice. Keep it up',
        'image' => 'https://ui-avatars.com/api/?length=1&background=0D8ABC&color=FFF&name=Sixtus',
    ],
    [
        'name' => 'Fabian',
        'comment' => 'This is the only herbal brand I know that sells good and effective products. I love ur products.',
        'image' => 'https://ui-avatars.com/api/?length=1&background=0D8ABC&color=FFF&name=Fabian',
    ],
];
@endphp


<footer class="main">
    <section class="newsletter wow animate__animated animate__fadeIn">
        <div class="d-flex">
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
    </section>

    <section class="testimonial py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4 class="my-3">Check what our Customers are Saying</h4>
                    <p class="subtitle font-weight-normal">You can relay on our amazing features list and also our
                        customer services will be great experience for you without doubt</p>
                </div>
            </div>
            <!-- Row  -->
            <div class="wrapper">
                <div class="testmonial-slider testi1 mt-4">
                    @foreach ($testmonials as $testmonial)
                        <div class="item">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="position-relative thumb bg-brand d-inline-block text-white mb-4"><img
                                            src="{{ $testmonial['image'] }}" alt="wrapkit"
                                            class="thumb-img position-absolute rounded-circle" />
                                        {{ $testmonial['name'] }}</div>
                                    <p>{{ $testmonial['comment'] }}
                                    </p>
                                    <span class="devider d-inline-block my-3"></span>
                                    <h6 class="font-weight-normal">Nigeria</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="slider-arrow testmonial-slider-arrow"></div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="my-container pt-15 pb-20">
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
                        {{-- <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li> --}}
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Store</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="{{ route('cart.index') }}">View Cart</a></li>
                        <li><a href="#">Track My Order</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget  col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                    <h4 class="widget-title">Reach us</h4>
                    <ul class="contact-infor">
                        <li><img src="/img/theme/icons/icon-location.svg" alt="" /><strong>Address:
                            </strong> <span> Onitsha, Anambra State, Nigeria</span>
                        </li>
                        <li>
                            <img src="/img/theme/icons/icon-contact.svg" alt="" />
                            <strong>Call Us:</strong>
                            <a href="tel:+2349033510205">+234 903 351 0205</a>
                        </li>
                        <li>
                            <img src="/img/theme/icons/icon-email-2.svg" alt="" />
                            <strong>Email: </strong>
                            <a href="mailto:marvinworld23@gmail.com"> marvinworld23@gmail.com</a>
                        </li>
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
                    {{ now()->year }}, <strong class="text-brand">Marvins World</strong> -
                    Powered By <strong class="text-brand">
                        <a href="https://codewithkyrian.com" target="_blank">CodeWithKyrian</a>
                    </strong> <br />All rights reserved
                </p>
            </div>
            <div class="col-md-5 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="#"><img src="/img/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="/img/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="https://www.instagram.com/_marvins.world/" target="_blank"><img
                            src="/img/theme/icons/icon-instagram-white.svg" alt="" /></a>
                </div>
                <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
            <div class="col-md-1 text-end d-none d-md-block"></div>
        </div>
    </div>
</footer>
