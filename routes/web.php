<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');
Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');
Route::get('/admin/users/{id}', 'Admin\UserController@show')->name('admin.users.show');

//User Route
Route::get('/user/posts', 'User\PostController@index')->name('user.posts.index');
Route::get('/user/posts/create', 'User\PostController@create')->name('user.posts.create');
Route::get('/user/posts/store', 'User\PostController@index')->name('user.posts.store');
Route::get('/user/posts/{id}', 'User\PostController@show')->name('user.posts.show');
Route::get('/user/posts/{id}/edit', 'User\PostController@edit')->name('user.posts.edit');
Route::put('/user/posts/{id}', 'User\PostController@update')->name('user.posts.update');
Route::delete('/user/posts/{id}', 'User\PostController@destroy')->name('user.posts.destroy');
