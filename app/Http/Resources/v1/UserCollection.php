<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage(),
            'users_per_page' => $this->perPage(),
            'total_users' => $this->total(),
            'data' => $this->collection,
        ];
    }
}
