<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController2;
use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::resource('products', ProductController::class);

//Route::prefix('products')->name('products.')->group(function () {
//    Route::get('/', [ProductController2::class, 'index'])->name('index');
//    Route::get('/{product}', [ProductController2::class, 'show'])->name('show')->where('product', '[0-9]+');
//    Route::fallback(function () {
//        return 'Page non trouvée ! <a href="/">Retour à l\'accueil</a>';
//    });
//});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'usersList'])->name('users');
});
