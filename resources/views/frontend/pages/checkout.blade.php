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
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form action="{{ route('order.checkout') }}" id="checkout-form" method="POST">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="firstname" value="{{ old('firstname') }}"
                                    placeholder="First name *" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="lastname" value="{{ old('lastname') }}"
                                    placeholder="Last name *" required>
                            </div>
                        </div>
                        <div class="row shipping_calculator">
                            <div class="form-group col-md-6">
                                <input type="text" name="address" value="{{ old('address') }}" placeholder="Address *" required>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom_select">
                                    <select onchange="setStates()" id="country-select" name="country_id" required
                                        class="form-control select-active">
                                        <option value="" selected>Select country...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @selected(old('country_id')== $country-> id)>{{ $country->name }}</option>
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
                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="Email address *" required>
                                @error('email')
                                    <p class="font-sm text-red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone *"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" name="additional_info" placeholder="Additional information">{{ old('additional_info') }}</textarea>
                        </div>
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
            setStates()

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
