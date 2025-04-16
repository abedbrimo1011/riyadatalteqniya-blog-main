<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
route::resource('categories',CategoryController::class);
route::resource('articles',ArticleController::class);
