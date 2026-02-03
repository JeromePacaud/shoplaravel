<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/hello', function () {
    return 'Hello Laravel';
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('show')->where('id', '[0-9]+');
    Route::fallback(function () {
        return 'Page non trouvée ! <a href="/">Retour à l\'accueil</a>';
    });
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'usersList'])->name('users');
});
