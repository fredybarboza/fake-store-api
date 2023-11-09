<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/unauthorized', function () {
    return response()->json(['status' => 'error', 'message' => 'Unauthorized'])->setStatusCode(401);
})->name('unauthorized');


require __DIR__.'/api/v1.php';


