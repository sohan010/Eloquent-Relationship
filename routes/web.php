<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-info', 'HomeController@userInfo');

Route::resource('post', 'PostController');
Route::get('post/comment/create/{id}', 'PostController@CreatePostComment');
Route::post('post/comment/store', 'PostController@PostCommentStore');

Route::resource('product', 'ProductController');
Route::resource('image', 'ImageController');
Route::resource('video', 'VideoController');

Route::get('create-comment/{id}', 'VideoController@CreateComment')->name('create.comment');
Route::post('comment/store/', 'VideoController@CommentStore');
