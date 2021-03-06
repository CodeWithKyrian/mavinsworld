<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\FlashDeal;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Notifications\ContactForm;
use Illuminate\Http\Request;
use Mail;
use Notification;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::with(['media', 'discount', 'category'])->featured()->limit(4)->get();

        $popular = Product::with(['media', 'discount', 'category'])->popular()->limit(8)->get();


        return view('frontend.pages.index', [
            'popular' => $popular,
            'featured' => $featured,
            'mediaLibrary' => media_library()
        ]);
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contactPost(Request $request)
    {
        $user = new User(['email' => 'marvinworld23@gmail.com']);

        Notification::route('mail', ['marvinworld23@gmail.com' => 'Marvins World Administrator'])
            ->notify(
                new ContactForm(
                    $request->name,
                    $request->email,
                    $request->phone,
                    $request->subject,
                    $request->message
                )
            );

        flash('Message Sent Successfully')->success();

        return redirect()->route('home');
    }

    public function gallery()
    {
        return view('frontend.pages.gallery');
    }
    public function shop(Request $request)
    {

        $products = Product::with(['media', 'discount', 'category'])
            ->search($request->input('s'))
            ->published()
            ->paginate(8);

        $categories = Category::withCount('products')->get();

        if ($request->ajax()) {
            return response()->json([
                'posts_view' => view('frontend.partials._shop-posts', compact('products'))->render()
            ]);
        }

        return view('frontend.pages.shop', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function category(Request $request, Category $category)
    {
        $category->products = Product::with(['media', 'discount'])
            ->search($request->input('s'))
            ->published()
            ->where('category_id', $category->id)
            ->paginate(8);

        $categories = Category::withCount('products')->get();

        return view('frontend.pages.category', [
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function product_details(Product $product)
    {
        $product->load(['media', 'category', 'discount']);
        $product->loadCount('reviews');
        $related = Product::with(['media', 'discount'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();


        redirect()->setIntendedUrl(route('product.details', $product));

        return view('frontend.pages.product_details', [
            'product' => $product,
            'related_products' => $related,
        ]);
    }

    public function getStates(Country $country)
    {
        $country->load(['states' => function ($query) {
            $query->where('shipping_cost_id', '!=', null);
        }]);

        return response()->json([
            'states_view' => view('frontend.partials._checkout-states', ['states' => $country->states])->render()
        ]);
    }

    public function terms()
    {
        $categories = Category::withCount('products')->get();
        return view('frontend.pages.terms', compact('categories'));
    }

    public function privacy_policy()
    {
        $categories = Category::withCount('products')->get();
        return view('frontend.pages.privacy-policy', compact('categories'));
    }
}
