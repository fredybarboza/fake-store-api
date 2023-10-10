<?php

namespace App\Traits;

use App\Models\Product;
use Illuminate\Support\Facades\File;

trait ImageTrait {

    public function uploadImageFiles(array $imageFiles)
    {
        $uploadedImageUrls = [];

        foreach($imageFiles as $image)
        {
            $imagePath = $image->store('uploads/products', 'public');

            $imageUrl = asset('storage/' . $imagePath);

            $uploadedImageUrls[] = $imageUrl;
        }

        return $uploadedImageUrls;
    }

    public function getImagesWithId($imageUrls, $productId)
    {
        $imagesWithId = [];

        foreach($imageUrls as $url)
        {
            $imagesWithId[] = ['image_url' => $url, 'product_id' => $productId];
        }

        return $imagesWithId;
    }

    public function removeImageFiles($imageUrls)
    {
        foreach($imageUrls as $url)
        {
            $path = parse_url($url, PHP_URL_PATH);

            $path = ltrim($path, '/');

            if (File::exists($path)) { File::delete($path); }
        }
    }

}