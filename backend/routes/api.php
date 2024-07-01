<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductPhotosController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('logout', 'logout');
    });
});

Route::controller(ProductController::class)->group(function () {
    Route::get('products/{product}', 'show');
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('products', 'index');
        Route::post('products', 'store');
        Route::put('products', 'update');
        Route::delete('products', 'destroy');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ProductPhotosController::class)->group(function(){
        Route::post('photos', 'store');
    });
});

// Route::apiResource('products', ProductController::class)->middleware('auth:sanctum')->only(['index', 'show']);
    // ->only(['store', 'update', 'destroy'])
    // ->middleware('auth:sanctum');
// Route::apiResource('products.categories', ProductCategoryController::class)->only('index');

// Route::controller(ProductController::class)->prefix('products')->group(function(){

//     Route::get('/', 'index');
//     Route::get('/{product}', 'show');
//     Route::delete('/{product}', 'destroy');
//     Route::post('/', 'store');
//     Route::match(['put', 'patch'], '/{product}', 'update');
// });


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
