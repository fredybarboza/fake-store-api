<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\IndexProductRequest;
use App\Http\Requests\Api\StoreProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\IndexProductCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductPaginatedCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\StoreProductResource;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Faker\Core\Number;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class ProductController extends Controller
{
    
    public function index(IndexProductRequest $request)
    {
        $name = $request->query('name');

        $categoryId = $request->query('category_id');

        $priceMin = $request->query('price_min');

        $priceMax = $request->query('price_max');

        $pagination = $request->query('pagination', false);

        $perPage = $request->query('per_page', 10);

        $productsQuery = Product::query()
            ->when($name, function ($query, $name) { $query->where('name', 'LIKE', '%' . $name . '%'); })
            ->when($categoryId, function ($query, $categoryId) { $query->where('category_id', $categoryId); })
            ->when($priceMin, function ($query, $priceMin) { $query->where('price', '>=', $priceMin); })
            ->when($priceMax, function ($query, $priceMax) { $query->where('price', '<=', $priceMax); })
            ->with(['category:id,name', 'images:product_id,image_url']);

        if($pagination)
        {
            $products = $productsQuery->paginate($perPage);

            return response()->json( new ProductPaginatedCollection($products), 200);
        }

        $products = $productsQuery->get();

        return response()->json( new ProductCollection($products), 200);   
        
    }

    public function store(StoreProductRequest $request)
    {  

        $product = new Product;

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        
        $product->save();

        $imageUrls = [];

        if($request->hasFile('imageFiles')) { $imageUrls[] = $this->storeImageFiles($request->file('imageFiles'), $product); }

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

            //$product->images()->create(['image_url' => $imageUrl]);

            $uploadedImageUrls[] = $imageUrl;

            $imageData[] = ['image_url' => $imageUrl, 'product_id' => $product->id];
        }

        Image::insert($imageData);

        return $uploadedImageUrls;

    }

    private function storeImageUrls(array $imageUrls, Product $product): array
    {
        $urls = [];

        foreach($imageUrls as $imageUrl)
        {
            //$product->images()->create(['image_url' => $imageUrl]);

            $urls[] = $imageUrl;

            $imageData[] = ['image_url' => $imageUrl, 'product_id' => $product->id];
        }

        Image::insert($imageData);

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
