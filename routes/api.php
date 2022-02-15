<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\API\ProductController;
use  App\Http\Controllers\API\CategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/categories',[CategoryController::class,'list'])->name('categories.list');
Route::get('/createCategory',[CategoryController::class,'create'])->name('categories.create');
Route::post('/storeCategory',[CategoryController::class,'store'])->name('categories.store');
Route::delete('/deleteCategory/{id}',[CategoryController::class,'delete'])->name('categories.delete');
Route::get('/updateformCategory/{id}',[CategoryController::class,'updateform'])->name('categories.updateform');
Route::post('/updateCategory/{id}',[CategoryController::class,'update'])->name('categories.update');
Route::get('/categories/{id}/products',[ProductController::class,'list'])->name('categories.products.list');
Route::get('/createProduct/{id}',[ProductController::class,'create'])->name('products.create');
Route::post('/storeCategory/{id}',[ProductController::class,'store'])->name('products.store');
Route::delete('/deleteProduct/{id}',[ProductController::class,'delete'])->name('products.delete');
Route::get('/updateformProduct/{id}',[ProductController::class,'updateform'])->name('products.updateform');
Route::post('/updateProduct/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');