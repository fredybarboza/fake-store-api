<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function store(StoreProductRequest $request)
    {
       //
    }

    public function storeWithImageFiles(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        if($validator->fails())
        {
            return response()->json(["errors" => $validator->errors()], 400);
        }

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description
        ]);

        $uploadedImages = [];

        foreach($request->file('images') as $image)
        {
            $imagePath = $image->store('uploads/products', 'public');

            $imageUrl = asset('storage/' . $imagePath);

            $product->images()->create(['image_url' => $imageUrl]);

            $uploadedImages[] = $imageUrl;
        }
    
        return response()->json(['product' => $product, 'images' => $uploadedImages], 201);
    }

    public function show(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
