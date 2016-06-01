<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'UsersController@index');
Route::get('/registraton', 'UsersController@registr');
Route::get('/login', 'UsersController@getLogin');
Route::get('/image', 'UsersController@image');
Route::get('/setings', 'UsersController@setings');
Route::post('/image_add', 'UsersController@image_add');
Route::post('/setHomeImage', 'UsersController@setHomeImage');
Route::post('/deleteImage', 'UsersController@deleteImage');
Route::post('/login', 'UsersController@postLogin');
Route::post('/logout', 'UsersController@postlogout');
Route::post('/addPosts', 'UsersController@addPosts');
Route::resource('/users', 'UsersController');
Route::resource('/users/setings', 'UsersController');
Route::resource('/posts', 'PostsController');


