<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontendController;
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [DashboradController::class, 'dashboard'])->name('dashboard');
    /* blog */
    Route::get('/add-blog',[BlogController::class,'addBlog'])->name('add-blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new-blog');
    Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage-blog');
    Route::get('status/{id}',[BlogController::class,'status'])->name('status');
    Route::get('edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit-blog');
    Route::post('update-blog',[BlogController::class,'updateBlog'])->name('update-blog');
    Route::post('delete-blog',[BlogController::class,'deleteBlog'])->name('delete-blog');
});

/* frontend */
Route::get('/',[FrontendController::class, 'index'])->name('/');
