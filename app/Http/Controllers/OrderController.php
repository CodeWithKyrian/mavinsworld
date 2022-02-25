<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\ShippingCost;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
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
    public function store(Request $request): Order
    {
        if (auth()->check()) {

            $user = $request->user();

            if ($user->addresses()->exists()) {
                $address = Address::find($request->address_id);
            } else {
                $address = $user->addresses()->create([
                    'country_id' => $request->country_id,
                    'address' => $request->address,
                    'state_id' => $request->state_id,
                    'is_default' => true
                ]);
            }
        } else {
            $user = User::create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone' => $request->phone,
                'password' =>  $request->input('password') != null ? Hash::make($request->password) : null,
            ]);

            $address = $user->addresses()->create([
                'country_id' => $request->country_id,
                'address' => $request->address,
                'state_id' => $request->state_id,
                'is_default' => true
            ]);
        }

        $cart = Cart::with('items.product.discount')->find($request->cart_id);

        $shipping_cost = ShippingCost::with(['states' => function ($query) use ($address) {
            return $query->where('state_id', $address->state_id);
        }])->find($request->shipping_cost_id);

        $shipping_fee = $shipping_cost->amount;

        $order =  $user->orders()->create([
            'code' =>  date('Ymd-s') . rand(10, 99),
            'address_id' => $address->id,
            'sub_total' => $cart->total,
            'shipping_fee' => $shipping_fee,
            'grand_total' => $cart->total + $shipping_fee,
            'shipping_method' => $shipping_cost->states->first()->pivot->type,
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
        DB::beginTransaction();

        $order = $this->store($request);

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
            DB::rollBack();
            flash('Something went wrong. Please try again!')->error();
            return redirect()
                ->back();
        }

        $redirectUrl = $response['data']['authorization_url'];
        DB::commit();
        session()->forget('temp_user_id');

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

            $order->paid_at = now();

            $order->transaction()->create([
                'amount' => $order->grand_total,
                'confirmed' => true,
                'meta' => [
                    'channel' => $data['channel'],
                    'ip_address' => $data['ip_address']
                ],
                'reference' => $data['reference']
            ]);

            $order->save();
            dd($order);
        } else {
            session()->flash('flash_notification', [
                'message' => 'Payment Cancelled',
                'level' => 'success'
            ]);
            return redirect()->route('home');
        }

        return view('payment-complete');
    }

    public function cancelled(Order $order)
    {
        $order->delete();

        flash('Payment Cancelled. Try again!')->error();
        return redirect()
            ->route('cart.index');
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
