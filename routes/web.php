<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

Route::group(["prefix" => "/admin", "as" => "admin.","middleware" => ['auth', 'role:admin']], function (){

//    Route::group(["prefix" => "news", "as" => "news."], function (){
//        Route::get('/', [App\Http\Controllers\Admin\NewsController::class, 'allNews'])->name('allNews');
//        Route::get('/{id}', [App\Http\Controllers\Admin\NewsController::class, 'oneNews'])->name('id')->where('id', '[0-9]+');
//        Route::get('/delete/{id}', [App\Http\Controllers\Admin\NewsController::class, 'delete'])->name('delete')->where('id', '[0-9]+');
//        Route::match(['get', 'post'],'/add', [App\Http\Controllers\Admin\NewsController::class, 'add'])->name('add');
//
//    });
    Route::resources([
        'news' => App\Http\Controllers\Admin\NewsController::class,
        'users' => App\Http\Controllers\Admin\UserController::class,
    ]);

    Route::get('/parser', [App\Http\Controllers\Admin\ParserController::class, 'index'])->name('parser.index');
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
});




Route::get('/info', [InfoController::class, 'index'])->name('info');

Route::group(["prefix" => "news"], function (){
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{id}', [NewsController::class, 'oneNews'])->name('news.id');
});


Route::group(["prefix" => "category"], function (){
    Route::get('/', [CategoryController::class, 'getCategory'])->name('category');
    Route::get('/{category}', [CategoryController::class, 'getOneCategory'])->name('category.id');
});

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/privacy', 'IndexController@privacy')->name('privacy');


// отключить маршрут регистрации - ['register' => false]
Auth::routes();

Route::get('/auth/vk', 'Auth\LoginController@authVk');
Route::get('/auth/vk/response', 'Auth\LoginController@responseVk');

Route::get('/auth/facebook', 'Auth\LoginController@authFacebook');
Route::get('/auth/facebook/response', 'Auth\LoginController@responseFacebook');



Route::get('/calc', 'BaseWithCalcController@index');


// для файлового менеджера
//Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'role:admin ']], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});



// для вывода изображений
//Route::get('storage/{filename}', function ($filename){
//    $path = storage_path('app/public/' . $filename);
//    if (!File::exists($path)) {
//        abort(404);
//    }
//    $file = File::get($path);
//    $type = File::mimeType($path);
//    $response = Response::make($file, 200);
//    $response->header('Content-Type', $type);
//    return $response;
//});
