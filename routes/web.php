<?php

namespace App\Http\Controllers;

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

Route::get('/', 'App\Http\Controllers\HomeController@index');


Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@post')->name('admin.index')->middleware(['middleware' => 'admin']);
Route::get('/admin/category', 'App\Http\Controllers\Admin\AdminController@category')->name('admin.category')->middleware(['middleware' => 'admin']);
Route::get('/admin/colors', 'App\Http\Controllers\Admin\AdminController@tag')->name('admin.colors')->middleware(['middleware' => 'admin']);
Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminController@allUsers')->name('admin.users')->middleware(['middleware' => 'admin']);

Route::get('/admin/categories', 'App\Http\Controllers\Admin\CreateController@category')->middleware(['middleware' => 'admin']);
Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\StoreController@categories')->name('admin.store.category')->middleware(['middleware' => 'admin']);
Route::get('/admin/categories/{categories}', 'App\Http\Controllers\Admin\EditController@categories')->name('admin.edit.category')->middleware(['middleware' => 'admin']);
Route::patch('/admin/category/{categories}', 'App\Http\Controllers\Admin\UpdateController@categories')->name('admin.update.category')->middleware(['middleware' => 'admin']);
Route::delete('/admin/category/{categories}', 'App\Http\Controllers\Admin\DeleteController@categories')->name('admin.delete.category')->middleware(['middleware' => 'admin']);

Route::get('/admin/tags', 'App\Http\Controllers\Admin\CreateController@tag')->middleware(['middleware' => 'admin']);
Route::post('/admin/tags/store', 'App\Http\Controllers\Admin\StoreController@tag')->name('admin.store.tag')->middleware(['middleware' => 'admin']);
Route::get('/admin/tags/{tags}', 'App\Http\Controllers\Admin\EditController@tag')->name('admin.edit.tag')->middleware(['middleware' => 'admin']);
Route::patch('/admin/tags/{tags}', 'App\Http\Controllers\Admin\UpdateController@tag')->name('admin.update.tag')->middleware(['middleware' => 'admin']);
Route::delete('/admin/tags/{tags}', 'App\Http\Controllers\Admin\DeleteController@tag')->name('admin.delete.tag')->middleware(['middleware' => 'admin']);

Route::get('/admin/posts', 'App\Http\Controllers\Admin\CreateController@post');
Route::post('/admin/posts/store', 'App\Http\Controllers\Admin\StoreController@post')->name('admin.store.post')->middleware(['middleware' => 'admin']);
Route::get('/admin/posts/{posts}', 'App\Http\Controllers\Admin\EditController@post')->name('admin.edit.post')->middleware(['middleware' => 'admin']);
Route::patch('/admin/posts/{posts}', 'App\Http\Controllers\Admin\UpdateController@post')->name('admin.update.post')->middleware(['middleware' => 'admin']);
Route::delete('/admin/posts/{posts}', 'App\Http\Controllers\Admin\DeleteController@post')->name('admin.delete.post')->middleware(['middleware' => 'admin']);



Route::post('/admin/posts/user', 'App\Http\Controllers\Admin\StoreController@allUser')->name('admin.store.users')->middleware(['middleware' => 'admin']);
Route::get('/admin/posts/{user}', 'App\Http\Controllers\Admin\EditController@allUser')->name('admin.edit.users')->middleware(['middleware' => 'admin']);
Route::patch('/admin/posts/{user}', 'App\Http\Controllers\Admin\UpdateController@allUser')->name('admin.update.users')->middleware(['middleware' => 'admin']);
Route::delete('/admin/user/{users}', 'App\Http\Controllers\Admin\DeleteController@allUser')->name('admin.delete.users')->middleware(['middleware' => 'admin']);

Auth::routes();

Route::get('/index', 'App\Http\Controllers\StartController@index')->name('index.users');
Route::get('/a', 'App\Http\Controllers\IndexController@postsFilters')->name('post.filter');
Route::get('/home', [HomeController::class, 'index'])->name('home');



