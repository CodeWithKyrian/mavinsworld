<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\UpdateOrderRequest;
use App\Mail\OrderCreated;
use App\Models\Address;
use App\Models\Cart;
use App\Models\ShippingCost;
use App\Models\State;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Mail;
use Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        if (auth()->check()) {

            $user = $request->user();
            $cart = Cart::with('items.product.discount')->find($request->cart_id);
            $state = State::find($request->state_id);

            if ($user->addresses()->exists()) {
                $address = Address::query()
                    ->where('user_id', $user->id)
                    ->whereRelation('state', 'id', '=', $request->state_id)
                    ->first();
            } else {
                $address = $user->addresses()->create([
                    'country_id' => $request->country_id,
                    'name' => $request->address,
                    'state_id' => $request->state_id,
                    'is_default' => true
                ]);
            }
        } else {

            $request->validate([
                'email' => ['unique:users', 'email']
            ]);

            $user = User::create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone' => $request->phone,
                'password' =>  Hash::make($request->password),
            ]);

            $address = $user->addresses()->create([
                'country_id' => $request->country_id,
                'name' => $request->address,
                'state_id' => $request->state_id,
                'is_default' => true
            ]);

            Auth::login($user);

            $cart = Cart::with('items.product.discount')->find($request->cart_id);

            $cart->user_id = $user->id;
            $cart->temp_user_id = null;
            $cart->save();

            $request->session()->regenerate();

            $state = State::find($request->state_id);
        }


        // By now, I should have four variables ready - $user, $address, $state and $cart

        $shipping_fee = get_shipping_fee($state, $request->shipping_method);

        $order =  $user->orders()->create([
            'code' =>  date('Ymds') . rand(10, 99),
            'address_id' => $address->id,
            'sub_total' => $cart->total,
            'shipping_fee' => $shipping_fee,
            'grand_total' => $cart->total + $shipping_fee,
            'shipping_method' => $request->shipping_method,
            'ordered_at' => now(),
        ]);

        foreach ($cart->items as $item) {
            $unit_price = get_sell_price($item->product, false);
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $unit_price,
                'total_price' => $unit_price * $item->quantity
            ]);
        }

        $cart->delete();

        return $order;
    }

    public function checkout(Request $request)
    {
        $order = $this->store($request);
        return $this->pay($order);
    }

    public function pay(Order $order)
    {
        $order->load('user');
        $secretKey = config('paystack.secret_key');
        $baseUrl = config('paystack.payment_url');

        $data = [
            "amount" => $order->grand_total * 100,
            "reference" => Str::uuid(),
            "email" => $order->user->email,
            "first_name" => $order->user->firstname,
            "last_name" => $order->user->lastname,
            "callback_url" => route('order.payment.callback'),
            "currency" => 'NGN',
            "metadata" => [
                "order_id" => $order->id,
                "cancel_action" =>  route('order.payment.cancelled', $order)
            ]
        ];

        try {
            $response = Http::acceptJson()
                ->withToken($secretKey)
                ->baseUrl($baseUrl)
                ->post('/transaction/initialize', $data)
                ->json();
        } catch (\Exception $exp) {
            flash('Something went wrong. Please try again!')->error();
            return redirect()
                ->back();
        }



        $redirectUrl = $response['data']['authorization_url'];

        return redirect()->away($redirectUrl);
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function callback()
    {
        $transactionRef = request()->query('trxref');

        $response = Http::acceptJson()
            ->withToken(config('paystack.secret_key'))
            ->baseUrl(config('paystack.payment_url'))
            ->get("/transaction/verify/{$transactionRef}")
            ->json();

        if ($response['data']['status'] != "success") {
            return redirect()->back();
        }

        if ($response['message'] == "Verification successful" && $response['data']['status'] == "success") {
            $data = $response['data'];

            $order_id = $data['metadata']['order_id'];

            $order = Order::find($order_id);

            $order->paid_at = $data['paid_at'];

            $order->transaction()->updateOrCreate(
                ['order_id' => $order->id],
                [
                    'amount' => $order->grand_total,
                    'confirmed' => true,
                    'meta' => [
                        'channel' => $data['channel'],
                        'ip_address' => $data['ip_address']
                    ],
                    'reference' => $data['reference']
                ]
            );

            $order->save();

            $order->load('user');

            Mail::to($order->user)->send(new OrderCreated($order));
            
        } else {
            session()->flash('flash_notification', [
                'message' => 'Payment Error',
                'level' => 'success'
            ]);
            return redirect()->route('home');
        }

        $order->load(['items', 'address']);
        $order->items->load(['product.media', 'product.category']);
        $order->address->load(['state', 'country']);

        return view('frontend.pages.order-complete', compact('order'));
    }

    public function cancelled(Order $order)
    {
        flash('Payment Cancelled. Try again!')->error();
        return redirect()
            ->route('account.orders.show', $order);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
