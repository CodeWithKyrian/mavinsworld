<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category', 'media'])->latest()->paginate(8);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->sell_price,
            'unit' => 'capsules',
            'total_stock' => 50,
            'current_stock' => 50,
            'is_published' => $request->should_publish,
            'is_featured' => $request->boolean('is_featured'),
            'is_popular' => $request->boolean('is_popular'),
            'rating' => 4.5
        ]);

        $product->save();

        if ($request->boolean('has_discount')) {
            $product->discount()->create(
                ['value' => $request->discount_amount, 'type' => $request->discount_type]
            );
        }

        $product->details()->create([
            'description' => $request->description,
            'meta_description' => $request->meta_description,
        ]);

        $product->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');

        flash('Product Added Successfully')->success();

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load(['details', 'discount']);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->product_name,
            'slug' => Str::slug($request->product_name),
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->sell_price,
            'is_published' => $request->should_publish,
            'is_featured' => $request->boolean('is_featured'),
            'is_popular' => $request->boolean('is_popular'),
        ]);

        $product->details()->updateOrCreate(
            ['product_id' => $product->id],
            ['description' => $request->description, 'meta_description' => $request->meta_description]
        );

        if ($request->boolean('has_discount')) {
            $product->discount()->updateOrCreate(
                ['product_id' => $product->id],
                ['value' => $request->discount_amount, 'type' => $request->discount_type]
            );
        }

        if ($request->hasFile('thumbnail')) {
            $product->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }

        flash('Product Updated Successfully')->success();

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->media()->delete();
        $product->delete();

        return $product;
    }
}
