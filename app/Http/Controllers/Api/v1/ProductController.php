<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\IndexProductRequest;
use App\Http\Requests\Api\v1\StoreProductRequest;
use App\Http\Requests\Api\v1\UpdateProductRequest;
use App\Http\Resources\v1\ProductPaginatedCollection;
use App\Http\Resources\v1\ProductResource;
use App\Http\Resources\v1\StoreProductResource;
use App\Http\Resources\v1\UpdatedProductResource;
use App\Models\Image;
use App\Models\Product;
use App\Traits\ImageTrait;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    use ImageTrait;

    /**
     * Display a paginated list of products based on request parameters.
     */
    public function index(IndexProductRequest $request)
    {
        $name = $request->query('name');

        $categoryId = $request->query('category_id');

        $priceMin = $request->query('price_min');

        $priceMax = $request->query('price_max');

        $productsQuery = Product::query()
            ->when($name, function ($query, $name) {
                $query->where('name', 'LIKE', '%'.$name.'%');
            })
            ->when($categoryId, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($priceMin, function ($query, $priceMin) {
                $query->where('price', '>=', $priceMin);
            })
            ->when($priceMax, function ($query, $priceMax) {
                $query->where('price', '<=', $priceMax);
            })
            ->with(['category:id,name', 'images:product_id,image_url']);

        $products = $productsQuery->paginate(10);

        return response()->json(new ProductPaginatedCollection($products), 200);

    }

    /**
     * Store a new product based on the given request data.
     */
    public function store(StoreProductRequest $request)
    {

        $product = new Product;

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        $imageUrls = [];

        $imageUrls[] = $request->imageUrls;

        if ($request->hasFile('imageFiles')) {
            $imageUrls[] = $this->storeImageFiles($request->file('imageFiles'));
        }

        $imageUrls = Arr::collapse($imageUrls);

        Image::insert($this->getImagesWithId($imageUrls, $product->id));

        $product->imageUrls = $imageUrls;

        return response()->json(new StoreProductResource($product), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (! is_numeric($id)) {
            return response()->json(['message' => 'The id must be numeric'], 400);
        }

        $product = Product::with(['category:id,name', 'images:product_id,image_url'])->find($id);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json(new ProductResource($product), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        if (! is_numeric($id)) {
            return response()->json(['message' => 'The id must be numeric'], 400);
        }

        $product = Product::with('images:product_id,image_url')->find($id);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($request->has('name')) {
            $product->name = $request->name;
        }
        if ($request->has('category_id')) {
            $product->category_id = $request->category_id;
        }
        if ($request->has('price')) {
            $product->price = $request->price;
        }
        if ($request->has('description')) {
            $product->description = $request->description;
        }

        $product->save();

        $request->has('imageUrls')
            ? $product->images = $request->imageUrls
            : $product->images = $product->images->pluck('image_url');

        return response()->json(new UpdatedProductResource($product), 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productExists = Product::where('id', $id)->exists();

        if (! is_numeric($id)) {
            return response()->json(['message' => 'The id must be numeric'], 400);
        }
        if (! $productExists) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        Product::destroy($id);

        return response()->json([
            'message' => 'Product deleted',
            'product_id' => $id,
        ], 200);

    }
}
