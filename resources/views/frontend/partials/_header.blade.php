@php

if (!isset($cart)) {
$cart = get_current_cart();
}

$categories = App\Models\Category::all();

@endphp

<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <!-- <li><a href="page-about.htlm">About Us</a></li>
                                <li><a href="page-account.html">My Account</a></li> -->
                            <li><a href="shop-wishlist.html">Wishlist</a></li>
                            <li><a href="shop-order.html">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Need help? Call Us: <strong class="text-brand"> + 234 907 646 3437</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-bg-color header-middle-ptb-1 d-none d-lg-block  sticky-bar">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('home') }}">
                        <img src="/img/mavinsworld.png" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form id="search-form-lg" onchange="switchAction()" action="{{route('shop')}}" method="get">
                            <select class="select-active">
                                <option data-action="{{route('shop')}}" value="all">All Categories</option>
                                @foreach ($categories as $category)
                                <option data-action="{{route('category.show', $category)}}" value="{{$category->id}}">
                                    {{$category->name}}</option>
                                @endforeach
                            </select>
                            <input type="text" name="s" placeholder="Search for items..." />
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                    <span class="pro-count blue">6</span>
                                </a>
                                <a href="shop-wishlist.html"><span class="lable">Wishlist</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{route('cart.index')}}">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    <span class="cart-count pro-count blue">{{ $cart->itemCount }}</span>
                                </a>
                                <a href="shop-cart.html"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown cart-dropdown-hm2">
                                    @include('frontend.partials._cart-dropdown')
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="javascript:void(0)"><span class="lable ml-0">Account</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        @auth
                                        <li>
                                            <a href="{{route('my-account')}}"><i class="fi fi-rs-user mr-10"></i>My
                                                Account</a>
                                        </li>
                                        @endauth

                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order
                                                Tracking</a>
                                        </li>
                                        <li>
                                            <a href="{{route('about')}}"><i class="fi fi-rs-heart mr-10"></i>About
                                                Us</a>
                                        </li>
                                        @auth
                                        <li>
                                            <a onclick="document.getElementById('logout-form').submit();"
                                                href="javascript:void(0)"><i class="fi fi-rs-sign-out mr-10"></i>Sign
                                                out</a>
                                        </li>
                                        @endauth
                                        @guest
                                        <li>
                                            <a href="{{route('auth.login')}}"><i class="fi fi-rs-sign-in mr-10"></i>Sign
                                                in</a>
                                        </li>
                                        <li>
                                            <a href="{{route('auth.register')}}"><i class="fi fi-rs-add mr-10"></i>
                                                Register</a>
                                        </li>
                                        @endguest

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom d-lg-none header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('home') }}"><img src="/img/mavinsworld.png" alt="logo" /></a>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none white">
                    <svg class="mobile-menu-open " width="30" height="30" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16"></path>
                    </svg>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <svg width="30" height="30" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon white">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                <span class="cart-count pro-count white">{{ $cart->itemCount }}</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown cart-dropdown-hm2">
                                @include('frontend.partials._cart-dropdown')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('home') }}"><img src="/img/mavinsworld.png" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form method="GET" action="{{route('shop')}}">
                    <input type="text" name="s" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Shop</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('about')}}">About Us</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('about')}}">Contact Us</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Categories</a>
                            <ul class="dropdown">
                                @foreach ($categories as $category)
                                <li><a href="{{route('category.show', $category)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                </div>

                <div class="single-mobile-header-info">
                    @guest
                    <a href="{{route('auth.login')}}"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    @endguest
                    @auth
                    <a href="{{route('my-account')}}"><i class="fi-rs-user"></i>My Account</a>
                    @endauth
                </div>
                @auth
                <div class="single-mobile-header-info">
                    <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();"><i
                            class="fi-rs-sign-out"></i>Sign Out</a>
                </div>
                @endauth
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="/img/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="#"><img src="/img/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="#"><img src="/img/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="#"><img src="/img/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="#"><img src="/img/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2022 © Marvins World. All rights reserved. Powered by CodeWithKyrian.
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
