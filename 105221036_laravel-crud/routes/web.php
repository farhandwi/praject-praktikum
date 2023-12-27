<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
 
 
Route::get('/', [PostController::class,'index']);
Route::resource('post', PostController::class);
// Route::get('/create',[PostController::class,'create'])->name('create');
 