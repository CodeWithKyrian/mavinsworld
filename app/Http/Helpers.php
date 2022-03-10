<?php

use App\Models\Cart;
use App\Models\GeneralSettings;
use App\Models\MediaLibrary;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

if (!function_exists('format_price')) {
    function format_price($price)
    {
        $formated_price = number_format($price, 0);
        return "₦" . $formated_price;
    }
}

if (!function_exists('get_cost_price')) {
    function get_cost_price(Product $product, bool $formatPrice = true)
    {
        $cost_price = $product->cost_price;
        return $formatPrice ? format_price($cost_price) : $cost_price;
    }
}

//Shows Price on page based on low to high with discount
if (!function_exists('get_sell_price')) {
    function get_sell_price(Product $product, bool $formatPrice = true)
    {
        if (!$product->hasPromoPrice())
            return $formatPrice ? format_price($product->cost_price) : $product->cost_price;


        $cost_price = $product->cost_price;
        $sell_price = $product->selling_price;

        if ($product->hasDiscount()) {
            if ($product->discount->type == 'percent')
                $sell_price = $cost_price * (100 - $product->discount->value) / 100;
            else
                $sell_price = $cost_price - $product->discount->value;
        }

        return $formatPrice ? format_price($sell_price) : $sell_price;
    }
}

if (!function_exists('calc_percentage_off')) {
    function calc_percentage_off(Product $product)
    {
        $cost_price = $product->cost_price;
        $sell_price = get_sell_price($product, false);

        return round(($cost_price - $sell_price) / $cost_price * 100);
    }
}

/**Get the current cart for the  temporary user */
if (!function_exists('get_current_cart')) {
    function get_current_cart(): Cart
    {
        if (request()->session()->has('temp_user_id')) {
            $temp_user_id = request()->session()->get('temp_user_id');
        } else {
            $temp_user_id = bin2hex(random_bytes(10));
            request()->session()->put('temp_user_id', $temp_user_id);
        }
        $cart = Cart::with('items')
            ->firstOrCreate(['temp_user_id' => $temp_user_id]);

        return $cart;
    }
}
if (!function_exists('carbon')) {
    function carbon(string $parseString = '', string $tz = null): Carbon
    {
        return new Carbon($parseString, $tz);
    }
}

if (!function_exists('media_library')) {
    function media_library(): MediaLibrary
    {
        return MediaLibrary::with('media')->first();
    }
}

if (!function_exists('get_shipping_fee')) {
    function get_shipping_fee($state, $method): float
    {
        $state->load('shipping_cost');

        if ($method == 'pickup')
            return $state->shipping_cost->pickup_amount;
        else
            return $state->shipping_cost->delivery_amount;
    }
}
