<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[ProductController::class, 'index']) ->name('index');
Route::get('/create',[ProductController::class, 'create']) ->name('create');
Route::post('/store',[ProductController::class, 'store']) ->name('store');
Route::get('/edit/{id}',[ProductController::class, 'edit']) ->name('edit');
Route::put('/update/{id}',[ProductController::class, 'update']) ->name('update');
Route::delete('/delete/{id}',[ProductController::class, 'destroy']) ->name('delete');


Route::get('/items',[ItemController::class, 'items']) ->name('items');
Route::post('/items/store',[ItemController::class, 'store']) ->name('iteamstore');
Route::get('items/edit/{id}',[ItemController::class, 'edititems']) ->name('edititems');

Route::put('items/update/{id}',[ItemController::class, 'update']) ->name('editupdate');
Route::delete('items/delete/{id}',[ItemController::class, 'destroy']) ->name('itemsdelete');

Route::get('/article',[ArticleController::class, 'article']) ->name('articles');
Route::post('/article/store',[ArticleController::class, 'store']) ->name('articledata');
