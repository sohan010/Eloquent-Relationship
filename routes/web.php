<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-info', 'HomeController@userInfo');

Route::resource('product', 'ProductController');
Route::resource('post', 'PostController');
Route::resource('image', 'ImageController');
