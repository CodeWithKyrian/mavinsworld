<select name="shipping_cost_id" onchange="setShippingFee()" id="shipping-method-select" required class="form-control select-active">
    <option value="">Select Shipping Method...</option>
    @if ($pickup_cost != null)
        <option value="{{$pickup_cost->id}}">Pickup - {{ format_price($pickup_cost->amount) }}</option>
    @endif
    @if ($delivery_cost != null)
        <option value="{{$delivery_cost->id}}">Home Delivery - {{ format_price($delivery_cost->amount) }}</option>
    @endif
</select>

<script>
    $(".select-active").select2();

    function setShippingFee() {
        var cost_id = $('#shipping-method-select').val()

        $.get({
            url: route('cart.order-summary-update', cost_id),
            success: function(data) {
                $('#checkout-order-summary').html(data)
            },
            beforeSend: function() {
                $('#checkout-order-summary .loading-overlay').show()
            },
            complete: function() {
                $('#checkout-order-summary .loading-overlay').hide()
            }
        })
    }
</script>
