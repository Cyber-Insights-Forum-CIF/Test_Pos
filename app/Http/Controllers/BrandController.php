<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandDetailResource;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::latest("id")->paginate(5)->withQueryString();
        return new BrandResource($brand);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'information' => 'required',
            'photos' => 'required',

        ]);
        $brands = Brand::create([
            'name' => $request->get('name'),
            'company' => $request->get('company'),
            'information' => $request->get('information'),
            'photos' => $request->get('photos'),
        ]);
        return new BrandDetailResource($brands);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brands = Brand::find($brand);
         if(is_null($brands)){
             return response()->json([

                 "message" => "Brand not found",

             ],404);
         };
         return new BrandDetailResource($brands);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $request->validate([
            "name" => "nullable|min:3|max:20",
            "company" => "nullable|integer|min:1|max:265",
            "information" => "nullable|min:7|max:15",
            'photos' => "'required|mimes:jpeg,png,jpg,gif"
        ]);
        $brands = Brand::find($brand);
        if(is_null($brands)){
            return response()->json([

                "message" => "Brand not found",

            ],404);
        };
        if($request->has('name')){
            $brands->name = $request->name;
        }
        if($request->has('company')){
            $brands->country_code = $request->company;
        }
        if($request->has('information')){
            $brands->phone_number = $request->information;
        }
        if($request->has('photos')){
            $brands->phone_number = $request->photos;
        }
        $brands->update();

        return new BrandDetailResource($brands);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brands = Brand::find($brand);
        if(is_null($brands)){
            return response()->json([

                "message" => "brand not found",

            ],404);
        }
        $brands->delete();
        // return response()->json([],204);
        return response()->json([
            "message" => "Brand is deleted",
        ]);
    }
}
