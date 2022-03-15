<x-app-layout title="About Us">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> About us
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="row align-items-center mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('img/about/about-marvins-main.jpg') }}" alt=""
                                class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                        </div>
                        <div class="col-lg-6">
                            <div class="lg-pl-25">
                                <h1 class="heading-1 mb-20">Welcome to Marvins World </h1>
                                <p class="mb-20">Marvins World is a registered herbal brand under CAC, Nigeria.
                                    Through hard work, dedication, and determination, Marvins World provides the best
                                    herbal solutions for body enhancement, sexual-related problems, and a lasting
                                    solution to restore sexual confidence. </p>
                                <p class="mb-30">We have taken a lead through our various reviews from our
                                    clients and we are glad you would become part of our success stories. Remarkably, we
                                    specialize in giving permanent solutions for quick ejaculation, poor erection, low
                                    sperm count, infection, infertility, pile, ulcer, boobs and butt enlargement, and
                                    lots more. </p>
                                <div class="carausel-3-columns-cover position-relative">
                                    <div id="carausel-3-columns-arrows"></div>
                                    <div class="carausel-3-columns" id="carausel-3-columns">
                                        <img src="{{ asset('img/about/about-marvins-one.jpg') }}" alt="" />
                                        <img src="{{ asset('img/about/about-marvins-two.jpg') }}" alt="" />
                                        <img src="{{ asset('img/about/about-marvins-three.jpg') }}" alt="" />
                                        <img src="{{ asset('img/about/about-marvins-four.jpg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- <section class="text-center mb-50">
                        <h1 class="title heading-1 style-3 mb-40">What We Provide?</h1>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/img/theme/icons/icon-1.svg" alt="" />
                                    <h4>Best Prices & Offers</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/img/theme/icons/icon-2.svg" alt="" />
                                    <h4>Wide Assortment</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/img/theme/icons/icon-3.svg" alt="" />
                                    <h4>Free Delivery</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/img/theme/icons/icon-4.svg" alt="" />
                                    <h4>Easy Returns</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/img/theme/icons/icon-5.svg" alt="" />
                                    <h4>100% Satisfaction</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/img/theme/icons/icon-6.svg" alt="" />
                                    <h4>Great Daily Deal</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    <section class="row align-items-center mb-50">
                        <div class="row mb-50 align-items-stretch">
                            <div class="col-lg-7 lg-pr-25 my-2" style="min-height: 200px">
                                {{-- <img style="width: 100%" src="{{asset('img/16-9-video.png')}}" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" /> --}}
                                <div id="video-player">
                                    <video width="100%" controls poster="{{ asset('img/about/about-poster.png') }}">
                                        {{-- <source src="{{ asset('videos/about-marvins.mov') }}" type="video/mov"> --}}
                                        <source src="{{ asset('videos/about-marvins.mp4') }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            <div class="col-lg-5 my-2">
                                <h6 class="mb-5 text-brand">Our Performance</h6>
                                <h1 class="heading-1 mb-40">We are the best in Nigeria</h1>
                                <p class="mb-30">With our fast-growing form within and outside Nigeria, Marvins
                                    World creates a favorable and safe platform for reliable distributions of Products
                                    around its sphere of operations. Diverse testimonies precede the resounding name of
                                    our brand; the genuine and accurate mixture of herbal products singles us out as the
                                    best in this field of herbal medicine. </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Who we are</h3>
                                <p>We are Marvins Herbal World with undeniable proofs of originality in the world of
                                    herbal medicine. Several research before production justifies our products as the
                                    best. </p>
                            </div>
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Our Goal</h3>
                                <p>To create a safe world where herbal medications will receive the attention it
                                    deserves. Our products and customer services are defined channels for a productive
                                    and reliable platform.</p>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="mb-30">Our Vision</h3>
                                <p>We seek to restore sexual confidence of all our esteemed customers and redefine the
                                    body system of every reachable person for a healthy performance. </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <section class="container mb-50 d-md-block">
            <div class="row about-count">
                <div class="col-lg-1-5 col-6 text-center mb-lg-0 mb-10">
                    <h1 class="heading-1"><span class="count">12</span>+</h1>
                    <h4>Glorious years</h4>
                </div>
                <div class="col-lg-1-5 col-6 text-center mb-lg-0 mb-10">
                    <h1 class="heading-1"><span class="count">36</span>+</h1>
                    <h4>Happy clients</h4>
                </div>
                <div class="col-lg-1-5 col-6 text-center mb-lg-0 mb-10">
                    <h1 class="heading-1"><span class="count">58</span>+</h1>
                    <h4>Projects complete</h4>
                </div>
                <div class="col-lg-1-5 col-6 text-center mb-lg-0 mb-10">
                    <h1 class="heading-1"><span class="count">24</span>+</h1>
                    <h4>Team advisor</h4>
                </div>
                <div class="col-lg-1-5 text-center d-none d-lg-block">
                    <h1 class="heading-1"><span class="count">26</span>+</h1>
                    <h4>Products Sale</h4>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row">
                            <div class="col-lg-6 mb-lg-0 mb-md-5 mb-sm-5">
                                <h6 class="mb-5 text-brand">Our Team</h6>
                                <h1 class="heading-1 mb-30">Meet Our CEO</h1>
                                <p class="mb-30"><strong>ONYIA, LAWRENCE CHIAGOZIE</strong> is the founder and
                                    CEO of Marvins Herbal World; a decorated mastermind in the world of herbs who
                                    through sleepless nights, hard work and self-determination created and redefined the
                                    world of herbs.
                                </p>
                                <p class="mb-30">Through hard work and resilience, Lawrence built an empire
                                    with herbs and fortified it with consistency, durability, and a strong desire to
                                    restore the body system for a healthy performance. He is the brain behind remarkable
                                    discoveries of extraordinary traditional/native herbs which have gained a lot of
                                    relevance in Nigeria and abroad.
                                </p>
                                {{-- <a href="#" class="btn">View All Members</a> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="team-card">
                                            <img src="{{ asset('img/people/onyia-lawrence.jpeg') }}" alt="" />
                                            <div class="content text-center">
                                                <h4 class="mb-5">Onyia Lawrence</h4>
                                                <span>CEO</span>
                                                <div class="social-network mt-20">
                                                    <a href="#"><img src="/img/theme/icons/icon-facebook-brand.svg"
                                                            alt="" /></a>
                                                    <a href="#"><img src="/img/theme/icons/icon-twitter-brand.svg"
                                                            alt="" /></a>
                                                    <a href="#"><img src="/img/theme/icons/icon-instagram-brand.svg"
                                                            alt="" /></a>
                                                    <a href="#"><img src="/img/theme/icons/icon-youtube-brand.svg"
                                                            alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
