<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Product;
use App\Models\ShippingCost;
use App\Models\State;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = get_current_cart();
        $cart->items->load(['product.discount', 'product.media']);

        return view('frontend.pages.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        $cart = get_current_cart();

        if ($request->input('quantity') > $product->current_stock)  abort(404, 'OUT OF STOCK');

        $itemInCart = $cart->items->contains(function (CartItem $item, $key) {
            return $item->product_id == request()->product_id;
        });

        if ($itemInCart) {
            $cartItem = $cart->items->first(function (CartItem $item, $key) {
                return $item->product_id == request()->product_id;
            });

            $cartItem->quantity += (int) $request->quantity;

            $cartItem->save();
        } else {
            $cart->items->prepend(
                $cart->items()->create([
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
                ])
            );
        }

        return response()->json([
            'cart_view' => view('frontend.partials._cart-dropdown', compact('cart'))->render(),
            'cart_count' => $cart->itemCount
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $cart = get_current_cart();

        $cart->items->where('id', $request->item_id)->first()?->delete();
        $cart->items = $cart->items->reject(fn ($item) => $item->id == $request->item_id);

        return response()->json([
            'cart_view' => view('frontend.partials._cart-dropdown', compact('cart'))->render(),
            'cart_count' => $cart->item_count
        ]);
    }

    public function deleteFromCart(Request $request)
    {
        $cart = get_current_cart();

        $cart->items->where('id', $request->item_id)->first()?->delete();
        $cart->items = $cart->items->reject(fn ($item) => $item->id == $request->item_id);

        flash('Item removed from cart successfully')->success();
        return response()->json();
    }

    public function checkout()
    {
        $countries = Country::all();
        $cart = get_current_cart();

        $addresses = collect();
        if (auth()->check()) {
            $user = request()->user();
            $user->load('addresses');
            $addresses = $user->addresses;
            $default_address = $addresses->where('is_default', true)->first();
            $pickup_cost = $default_address->state->shipping_costs->where('pivot.type', 'pickup')->first();
            $delivery_cost = $default_address->state->shipping_costs->where('pivot.type', 'delivery')->first();
        }

        $cart->items->load(['product.discount', 'product.media']);
        return view('frontend.pages.checkout', compact('cart', 'countries', 'addresses'));
    }

    public function increaseItem(CartItem $item)
    {
        $item->quantity += 1;
        $item->save();

        $cart = get_current_cart();
        $cart->items->load(['product.discount', 'product.media']);

        return response()->json([
            'cart_view' => view('frontend.partials._cart-dropdown', compact('cart'))->render(),
            'cart_summary_view' => view('frontend.partials._cart-details', compact('cart'))->render(),
            'cart_count' => $cart->item_count
        ]);
    }

    public function decreaseItem(CartItem $item)
    {
        $item->quantity -= 1;
        $item->save();

        $cart = get_current_cart();
        $cart->items->load(['product.discount', 'product.media']);

        return response()->json([
            'cart_view' => view('frontend.partials._cart-dropdown', compact('cart'))->render(),
            'cart_summary_view' => view('frontend.partials._cart-details', compact('cart'))->render(),
            'cart_count' => $cart->item_count
        ]);
    }

    public function getShippingMethods(State $state)
    {
        $state->load('shipping_costs');

        $pickup_cost = $state->shipping_costs->where('pivot.type', 'pickup')->first();
        $delivery_cost = $state->shipping_costs->where('pivot.type', 'delivery')->first();

        return response()->json([
            'options' => view(
                'frontend.partials.checkout-shipping-method',
                compact('pickup_cost', 'delivery_cost')
            )->render()
        ]);
    }

    public function updateOrderSummary(ShippingCost $shippingCost)
    {
        $cart = get_current_cart();
        $cart->items->load(['product.discount', 'product.media']);
        return view('frontend.partials._checkout-order-summary', ['shipping_fee' => $shippingCost->amount, 'cart' => $cart]);
    }
}
