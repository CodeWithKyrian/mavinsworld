<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with('product');
        if ($request->has('p'))
            $query->where('product_id', $request->p);

        $reviews = $query->latest()->paginate(15);
        $products = Product::all();

        return view('admin.reviews.index', compact('reviews', 'products'));
    }

    public function destroy(Review $review)
    {
       $review->delete();

       flash('Review Deleted Successfully')->success();
       return response()->json();
    }
}
