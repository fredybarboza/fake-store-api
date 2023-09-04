<?php

use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:api')->group(function()
{
    Route::post('refresh', [LoginController::class, 'refresh']);
});

Route::get('/unauthorized', function (){
    return response()->json(["status"=>"error","message"=>"Unauthorized"])->setStatusCode(401);
})->name("unauthorized");

