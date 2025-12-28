<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubjectController;
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


Route::get('/profiles',action: [ProfileController::class, 'profiles']) ->name('profiles');
Route::post('/profiles/store',[ProfileController::class, 'store']) ->name('profilestore');
Route::get('/profiles/edit/{id}',[ProfileController::class, 'editprofile']) ->name('editprofile');
Route::put('/profiles/update/{id}',[ProfileController::class, 'update']) ->name('updateprofile');
Route::delete('/profiles/delete/{id}',[ProfileController::class, 'destroy']) ->name('deleteprofile');


Route::get('/category',action: [CategoryController::class, 'index']) ->name('category.index');
Route::get('/category/create',action: [CategoryController::class, 'create']) ->name('category.create');
Route::post('/category/store',action: [CategoryController::class, 'store']) ->name('category.store');
Route::get('/category/edit/{id}',action: [CategoryController::class, 'edit']) ->name('category.edit');
Route::put('/category/update/{id}',action: [CategoryController::class, 'update']) ->name('category.update');
Route::delete('/category/delete/{id}',action: [CategoryController::class, 'destroy']) ->name('category.delete');


Route::get('/subject',[SubjectController::class,'index'])->name('subject.index');
Route::get('/subject/create',[SubjectController::class,'create'])->name('subject.create');
Route::post('/subject/store',[SubjectController::class,'store'])->name('subject.store');
Route::get('/subject/edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
Route::put('/subject/update/{id}',[SubjectController::class,'update'])->name('subject.update');
Route::delete('/subject/delete/{id}',[SubjectController::class,'destroy'])->name('subject.delete');

Route::get('/service',[ServiceController::class,'index'])->name('service.index');
Route::get('/service/create',[ServiceController::class,'create'])->name('service.create');
Route::post('/service/store',[ServiceController::class,'store'])->name('service.store');
Route::get('/service/edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
Route::put('/service/update/{id}',[ServiceController::class,'update'])->name('service.update');
Route::delete('/service/delete/{id}',[ServiceController::class,'destroy'])->name('service.delete');

Route::get('/school',[SchoolController::class,'index'])->name('school.index');
Route::get('/school/create',[SchoolController::class,'create'])->name('school.create');
Route::post('/school/store',[SchoolController::class,'store'])->name('school.store');
Route::get('/school/edit/{id}',[SchoolController::class,'edit'])->name('school.edit');
Route::put('/school/update/{id}',[SchoolController::class,'update'])->name('school.update');
Route::delete('/school/delete/{id}',[SchoolController::class,'destroy'])->name('school.delete');

Route::get('/college',[CollegeController::class,'index'])->name('college.index');
Route::get('/college/create',[CollegeController::class,'create'])->name('college.create');
Route::post('/college/store',[CollegeController::class,'store'])->name('college.store');
Route::get('/college/edit/{id}',[CollegeController::class,'edit'])->name('college.edit');
Route::put('/college/update/{id}',[CollegeController::class,'update'])->name('college.update');
Route::delete('/college/delete/{id}',[CollegeController::class,'destroy'])->name('college.delete');

Route::get('/banner',[BannerController::class,'index'])->name('banner.index');
Route::get('/banner/create',[BannerController::class,'create'])->name('banner.create');
Route::post('/banner/store',[BannerController::class,'store'])->name('banner.store');
Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
Route::put('/banner/update/{id}',[BannerController::class,'update'])->name('banner.update');
Route::delete('/banner/delete/{id}',[BannerController::class,'destroy'])->name('banner.delete');
