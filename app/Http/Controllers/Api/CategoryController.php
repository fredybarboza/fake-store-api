<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
       $categories = Cache::rememberForever('categories', function(){
            return Category::select(['id', 'name'])->get();
       });

       return response()->json($categories, 200);
    }
}
