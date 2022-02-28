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
                                <a href="{{route('cart.index')}}"><span class="lable">Cart</span></a>
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
                                            <a href="{{route('account.dashboard')}}"><i class="fi fi-rs-user mr-10"></i>My
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
                    <a href="{{route('account.dashboard')}}"><i class="fi-rs-user"></i>My Account</a>
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

<a href="https://api.whatsapp.com/send?phone=2347019906126&text=Hello Marvins! I just came from your website and my name is" target="_blank" class="whatsapp-button">
    <svg enable-background="new 0 0 30.667 30.667" version="1.1" viewBox="0 0 30.667 30.667" xmlns="http://www.w3.org/2000/svg">
        <path d="m30.667 14.939c0 8.25-6.74 14.938-15.056 14.938-2.639 0-5.118-0.675-7.276-1.857l-8.335 2.647 2.717-8.017c-1.37-2.25-2.159-4.892-2.159-7.712 1e-3 -8.25 6.739-14.938 15.055-14.938 8.315 2e-3 15.054 6.689 15.054 14.939zm-15.057-12.557c-6.979 0-12.656 5.634-12.656 12.56 0 2.748 0.896 5.292 2.411 7.362l-1.58 4.663 4.862-1.545c2 1.312 4.393 2.076 6.963 2.076 6.979 0 12.658-5.633 12.658-12.559 2e-3 -6.923-5.678-12.557-12.658-12.557zm7.604 15.998c-0.094-0.151-0.34-0.243-0.708-0.427-0.367-0.184-2.184-1.069-2.521-1.189-0.34-0.123-0.586-0.185-0.832 0.182-0.243 0.367-0.951 1.191-1.168 1.437-0.215 0.245-0.43 0.276-0.799 0.095-0.369-0.186-1.559-0.57-2.969-1.817-1.097-0.972-1.838-2.169-2.052-2.536-0.217-0.366-0.022-0.564 0.161-0.746 0.165-0.165 0.369-0.428 0.554-0.643 0.185-0.213 0.246-0.364 0.369-0.609 0.121-0.245 0.06-0.458-0.031-0.643-0.092-0.184-0.829-1.984-1.138-2.717-0.307-0.732-0.614-0.611-0.83-0.611-0.215 0-0.461-0.03-0.707-0.03s-0.646 0.089-0.983 0.456-1.291 1.252-1.291 3.054c0 1.804 1.321 3.543 1.506 3.787 0.186 0.243 2.554 4.062 6.305 5.528 3.753 1.465 3.753 0.976 4.429 0.914 0.678-0.062 2.184-0.885 2.49-1.739 0.308-0.858 0.308-1.593 0.215-1.746z"/>
       </svg>
</a>
