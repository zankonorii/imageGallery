<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home',                             [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/like/image/{image}',               [App\Http\Controllers\ImageController::class, 'like'])->name('like_image');
Route::get('/image/show/{image}',               [App\Http\Controllers\ImageController::class, 'show'])->name('show_image');
Route::get('/image/delete/{image}',             [App\Http\Controllers\ImageController::class, 'delete'])->name('image_delete');
Route::get('/profile',                          [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::post('/user-update',                     [App\Http\Controllers\UserController::class, 'update'])->name('user_update');
Route::get('/user-gallery',                     [App\Http\Controllers\UserController::class, 'gallery'])->name('user_gallery');

