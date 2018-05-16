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
Route::get('createpostwithrestid/{id}', 'PostController@createpostwithrestid');

Route::put('addcategory/{id}', 'CategoryController@addRestaurants')->name('addcategory');
Route::get('addcategory/{id}', 'CategoryController@addRestaurants');

Route::put('addusertocountry/{id}', 'CountryController@addUserToCountry')->name('addusertocountry');
Route::get('addusertocountry/{id}', 'CountryController@addUserToCountry');

Route::put('addusertorole/{id}', 'RoleController@addUserToRole')->name('addusertorole');
Route::get('addusertorole/{id}', 'RoleController@addUserToRole');

?>