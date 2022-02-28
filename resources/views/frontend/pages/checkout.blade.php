<x-app-layout title="Checkout">
    <section class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span><a href="{{ route('cart.index') }}" rel="nofollow">Cart</a>
                <span></span> Checkout
            </div>
        </div>
    </section>
    <section class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">{{ $cart->item_count }}</span>
                        products in your cart
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    @guest
                        <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Returning
                                        Customer?</span> <a href="#loginform" data-bs-toggle="collapse"
                                        class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                            </div>
                            <div class="panel-collapse collapse login_form" id="loginform">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have shopped with us before, please enter your
                                        details
                                        below. If you are a new customer, please proceed to the Billing &amp; Shipping
                                        section.</p>
                                    <form method="post" action="{{ route('auth.login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder=" Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                                        id="remember" value="">
                                                    <label class="form-check-label" for="remember"><span>Remember
                                                            me</span></label>
                                                </div>
                                            </div>
                                            <a href="#">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-md" name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                    <div class="col-lg-6 d-none">
                        <form method="post" class="apply-coupon">
                            <input type="text" placeholder="Enter Coupon Code...">
                            <button class="btn  btn-md" name="login">Apply Coupon</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form action="{{ route('order.checkout') }}" id="checkout-form" method="POST">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">

                        @guest
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="firstname" placeholder="First name *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="lastname" placeholder="Last name *" required>
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-md-6">
                                    <input type="text" name="address" placeholder="Address *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom_select">
                                        <select onchange="setStates()" id="country-select" name="country_id" required
                                            class="form-control select-active">
                                            <option value="" selected>Select country...</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom_select" id="state_select">
                                        <select name="state" class="form-control select-active" required>
                                            <option value="">Select state...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom_select" id="method_select">
                                        <select name="shipping_cost_id" class="form-control select-active" required>
                                            <option value="">Select Shipping Method...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" placeholder="Email address *" required>
                                    @error('email')
                                        <p class="font-sm text-red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="phone" placeholder="Phone *" required>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" name="additional_info" placeholder="Additional information"></textarea>
                            </div>
                            <div class="row mb-15">
                                <div class="col-lg-6">
                                    <input type="password" required placeholder="Password" name="password">
                                </div>
                            </div>
                        @endguest

                        @auth
                            @if ($addresses->count())
                                <div class="row shipping_calculator">
                                    <input type="hidden" autocomplete="off" name="address_id" id="address_id">
                                    <div class="form-group col-md-6">
                                        <div class="custom_select">
                                            <select onchange="setShippingCosts(this);setCountryId(this)" id="state-select"
                                                name="state_id" required autocomplete="off"
                                                class="form-control select-active">
                                                <option value="" selected disabled>Select Shipping Address...</option>
                                                @foreach ($addresses as $address)
                                                    <option value="{{ $address->state->id }}"
                                                        data-address-id="{{ $address->id }}">
                                                        {{ $address->state->name }},
                                                        {{ $address->country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="custom_select" id="method_select">
                                            <select name="shipping_cost_id" class="form-control  select-active" required>
                                                <option value="">Select Shipping Method...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row shipping_calculator">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="address" placeholder="Address *" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="custom_select">
                                            <select onchange="setStates()" id="country-select" name="country_id" required
                                                class="form-control select-active">
                                                <option value="" selected>Select country...</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="custom_select" id="state_select">
                                            <select name="state" class="form-control select-active" required>
                                                <option value="">Select state...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="custom_select" id="method_select">
                                            <select name="shipping_cost_id" class="form-control select-active" required>
                                                <option value="">Select Shipping Method...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-30">
                                    <textarea rows="5" name="additional_info"
                                        placeholder="Additional information"></textarea>
                                </div>
                            @endif
                        @endauth

                        <button id="checkout-form-submit" type="submit" style="display: none">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5" id="checkout-order-summary">
                @include('frontend.partials._checkout-order-summary')
            </div>
        </div>
    </section>

    @push('inline-scripts')
        <script>
            @guest
                setStates()
            @endguest
            @auth
                @if (!$addresses->count())
                    setStates()
                @endif
            @endauth

            var methodSelectDefault = $('#method_select').html()

            function setStates() {
                var country_id = $('#country-select').val()

                if (country_id != null) {
                    $.get({
                        url: route('states.get', country_id),
                        success: function(data) {
                            $('#state_select').html(data.states_view)
                            $('#method_select').html(data.options)
                        },
                        complete: function() {
                            $('#method_select').html(methodSelectDefault)
                        }
                    })
                }
            }

            function setShippingCosts(element) {

                var state_id = $(element).val()

                $.post({
                    url: route('cart.get_shipping_methods', state_id),
                    data: {
                        _token: MARVINS.data.csrf
                    },
                    success: function(data) {
                        $('#method_select').html(data.options)
                    }
                })
            }

            function setCountryId(element) {
                var address_id = $('option:selected', element).data('address-id')
                $('#address_id').val(address_id)
            }
        </script>
    @endpush

</x-app-layout>
