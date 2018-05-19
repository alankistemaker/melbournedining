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

Route::resource('restaurants', 'RestaurantController');
Route::resource('users', 'UserController');
Route::resource('countries', 'CountryController');
Route::resource('categories', 'CategoryController');
Route::resource('comments', 'CommentController');
Route::resource('posts', 'PostController');
Route::resource('roles', 'RoleController');

Route::view('/home', 'home');

Route::get('restaurantwithposts/{id}', 'RestaurantController@restaurantwithposts');
Route::get('postwithcomments/{id}', 'PostController@postwithcomments');
Route::get('comments/create/{id}', 'CommentController@commentGivenPostID');
?>
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
