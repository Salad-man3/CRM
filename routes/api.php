<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;



Route::apiResource('cart-items', CartItemController::class);
Route::apiResource('items', ItemController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('governorates', GovernorateController::class);
Route::apiResource('collections', CollectionController::class);
Route::apiResource('profiles', ProfileController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});


Route::post('/register', [RegisterController::class, 'register']);

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->name('verification.verify');
