<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('registerSave');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginSave')->name('loginSave');

    
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::post('logout', 'logout')->name('logout');
    });
});
/* ----------------------------------------------------------------------------------- */
// todo: Product CRUD
Route::controller(ProductController::class)->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/admin/product', 'product_all')->name('product_all');
        
        Route::get('/admin/product/add', 'add')->name('product_add');
        Route::post('/admin/product/add', 'productSave')->name('productSave');
        
        Route::get('/admin/product/{product}/edit', 'product_edit')->name('product_edit');
        Route::put('/admin/product/{product}', 'product_update')->name('product_update');
        
        Route::get('/admin/product/{product}', 'product_show')->name('product_show');

        Route::delete('/admin/products/{product}', 'destroy')->name('products.destroy');       
    });

    Route::get('search','search')->name('search');
});
/* ------------------------------------------------  -------------------------------- */
//todo: Categiry Controller
Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/category', 'category_all')->name('category_all');
    
    Route::get('/admin/category/add', 'add')->name('category_add');
    Route::post('/admin/category/add', 'category_save')->name('category_save');
    
    Route::get('/admin/category/{id}/edit', 'edit')->name('category_edit');
    Route::put('/admin/category/{id}', 'update')->name('category_update');

    Route::get('/admin/category/{id}', 'show')->name('category_show');

    Route::delete('/admin/category/{id}', 'destroy')->name('category_destroy');  
    Route::get('/category/{id}', 'category_by_id')->name('category_by_id');

});
