<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $category_count = Category::count();
        $revenue = Transaction::sum('amount');
        $monthly_earning = Transaction::lastMonth()->sum('amount');
        $order_count = Order::count();
        return view('admin.dashboard', compact('product_count', 'category_count', 'revenue', 'monthly_earning', 'order_count'));
    }
}
