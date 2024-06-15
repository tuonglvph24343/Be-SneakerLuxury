<?php

use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('products', AdminProductController::class);
// Route::apiResource('categories', CategoryController::class);
// Route::get('/products',[ProductController::class,'index']);
// Route::get('/products/{id}',[ProductController::class,'edit']);
// Route::post('/products/store',[ProductController::class,'store']);
// Route::post('/products/update/{id}',[ProductController::class,'store']);
// Route::delete('/products/delete',[ProductController::class,'destroy']);
