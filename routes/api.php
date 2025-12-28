<?php

use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/category/try',action: [CategoryController::class, 'tryindex']) ;
Route::get('/category',action: [CategoryController::class, 'index']);
Route::get('/category/create',action: [CategoryController::class, 'create']) ;
Route::post('/category/store',action: [CategoryController::class, 'store']) ;
Route::get('/category/show/{id}',action: [CategoryController::class, 'show']) ;
Route::put('/category/update/{id}',action: [CategoryController::class, 'update']) ;
Route::delete('/category/delete/{id}',action: [CategoryController::class, 'destroy']) ;

Route::get('/subject',[SubjectController::class,'index']);
Route::get('/subject/create',[SubjectController::class,'create']);
Route::get('/subject/store',[SubjectController::class,'store']);
Route::get('/subject/show/{id}',[SubjectController::class,'show']);
Route::get('/subject/update/{id}',[SubjectController::class,'update']);
Route::get('/subject/delete/{id}',[SubjectController::class,'destroy']);

Route::get('/banner',[BannerController::class,'index']);
Route::get('/banner/create',[BannerController::class,'create']);
Route::post('/banner/store',[BannerController::class,'store']);
Route::get('/banner/edit/{id}',[BannerController::class,'edit']);
Route::put('/banner/update/{id}',[BannerController::class,'update']);
Route::delete('/banner/delete/{id}',[BannerController::class,'destroy']);
