<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageTrait {

    /**
     * Store images in the file system.
     *
     * @param  array  $imageFiles
     * @return array  An array of image URLs after being uploaded. 
     */
    public function storeImageFiles(array $imageFiles)
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

    /**
     * Generate an array of image URLs with associated product IDs.
     *
     * @param  array  $imageUrls
     * @param  int  $productId
     * @return array
     */
    public function getImagesWithId($imageUrls, $productId)
    {
        $imagesWithId = [];

        foreach($imageUrls as $url)
        {
            $imagesWithId[] = ['image_url' => $url, 'product_id' => $productId];
        }

        return $imagesWithId;
    }

    /**
     * Delete images from the file system based on their URLs.
     *
     * @param  array  $imageUrls
     * @return void
     */
    public function deleteImageFiles($imageUrls)
    {
        foreach($imageUrls as $url)
        {
            $path = parse_url($url, PHP_URL_PATH);

            $path = ltrim($path, '/');

            if (File::exists($path)) { File::delete($path); }
        }
    }

}