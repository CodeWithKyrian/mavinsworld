<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Product $product)
    {
        $product->load('reviews');
        $reviews = $product->reviews;

        return response()->json([
            'reviews_view' => view('frontend.partials._product-reviews', compact('reviews'))->render()
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $product->reviews()->create([
            'user_id' => auth()->id(),
            'display_name' => $request->display_name,
            'rating' => $request->rating,
            'title' => $request->title,
            'content' => $request->content,
            'status' => true
        ]);

        $product->load('reviews');
        $product->evaluateReviews();
        $reviews = $product->reviews;

        return response()->json([
            'reviews_view' => view('frontend.partials._product-reviews', compact('reviews'))->render()
        ]);
    }

    public function update(Request $request, Product $product, Review $review)
    {
        $review->update([
            'display_name' => $request->display_name,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $product->load('reviews');
        $product->evaluateReviews();
        $reviews = $product->reviews;

        return response()->json([
            'reviews_view' => view('frontend.partials._product-reviews', compact('reviews'))->render()
        ]);
    }
}
