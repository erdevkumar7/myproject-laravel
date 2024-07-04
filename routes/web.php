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
    Route::view('/admin/register','admin.register')->name('admin_register');
    Route::post('/admin/register', 'admin_registerSave')->name('admin_registerSave');

    Route::view('/admin/login', 'admin.login')->name('admin_login');
    Route::post('/admin/login', 'admin_loginSave')->name('admin_loginSave');

    Route::middleware('auth')->group(function(){
        Route::view('admin', 'admin.home')->name('admin_home');
        Route::get('/admin/dashboard', 'admin_dashboard')->name('admin_dashboard');
        Route::post('/admin/logout', 'admin_logout')->name('admin_logout');
    });
});
/* ----------------------------------------------------------------------------------------------- */
// todo: Users Routes
Route::controller(UserController::class)->group(function () {
    Route::view('/', 'user.home')->name('home');
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

/* ---------------------------------------------------------------------------------- */
// todo: Post Routes
Route::controller(PostController::class)->group(function () {
    Route::get('/posts',  'allposts')->name('posts.allposts');
    Route::get('/posts/createpost', 'createpost')->name('posts.cratepost');
    Route::post('/posts',  'store')->name('posts.store');
    Route::get('/posts/{id}', 'show')->name('posts.show');
    Route::get('/posts/{id}/edit', 'edit')->name('posts.edit');
    Route::put('/posts/{id}', 'update')->name('posts.update');
    Route::delete('/posts/{id}', 'destroy')->name('posts.destroy');
});
/* ------------------------------------------- -------------------------------------- */
// One controller for Route 
Route::resource('products', ProductController::class);
/* ------------------------------------------------  -------------------------------- */

/* ----------------------------------------------------------------------------------- */
Route::resource('orders', OrderController::class);
