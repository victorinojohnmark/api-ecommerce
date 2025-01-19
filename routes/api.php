<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ShopController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
})->name('user.get');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::prefix('user')->group(function() {
        // Route::get('shop', [ShopController::class, 'show'])->name('user.shop.get');
        // Route::post('shop', [ShopController::class, 'store'])->name('user.shop.store');
        // Route::put('shop', [ShopController::class, 'update'])->name('user.shop.update');
        // Route::delete('shop', [ShopController::class, 'destroy'])->name('user.shop.delete');

        Route::apiResource('shop', ShopController::class)->only(['show', 'store', 'update', 'destroy']);
    });
     
});
