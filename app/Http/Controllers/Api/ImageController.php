<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use ImageTrait;

    public function store(Request $request)
    {

        $imageUrls = [];

        if($request->hasFile('imageFiles')) { $imageUrls[] = $this->uploadImageFiles($request->file('imageFiles')); }

    }
}
