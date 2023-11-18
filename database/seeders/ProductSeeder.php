<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(20)->create();

        $images = [];

        foreach($products as $p){
            $images[] = ['image_url' => fake()->url(), 'product_id' => $p->id];
        }

        Image::insert($images);
    }
}
