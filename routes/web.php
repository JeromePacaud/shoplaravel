<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


//Route::get('/welcome', function () {
//    return view('welcome');
//});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::prefix('/')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showForm'])->name('login');
    ROute::post('login', [LoginController::class, 'login']);
});

Route::prefix('/')->middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::delete('logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->prefix('/orders')->name('orders.')->group(function () {
   Route::get('/', [OrderController::class, 'index'])->name('index');
   Route::post('/', [OrderController::class, 'store'])->name('store');
   Route::get('/{order}', [OrderController::class, 'show'])->name('show');
});

Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('products', ProductController::class)->except(['index', 'show'])->middleware(['auth', 'admin']);

Route::resource('categories', CategoryController::class);

Route::prefix('cart')->middleware('auth')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('add');
    Route::patch('/update/{product}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{product}', [CartController::class, 'remove'])->name('remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
});

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/usersList', [AdminController::class, 'usersList'])->name('usersList');
    Route::get('/productsList', [AdminController::class, 'productsList'])->name('productsList');
    Route::get('/categoriesList', [AdminController::class, 'categoriesList'])->name('categoriesList');
});
