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
Route::get('/user/home/', 'User\HomeController@index')->name('user.home');
Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');
Route::get('/admin/users/{id}', 'Admin\UserController@show')->name('admin.users.show');

//User Route
Route::get('/user/profile/{id}', 'User\ProfileController@show')->name('user.profile.show');
Route::get('/user/profile/edit', 'User\ProfileController@edit')->name('user.profile.edit');
Route::put('/user/profile/{id}', 'User\ProfileController@update')->name('user.profile.update');
Route::get('/user/profile/{id}/follow', 'User\ProfileController@followUser')->name('user.follow');
Route::get('/user/profile/{id}/unfollow', 'User\ProfileController@unFollowUser')->name('user.unfollow');
Route::get('/user/profile/followers/{id}', 'User\ProfileController@followers')->name('user.profile.followers');
Route::get('/user/profile/followings/{id}', 'User\ProfileController@followings')->name('user.profile.followings');

Route::get('/user/posts', 'User\PostController@index')->name('user.posts.index');
Route::get('/user/posts/create', 'User\PostController@create')->name('user.posts.create');
Route::post('/user/posts/store', 'User\PostController@store')->name('user.posts.store');
Route::get('/user/posts/{id}', 'User\PostController@show')->name('user.posts.show');
Route::get('/user/posts/{id}/edit', 'User\PostController@edit')->name('user.posts.edit');
Route::put('/user/posts/{id}', 'User\PostController@update')->name('user.posts.update');
Route::delete('/user/posts/{id}', 'User\PostController@destroy')->name('user.posts.destroy');

Route::get('/posts/{id}/create', 'User\CommentController@create')->name('user.comments.create');
Route::post('/posts/{id}/store', 'User\CommentController@store')->name('user.comments.store');
Route::delete('/posts/{id}/comments/{cid}', 'User\CommentController@destroy')->name('user.comments.destroy');



Route::get('/search','User\ProfileController@search')->name('user.search.index');
