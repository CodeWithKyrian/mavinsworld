<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::with('user')
            ->search($request->input('s'))
            ->latest()
            ->paginate(10);
            
        return view('admin.order.index', compact('orders'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load(['user', 'address', 'transaction', 'items.product.media']);
        $order->address?->load(['country', 'state']);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Order $order)
    {
        $status = $request->new_status;

        switch ($status) {
            case 'paid':
                $order->paid_at = now();
                break;
            case 'dispatched':
                $order->dispatched_at = now();
                break;
            case 'delivered':
                $order->delivered_at = now();
            default:
                break;
        }

        $order->save();

        flash('Order Status Updated Successfully')->success();

        return redirect()->route('admin.order.show', $order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
