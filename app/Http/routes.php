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
Route::get('registration', 'UsersController@registr');
Route::get('login', 'UsersController@getLogin');
Route::get('/image', 'ImagesController@image');
Route::get('/setings', 'UsersController@setings');
Route::post('/user-search', 'UsersController@userSearch');
Route::post('/image_add', 'ImagesController@image_add');
Route::post('/setHomeImage', 'ImagesController@setHomeImage');
Route::post('/deleteImage', 'ImagesController@deleteImage');
Route::post('/login', 'UsersController@postLogin');
Route::post('/logout', 'UsersController@postlogout');
Route::post('/addPosts', 'PostsController@addPosts');
Route::resource('/users', 'UsersController');
Route::resource('/users/setings', 'UsersController');
Route::resource('/posts', 'PostsController');
Route::resource('/guest_page', 'GuestsPageController');



