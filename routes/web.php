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
Route::get('/user/profile/edit', 'User\ProfileController@edit')->name('user.profile.edit');
Route::put('/user/profile/{id}', 'User\ProfileController@update')->name('user.profile.update');



Route::get('/user/posts', 'User\PostController@index')->name('user.posts.index');
Route::get('/user/posts/create', 'User\PostController@create')->name('user.posts.create');
Route::post('/user/posts/store', 'User\PostController@store')->name('user.posts.store');
Route::get('/user/posts/{id}', 'User\PostController@show')->name('user.posts.show');
Route::get('/user/posts/{id}/edit', 'User\PostController@edit')->name('user.posts.edit');
Route::put('/user/posts/{id}', 'User\PostController@update')->name('user.posts.update');
Route::delete('/user/posts/{id}', 'User\PostController@destroy')->name('user.posts.destroy');

Route::get('/user/comments', 'User\CommentController@index')->name('user.comments.index');
Route::get('/user/comments/create', 'User\CommentController@create')->name('user.comments.create');
Route::post('/user/comments/store', 'User\CommentController@store')->name('user.comments.store');
Route::get('/user/comments/{id}', 'User\CommentController@show')->name('user.comments.show');
Route::get('/user/comments/{id}/edit', 'User\CommentController@edit')->name('user.comments.edit');
Route::put('/user/comments/{id}', 'User\CommentController@update')->name('user.comments.update');
Route::delete('/user/comments/{id}', 'User\CommentController@destroy')->name('user.comments.destroy');
