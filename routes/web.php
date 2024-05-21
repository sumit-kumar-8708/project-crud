<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1st way call to controller function start.............................
    // Route::get('articles', 'App\Http\Controllers\ArticleController@list');
    // Route::get('tree', 'App\Http\Controllers\ArticleController@tree');
// 1st way call to controller function end.............................

// 2nd way call to controller function start.............................
    // use App\Http\Controllers\ArticleController;
    // Route::get('/articles', [ArticleController::class, 'list']);
    // Route::get('/tree', [ArticleController::class, 'tree']);
// 2nd way call to controller function end.............................

// 3rd way call to controller function start.............................
    // Route::namespace('App\Http\Controllers')->group(function () {
    //     Route::get('/articles', 'ArticleController@list');
    //     Route::get('/tree', 'ArticleController@tree');
    // });
// 3rd way call to controller function end.............................

use App\Http\Controllers\ArticleController;
// ArticleController 
Route::get('/articles', [ArticleController::class, 'list'])->name('articles.list');
Route::get('/add', [ArticleController::class, 'add'])->name('articles.add');
Route::post('/add', [ArticleController::class, 'insertData'])->name('articles.insertData');
Route::delete('/articles/{id}', [ArticleController::class, 'delete'])->name('articles.delete');
