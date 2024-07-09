<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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
        Route::view('admin', 'admin.dashboard')->name('admin_home');
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
    
    Route::middleware('admin')->group(function () {
        Route::get('/admin/product', 'product_all')->name('product_all');
        
        Route::view('/admin/product/add', 'admin.product.add')->name('product_add');
        Route::post('/admin/product/add', 'productSave')->name('productSave');
        
        Route::get('/admin/product/{product}', 'product_show')->name('product_show');
        Route::get('/admin/product/{product}/edit', 'product_edit')->name('product_edit');
        Route::put('/admin/product/{product}', 'product_update')->name('product_update');
        
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');       
    });
});
/* ------------------------------------------------  -------------------------------- */
Route::controller(CategoryController::class)->group(function(){
    Route::get('/category', 'category_all')->name('category_all');

    Route::get('/category/add', 'add')->name('category_add');
    Route::post('/category/add', 'category_save')->name('category_save');

    Route::get('/category/{id}', 'show')->name('category_show');

});
