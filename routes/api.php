<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\StockController;
use \App\Http\Controllers\SaleController;

Route::get('product', [ProductController::class, 'show']);
Route::post('product', [ProductController::class, 'create']);
Route::delete('product/{id}', [ProductController::class, 'delete']);
Route::put('product/{id}', [ProductController::class, 'update']);

Route::get('category', [CategoryController::class, 'show']);
Route::post('category', [CategoryController::class, 'create']);
Route::delete('category/{id}', [CategoryController::class, 'delete']);
Route::put('category/{id}', [CategoryController::class, 'update']);

Route::get('stock', [StockController::class, 'show']);
Route::post('stock', [StockController::class, 'create']);
Route::delete('stock/{id}', [StockController::class, 'delete']);
Route::put('stock/{id}', [StockController::class, 'update']);

Route::get('sale', [SaleController::class, 'show']);
Route::post('sale', [SaleController::class, 'create']);
Route::delete('sale/{id}', [SaleController::class, 'delete']);
Route::put('sale/{id}', [SaleController::class, 'updateSaleDetails']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
