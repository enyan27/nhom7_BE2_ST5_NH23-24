<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\StatisticController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Admin Page

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    Route::post('logout', [LoginController::class, 'logout']) ->name('logout');
});

Route::group(['prefix'=> 'admin', 'middleware'=>'auth' ] , function () {
    
    // Home
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Product
    Route::prefix('product')->group(function () {
        Route::get('', [ProductController::class, 'index']); 
        Route::get('create', [ProductController::class, 'create']); 
        Route::post('store', [ProductController::class, 'store']);
        Route::get('edit/{product}', [ProductController::class, 'edit']); 
        Route::post('edit/{product}', [ProductController::class, 'update']); 
        Route::get('{product}', [ProductController::class, 'show']); 
        Route::delete('delete/{product}', [ProductController::class, 'destroy']); 
       
    });
});

Route::redirect('/','/admin/login'); // Test Admin Page