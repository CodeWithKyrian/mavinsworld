@php
    $shipping_fee = $shipping_fee ?? 0
@endphp

<div class="border cart-totals ml-30 mb-50 position-relative">
    <div class="loading-overlay" style="display: none">
        <div class="spinner-border" style="width: 20px;height:20px;" id="loading"
        role="status"></div>
    </div>
    <div class="d-flex align-items-end justify-content-between mb-30">
        <h4>Your Order</h4>
        <h6 class="text-muted">Subtotal</h6>
    </div>
    <div class="divider-2 mb-30"></div>
    <div class="table-responsive order_table checkout">
        <table class="table no-border">
            <tbody>
                @foreach ($cart->items as $item)
                    <tr>
                        <td class="pt-2 pb-2">
                            <h6 class="mb-5" style="font-size: 14px">
                                <a href="{{route('product.details', $item->product)}}"
                                    class="text-heading">{{ $item->product->name }}</a>
                            </h6>
                        </td>
                        <td class="white-space-nowrap">
                            <h6 class="text-muted pl-20 pr-20">x {{ $item->quantity }}</h6>
                        </td>
                        <td style="text-align: right">
                            <h6 class="text-brand">{{ get_sell_price($item->product) }}</h6>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td scope="col" colspan="3">
                            <div class="divider-2"></div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="pt-2 pb-2">
                        <h6 class="mb-5 text-heading" style="font-size: 14px">SubTotal</h6>
                    </td>
                    <td class="white-space-nowrap">
                        <h6 class="text-muted pl-20 pr-20"></h6>
                    </td>
                    <td style="text-align: right">
                        <h6 class="text-brand">{{ format_price($cart->total) }}</h6>
                    </td>
                </tr>
                <tr>
                    <td class="pt-2 pb-2">
                        <h6 class="mb-5" style="font-size: 14px">
                            <h6 class="mb-5 text-heading" style="font-size: 14px">Shipping</h6>
                        </h6>
                    </td>
                    <td class="white-space-nowrap">
                        <h6 class="text-muted pl-20 pr-20"></h6>
                    </td>
                    <td style="text-align: right">
                        <h6 class="text-brand">{{ $shipping_fee? format_price($shipping_fee) : 'Calculating...' }}</h6>
                    </td>
                </tr>
                <tr style="height: 2px">
                    <td scope="col" colspan="3">
                        <div class="divider-2"></div>
                    </td>
                </tr>
                <tr>
                    <td class="pt-2 pb-2">
                        <h6 class="mb-5 text-heading">Total</h6>
                    </td>
                    <td class="white-space-nowrap">
                        <h6 class="text-muted pl-20 pr-20"></h6>
                    </td>
                    <td style="text-align: right">
                        <h6 class="text-brand text-heading">{{ format_price($cart->total + $shipping_fee) }}</h6>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="payment ml-30">
    <h4 class="mb-30">Payment</h4>
    <div class="payment_option">
        <div class="custome-radio">
            <input class="form-check-input" required="" type="radio" name="payment_option"
                id="exampleRadios5" checked="">
            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                data-target="#paypal" aria-controls="paypal">Online Getway</label>
        </div>
    </div>
    <div class="payment-logo d-flex">
        <img class="mr-15" src="img/theme/icons/payment-paypal.svg" alt="">
        <img class="mr-15" src="img/theme/icons/payment-visa.svg" alt="">
        <img class="mr-15" src="img/theme/icons/payment-master.svg" alt="">
        <img src="img/theme/icons/payment-zapper.svg" alt="">
    </div>
    <button type="button" class="btn btn-fill-out btn-block mt-30" @if ($cart->total == 0) disabled  @endif onclick="$('#checkout-form-submit').trigger('click')">
        Place an Order
        <i class="fi-rs-sign-out ml-15"></i>
    </button>
</div>

<script>
    $('.loading-overlay').hide()
</script>

