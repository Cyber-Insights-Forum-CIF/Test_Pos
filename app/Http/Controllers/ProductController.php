<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest("id")->paginate(5)->withQueryString();
        return new ProductResource($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'actual_price' => 'required',
            'sale_price' => 'required',
            'total_stock' => 'required',
            'unit' => 'required',
            'more_information' => 'required',
            'user_id' => 'required',
            'photos' => 'required',
        ]);
        $products = Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'actual_price' => $request->actual_price,
            'sale_price' => $request->sale_price,
            'total_stock' => $request->total_stock,
            'unit' => $request->unit,
            'more_information' =>$request->more_information,
            'user_id' => $request->user_id,
            'photos' => $request->photos,
        ]);
        return new ProductDetailResource($products);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $products = Product::find($product);
        if(is_null($products)){
            return response()->json([
                // "success" => false,
                "message" => "Contact not found",

            ],404);
        }

        // return response()->json([
        //     "data" => $contact
        // ]);
        return new ProductDetailResource($products);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product);
        if(is_null($product)){
            return response()->json([
                // "success" => false,
                "message" => "product not found",

            ],404);
        }
        $product->delete();

        // return response()->json([],204);
        return response()->json([
            "message" => "product is deleted",
        ]);
    }
}
