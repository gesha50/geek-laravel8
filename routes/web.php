<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
//use App\Http\Controllers\Admin; "namespace" => "App\Http\Controllers\Admin",


Route::group(["prefix" => "/admin", "as" => "admin."], function (){

//    Route::group(["prefix" => "news", "as" => "news."], function (){
//        Route::get('/', [App\Http\Controllers\Admin\NewsController::class, 'allNews'])->name('allNews');
//        Route::get('/{id}', [App\Http\Controllers\Admin\NewsController::class, 'oneNews'])->name('id')->where('id', '[0-9]+');
//        Route::get('/delete/{id}', [App\Http\Controllers\Admin\NewsController::class, 'delete'])->name('delete')->where('id', '[0-9]+');
//        Route::match(['get', 'post'],'/add', [App\Http\Controllers\Admin\NewsController::class, 'add'])->name('add');
//
//    });
    Route::resource('news', 'App\Http\Controllers\Admin\NewsController');

    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
});

Route::get('/info', [InfoController::class, 'index'])->name('info');

Route::group(["prefix" => "news"], function (){
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{id}', [NewsController::class, 'oneNews'])->name('news.id');
});


Route::group(["prefix" => "category"], function (){
    Route::get('/', [CategoryController::class, 'getCategory'])->name('category');
    Route::get('/{id}', [CategoryController::class, 'getOneCategory'])->name('category.id');
});

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// для вывода изображений
// Так как используем vagrant
Route::get('storage/{filename}', function ($filename){
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);
    return $response;
});
