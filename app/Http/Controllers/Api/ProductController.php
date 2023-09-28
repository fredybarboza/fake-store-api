<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\StoreProductResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    
    public function index()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {  

        $product = new Product;

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        
        //$product->save();

        $imageUrls = [];

        //if($request->hasFile('imageFiles')) { $imageUrls[] = $this->storeImageFiles($request->file('imageFiles'), $product); }

        if($request->has('imageUrls')) { $imageUrls[] = $this->storeImageUrls($request->imageUrls, $product); }

        $imageUrls = Arr::collapse($imageUrls);

        $product->imageUrls = $imageUrls;

        return response()->json( new StoreProductResource($product), 201);
    }

    private function storeImageFiles(array $imageFiles, Product $product): array
    {

        $uploadedImageUrls = [];

        foreach($imageFiles as $image)
        {
            $imagePath = $image->store('uploads/products', 'public');

            $imageUrl = asset('storage/' . $imagePath);

            $product->images()->create(['image_url' => $imageUrl]);

            $uploadedImageUrls[] = $imageUrl;
        }

        return $uploadedImageUrls;

    }

    private function storeImageUrls(array $imageUrls, Product $product): array
    {
        $urls = [];

        foreach($imageUrls as $imageUrl)
        {
            //$product->images()->create(['image_url' => $imageUrl]);

            $urls[] = $imageUrl;
        }

        return $urls;
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
