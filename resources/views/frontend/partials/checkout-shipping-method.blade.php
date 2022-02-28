<select name="shipping_method" onchange="setShippingFee()" id="shipping-method-select" required
    class="form-control select-active">
    <option value="">Select Shipping Method...</option>
    @if ($shipping_cost->pickup_amount != null)
        <option value="pickup">Pickup - {{ format_price($shipping_cost->pickup_amount) }}</option>
    @endif
    @if ($shipping_cost->delivery_amount != null)
        <option value="delivery">Home Delivery (Recommended) - {{ format_price($shipping_cost->delivery_amount) }}</option>
    @endif
</select>

<script>
    $(".select-active").select2();

    function setShippingFee() {
        var shipping_method = $('#shipping-method-select').val()
        var state_id = $('#state-select').val()

        $.post({
            url: route('cart.update-order-summary'),
            data: {
                _token: MARVINS.data.csrf,
                state_id: state_id,
                shipping_method: shipping_method
            },
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
