<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function dashboard()
    {
        return view('frontend.pages.my-dashboard');
    }

    public function orders()
    {
        $user = request()->user();

        $orders = Order::with('items')->where('user_id', $user->id)->latest()->paginate(10);

        return view('frontend.pages.my-orders', compact('orders'));
    }

    public function viewOrder(Order $order)
    {
        $order->load(['items', 'address']);
        $order->address->load(['state', 'country']);
        $order->items->load(['product.media', 'product.category']);

        return view('frontend.pages.view-order', compact('order'));
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();

        flash('Order deleted successfully')->success();

        return redirect()->route('account.orders.index');
    }

    public function trackOrder()
    {
        return view('frontend.pages.track-order');
    }

    public function account_details()
    {
        $user = request()->user();

        return view('frontend.pages.account-details', compact('user'));
    }

    public function update_details(Request $request)
    {
        $user = $request->user();

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        flash('Account Details updated successfully')->success();

        return redirect()->route('account.dashboard');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Password::min(6)]
        ]);
        
        $user = $request->user();

        $user->password =  Hash::make($request->new_password);

        flash('Account Password updated successfully')->success();

        return redirect()->route('account.dashboard');
    }
}
