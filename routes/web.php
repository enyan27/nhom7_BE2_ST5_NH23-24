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
Route::prefix('admin')->group(function() {
    Route::get('login', [LoginController::class,'index'])->name('login');
    Route::post('login', [LoginController::class,'store']);
    Route::post('logout', [LoginController::class,'logout']) ->name('logout');
});

Route::group(['prefix' => 'admin','middleware'=>'auth'], function() {
    
    // Home
    Route::get('home', [HomeController::class,'index'])->name('home');

    // Product
    Route::prefix('product')->group(function() {
        Route::get('', [ProductController::class,'index']); 
        Route::get('create', [ProductController::class,'create']); 
        Route::post('store', [ProductController::class,'store']);
        Route::get('edit/{product}', [ProductController::class,'edit']); 
        Route::post('edit/{product}', [ProductController::class,'update']); 
        Route::get('{product}', [ProductController::class,'show']); 
        Route::delete('delete/{product}', [ProductController::class,'destroy']); 

    // Product detail
        Route::get('{product}/detail', [ProductDetailController::class,'index']); 
        Route::get('{product}/detail/create', [ProductDetailController::class,'create']); 
        Route::post('{product}/detail/create/store', [ProductDetailController::class,'store']); 
        Route::get('{product}/detail/edit/{productDetail}', [ProductDetailController::class,'edit']); 
        Route::post('{product}/detail/edit/{productDetail}', [ProductDetailController::class,'update']); 
        Route::delete('{product}/detail/delete/{productDetail}', [ProductDetailController::class,'destroy']); 
    });

    // User
    Route::middleware(['adminRole'])->group(function() {
        Route::get('user', [UserController::class,'index']);
        Route::get('user/create', [UserController::class,'create']);
        Route::post('user/store', [UserController::class,'store']);
        Route::get('user/{id}', [UserController::class,'show']);
        Route::delete('user/delete/{id}', [UserController::class,'destroy']);

    // Brand
        Route::prefix('brand')->group(function() {
            Route::get('', [BrandController::class,'index']);
            Route::get('create', [BrandController::class,'create']); 
            Route::post('store', [BrandController::class,'store']);
            Route::get('edit/{brand}', [BrandController::class,'show']); 
            Route::post('edit/{brand}', [BrandController::class,'update']); 
            Route::delete('delete/{id}', [BrandController::class,'destroy']);
        });

    // Category
        Route::prefix('category')->group(function() {
            Route::get('', [CategoryController::class,'index']); 
            Route::get('create', [CategoryController::class,'create']); 
            Route::post('store', [CategoryController::class,'store']); 
            Route::get('edit/{category}', [CategoryController::class,'show']); 
            Route::post('edit/{category}', [CategoryController::class,'update']); 
            Route::delete('delete/{id}', [CategoryController::class,'destroy']); 
        });

    //Statistic
        Route::get('/statistic', [StatisticController::class,'index']);
        Route::post('/statistic', [StatisticController::class,'show']);
    });

    // Order    
    Route::prefix('order')->group(function() {
        Route::get('', [OrderController::class,'index']);
        Route::get('{id}', [OrderController::class,'show']);
        Route::post('/confirm', [OrderController::class,'confirmOrder']);
    });

    // Customer    
    Route::prefix('customer')->group(function() {
        Route::get('', [CustomerController::class,'index']);
        Route::get('{id}', [CustomerController::class,'show']);
        Route::post('action', [CustomerController::class,'action']);
    });

    // Profile
    Route::get('profile', [ProfileController::class,'index']);
    Route::post('profile', [ProfileController::class,'update']);
    Route::get('password', [ProfileController::class,'changePassword']);
    Route::post('password', [ProfileController::class,'changePasswordPost']);

    Route::get('403', function() {
        return view('admin.403');
    });
});



/**
 * // Test Customer Page
 */
// Route::get('test', function() {
//     Artisan::call('storage:link');
// });
// Route::get('/customer-action', [CustomerController::class, 'action']);


/**
 * // Test Admin Page
 */
<<<<<<< HEAD
 //Route::redirect('/','/admin/login'); 

  // Customer    
  Route::prefix('/user')->group(function () {
    Route::get('',[ProductController::class,'getAllProducts']);
});

=======
Route::redirect('/','/admin/login'); 
>>>>>>> bdb936636526b2268ab97b51557c0e75f42ba74d
