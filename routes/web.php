<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Auth;

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
Route::get('/home',[AppController::class,'index'])->name('posts.index');
Route::get('/posts',[AppController::class,'index'])->name('posts.index');
Route::post('/create',[AppController::class, 'create'])->name('posts.create');
Route::get('/edit/{id}',[AppController::class,'edit'])->name('posts.edit');
Route::put('/update/{id}',[AppController::class,'update'])->name('posts.update');
Route::delete('/destroy/{id}',[AppController::class,'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/search', [AppController::class,'search'])->name('posts.search');

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

