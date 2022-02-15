<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;



Route::get('/categories/{id}/products',[ProductController::class,'list'])->name('categories.products.list');
Route::get('/createProduct/{id}',[ProductController::class,'create'])->name('products.create');
Route::post('/storeCategory/{id}',[ProductController::class,'store'])->name('products.store');
Route::delete('/deleteProduct/{id}',[ProductController::class,'delete'])->name('products.delete');
Route::get('/updateformProduct/{id}',[ProductController::class,'updateform'])->name('products.updateform');
Route::post('/updateProduct/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');