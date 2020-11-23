<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/info', [InfoController::class, 'index'])->name('info');

Route::group(["prefix" => "news"], function (){
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{id}', [NewsController::class, 'oneNews'])->name('news_id');
});


Route::group(["prefix" => "category"], function (){
    Route::get('/', [CategoryController::class, 'getCategory'])->name('category');
    Route::get('/{id}', [CategoryController::class, 'getOneCategory'])->name('category.id');
});
