<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/',[TaskController::class, 'index'])->name('/');
Route::get('status-complete/{id}',[TaskController::class, 'statusComplete'])->name('task.status.complete');
Route::resource('task', TaskController::class);
