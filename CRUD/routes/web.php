<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[ProductController::class, 'index'])-> name('/');
Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::post('new-product', [ProductController::class, 'saveProduct'])->name('new-product');
Route::post('delete-product', [ProductController::class, 'deleteProduct'])->name('delete-product');
Route::get('edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::post('update-product', [ProductController::class, 'updateProduct'])->name('update-product');
