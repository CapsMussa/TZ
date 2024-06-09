<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){

    Route::group(['namespace' => 'Post'], function (){
        Route::get('', [PostController::class, 'index'])->name('admin.index');
        Route::post('/posts/store', [PostController::class,'store'])->name('admin.store.post');//
        Route::get('/posts/{posts}', [PostController::class, 'edit'])->name('admin.edit.post');
        Route::patch('/posts/{posts}', [PostController::class, 'update'])->name('admin.update.post');
        Route::delete('/posts/{posts}', [PostController::class, 'delete'])->name('admin.delete.post');
    });

    Route::group(['namespace' => 'Categories'], function () {
        Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.store.category');
        Route::get('/categories/{categories}', [CategoryController::class, 'edit'])->name('admin.edit.category');
        Route::patch('/category/{categories}', [CategoryController::class, 'update'])->name('admin.update.category');
        Route::delete('/category/{categories}', [CategoryController::class, 'delete'])->name('admin.delete.category');
    });

    Route::group(['namespace' => 'Tags'], function () {
        Route::get('/colors', [TagController::class, 'index'])->name('admin.colors');
        Route::post('/tags/store', [TagController::class, 'store'])->name('admin.store.tag');
        Route::get('/tags/{tags}', [TagController::class, 'edit'])->name('admin.edit.tag');
        Route::patch('/tags/{tags}', [TagController::class, 'update'])->name('admin.update.tag');
        Route::delete('/tags/{tags}', [TagController::class, 'delete'])->name('admin.delete.tag');
    });

    Route::group(['namespace' => 'Users'], function () {
        Route::get('/user', [UserController::class, 'index'])->name('admin.users');
        Route::post('/user/user', [UserController::class, 'store'])->name('admin.store.users');
        Route::get('/user/{user}', [UserController::class, 'edit'])->name('admin.edit.users');
        Route::patch('/user/{user}', [UserController::class, 'update'])->name('admin.update.users');
        Route::delete('/user/{user}', [UserController::class, 'delete'])->name('admin.delete.users');

    });
});

Auth::routes();

Route::get('/', [StartController::class, 'index'])->name('index.users');
Route::get('/home', [HomeController::class, 'index'])->name('home');





