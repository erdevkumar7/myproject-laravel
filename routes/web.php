<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
/* ----------------------------------------------------------------------------------------------- */
// todo: Adim Routes
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin.index')->middleware('auth');
});
/* ----------------------------------------------------------------------------------------------- */
// todo: Users Routes
Route::controller(UserController::class)->group(function () {
    Route::post('logout', 'logout')->name('user.logout');
    Route::get('register', 'register')->name('user.register');
    Route::post('register', 'registerSave')->name('user.registerSave');
    Route::get('login', 'login')->name('user.login');
    Route::post('login', 'loginSave')->name('user.loginSave');
    Route::get('dashbord', 'userdashbord')->name('user.userdashboard');
});

/* ----------------------------------------------------------------------------------------------- */
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
/* ----------------------------------------------------------------------------------------------- */
// One controller for Route 
Route::resource('products', ProductController::class);
/* ----------------------------------------------------------------------------------------------- */
// // Route as single single
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');  // GET request to list products
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');  // GET request to show form to create a new product
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');  // POST request to store new product
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');  // GET request to show a single product
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');  // GET request to show form to edit a product
// Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');  // PUT request to update a product
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');  // DELETE request to delete a product
/* ----------------------------------------------------------------------------------------------- */
// // Route by a group
// Route::controller(ProductController::class)->group(function () {
//     Route::get('/products', 'index')->name('products.index');
//     Route::get('/products/create', 'create')->name('products.create');
//     Route::post('/products', 'store')->name('products.store');
//     Route::get('/products/{product}', 'show')->name('products.show');
//     Route::get('/products/{product}/edit', 'edit')->name('products.edit');
//     Route::put('/products/{product}', 'update')->name('products.update');
//     Route::delete('/products/{product}', 'destroy')->name('products.destroy');
// });

/* ----------------------------------------------------------------------------------------------- */
Route::resource('orders', OrderController::class);
/* ----------------------------------------------------------------------------------------------- */