<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? 221,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->when($this->description !== null, $this->description),
            'category' => $this->category()->select(['id', 'name'])->first(),
            'images' => $this->when($this->imageUrls !== [], $this->imageUrls),
        ];
    }
}
