<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// product
Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');
Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');
Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_product');
Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');
// cart
Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
