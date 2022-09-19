<footer class="main">
  <section class="newsletter wow animate__animated animate__fadeIn">
    <div class="d-flex">
      <div class="position-relative newsletter-inner">
        <div class="newsletter-content">
          <h2 class="mb-20">
            Are you worried and tired of <br />
            your poor sex life?
          </h2>
          <p class="mb-45">Get started with all sexual enhancement products from <span class="text-brand">Marvins
              World</span></p>

          <div class="btn">Click on SHOP NOW to get started</div>
        </div>
      </div>
    </div>
  </section>


  <section class="instagram-testmonial py-4">
    <div class="d-flex flex-wrap section-title  justify-content-center">
      <div class="col-md-8 text-center">
        <h3 class="my-4">Check what our Customers are Saying on social media</h3>
      </div>
    </div>
    <div class="wrapper">
      <div class="instagram-testmonial-slider">
        @foreach ($instagramFeeds as $feed)
          @if ($feed->is_image)
            <div class="item">
              <a href="{{ $feed->permalink }}" target="_blank">
                <img src="{{ $feed->url }}" alt="">
              </a>
            </div>
          @endif
        @endforeach
      </div>
      <div class="slider-arrow instagram-testmonial-slider-arrow"></div>

    </div>
  </section>

  <section class="section-padding footer-mid">
    <div class="my-container pt-15 pb-20">
      <div class="row">
        <div class="footer-link-widget col">
          <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp pr-20"
            data-wow-delay="0">
            <div class="logo mb-30">
              <a href="index.html" class="mb-15"><img src="/img/mavinsworld.png" alt="logo" /></a>
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
            <li><a href="{{ route('gallery') }}">Our Gallery</a></li>
          </ul>
        </div>
        <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
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
  <div class="pb-30 wow animate__animated animate__fadeInUp container" data-wow-delay="0">
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
