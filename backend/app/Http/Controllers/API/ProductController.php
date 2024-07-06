<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollectionResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(private Product $product)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  ProductResource::collection($this->product->latest()->with('categories')->paginate(5));

        // ->map(function($product){
        //     $product->append('price_float');
        //     return $product;
        // });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if (!$request->user()->tokenCan('server:store')) abort(401, 'Unauthorized');
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product->load('categories'));
        // return $product->with('categories')->first();
        // return $product->load('categories');
        // return $product->with('categories')->find($product->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $product->name;
    }
}
