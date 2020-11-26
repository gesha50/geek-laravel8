<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;




Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/info', [InfoController::class, 'index'])->name('info');

Route::group(["prefix" => "news"], function (){
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{id}', [NewsController::class, 'oneNews'])->name('news.id');
});


Route::group(["prefix" => "category"], function (){
    Route::get('/', [CategoryController::class, 'getCategory'])->name('category');
    Route::get('/{id}', [CategoryController::class, 'getOneCategory'])->name('category.id');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
