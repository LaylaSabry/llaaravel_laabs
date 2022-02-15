



<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;




Route::get('/categories',[CategoryController::class,'list'])->name('categories.list')->middleware(['auth']);
Route::get('/createCategory',[CategoryController::class,'create'])->name('categories.create')->middleware(['auth','is_admin','birthdate']);
Route::post('/storeCategory',[CategoryController::class,'store'])->name('categories.store');
Route::delete('/deleteCategory/{id}',[CategoryController::class,'delete'])->name('categories.delete');
Route::get('/updateformCategory/{id}',[CategoryController::class,'updateform'])->name('categories.updateform');
Route::post('/updateCategory/{id}',[CategoryController::class,'update'])->name('categories.update');

