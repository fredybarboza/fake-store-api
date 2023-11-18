<?php

namespace Tests\Feature\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;


class ProductControllerTest extends TestCase
{

    public function testIndexReturnsDataInValidFormat(): void
    {
        $response = $this->getJson('/api/v1/products');

        $response->assertStatus(200)->assertJsonStructure(
        [
            'current_page',
            'total_pages',
            'products_per_page',
            'total_products',
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'price',
                    'category' => [
                        'id',
                        'name',
                    ],
                    'images'
                ]
            ]
        ]);
    }

    /** @test */
    public function testProductIsCreatedSuccessfully(): void
    {
        
        Storage::fake('public');

        $image = UploadedFile::fake()->image('product.jpg');

        $product = [
            'name' => fake()->name,
            'price' => fake()->randomFloat(2,15),
            'description' => fake()->text(),
            'category_id' => Category::all()->random()->id
        ];  

        $payload = $product + ['imageFiles' => [$image]];

        $response = $this->postJson('/api/v1/products', $payload);

        $response->assertStatus(201)->assertJsonStructure([
            'id',
            'name',
            'price',
            'category' => [
                'id',
                'name'
            ],
            'images'
        ]);

        $this->assertDatabaseHas('products', $product);

        
        $publicDisk = Storage::disk('public');

        /** @var \Illuminate\Filesystem\Filesystem $publicDisk*/
        $publicDisk->assertExists('uploads/products/' . $image->hashName());
        
        
    }

    public function testProductIsShownCorrectly(): void
    {

        $product = Product::create([
            'name' => fake()->text(),
            'price' => fake()->randomFloat(2,10),
            'description' => fake()->text(),
            'category_id' => Category::all()->random()->id
        ]);

        Image::create([
            'product_id' => $product->id,
            'image_url' => fake()->url()
        ]);

        $response = $this->getJson('/api/v1/products/' . $product->id);

        $response->assertStatus(200)->assertExactJson([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'category' => [
                'id' => $product->category->id,
                'name' => $product->category->name
            ],
            'images' => $product->images->pluck('image_url')->toArray()
        ]);
    }

    public function testProductIsDestroyed()
    {

        $productData = [
            'name' => fake()->text(),
            'price' => fake()->randomFloat(2,10),
            'category_id' => Category::all()->random()->id,
            'description' => fake()->text(),
        ];

        $product = Product::create(
            $productData
        );

        $response = $this->deleteJson('/api/v1/products/' . $product->id);

        $response->assertStatus(200)->assertExactJson([
            'message' => 'Product deleted',
            'product_id' => strval($product->id)
        ]);

        $this->assertDatabaseMissing('products', $productData);

    }

    public function testProductIsUpdated(){

        $product = Product::create([
            'name' => fake()->text(),
            'price' => fake()->randomFloat(2,10),
            'description' => fake()->text(),
            'category_id' => Category::all()->random()->id
        ]);

        Image::create([
            'product_id' => $product->id,
            'image_url' => fake()->url()
        ]);

        $payload = [
            'name' => fake()->text(),
            'price' => fake()->randomFloat(2,10),
        ];

        $response = $this->putJson('/api/v1/products/' . $product->id, $payload);

        $response->assertStatus(200)->assertExactJson([
            'id' => $product->id,
            'name' => $payload['name'],
            'price' => $payload['price'],
            'description' => $product->description,
            'category' => [
                'id' => $product->category->id,
                'name' => $product->category->name
            ],
            'images' => $product->images->pluck('image_url')->toArray()
        ]);
    }



    

    
}
