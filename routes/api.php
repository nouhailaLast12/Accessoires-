<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/finaliser-tache', [ProductController::class, 'finalizeTask']);
Route::post('/products', [ProductController::class, 'store']); 
use App\Http\Controllers\OrderController;

Route::post('/orders', [OrderController::class, 'store']);
