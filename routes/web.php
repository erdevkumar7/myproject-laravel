<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/* ----------------------------------------------------------------------------------------------- */
// todo: Adim Routes
Route::controller(AdminController::class)->group(function () {
    Route::view('/admin/register', 'admin.register')->name('admin_register');
    Route::post('/admin/register', 'admin_registerSave')->name('admin_registerSave');

    Route::view('/admin/login', 'admin.login')->name('admin_login');
    Route::post('/admin/login', 'admin_loginSave')->name('admin_loginSave');

    Route::middleware(['admin'])->group(function () {
        Route::view('admin', 'admin.home')->name('admin_home');
        Route::get('/admin/dashboard', 'admin_dashboard')->name('admin_dashboard');
        Route::post('/admin/logout', 'admin_logout')->name('admin_logout');
    });
});
/* ---------------------------------------------------------------------------------- */
// todo: Users Routes
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'homeContent')->name('home');
    Route::view('about', 'user.about')->name('about');

    Route::view('register', 'user.register')->name('register');
    Route::post('register', 'registerSave')->name('registerSave');

    Route::view('login', 'user.login')->name('login');
    Route::post('login', 'loginSave')->name('loginSave');


    Route::middleware('auth')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::post('logout', 'logout')->name('logout');
    });
});
/* ----------------------------------------------------------------------------------- */
// todo: Admin Product CRUD
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{product}', 'show')->name('products.show');

    Route::middleware('admin')->group(function () {
        Route::view('/admin/product/add', 'admin.product.add')->name('product_add');
        Route::post('/admin/product/add', 'productSave')->name('productSave');

        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        
        Route::get('/products/{product}/edit', 'edit')->name('products.edit');
        Route::put('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    });
});
/* ------------------------------------------------  -------------------------------- */
