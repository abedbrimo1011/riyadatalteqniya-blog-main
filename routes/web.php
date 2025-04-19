<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// صفحة لوحة التحكم
Route::get('/dashboard', function () {
    
    return view('dashboard', [
        'articlesCount' => Article::count(),
        'categoriesCount' => Category::count(),
        'usersCount' => User::count(),
        'authorsCount' => Author::count(),
    ]);
})->middleware(['auth'])->name('dashboard');

// راوتات للمستخدمين المسجلين فقط
Route::middleware('auth')->group(function () {
    // الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // المقالات
    Route::resource('articles', ArticleController::class);

    // التصنيفات
    Route::resource('categories', CategoryController::class);

    // المستخدمين
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// تسجيل الدخول والتسجيل
require __DIR__.'/auth.php';


