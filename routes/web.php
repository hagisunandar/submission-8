<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', AppController::class);

Route::resource('/posts', AppController::class);

// Route::get('/posts/create',[AppController::class, 'create']);
Route::get('/posts',[AppController::class,'index'])->name('index');
Route::post('/posts/create',[AppController::class, 'create']);

// Route::resource('posts', \App\Http\Controllers\PostController::class);
