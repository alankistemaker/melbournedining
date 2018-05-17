<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ------------------  PT 6.1  ------------------

// Countries
Route::get('countries', 'CUDCountryAPIController@index');
Route::get('countries/show', 'CUDCountryAPIController@show');
Route::post('countries/store', 'CUDCountryAPIController@store');
Route::put('countries/update', 'CUDCountryAPIController@update');
Route::delete('countries/destroy', 'CUDCountryAPIController@destroy');
// Users
Route::get('users', 'CUDUserAPIController@index');
Route::get('users/show', 'CUDUserAPIController@show');
Route::post('users/store', 'CUDUserAPIController@store');
Route::put('users/update', 'CUDUserAPIController@update');
Route::delete('users/destroy', 'CUDUserAPIController@destroy');
// Restaurants
Route::get('restaurants', 'CUDRestaurantAPIController@index');
Route::get('restaurants/show', 'CUDRestaurantAPIController@show');
Route::post('restaurants/store', 'CUDRestaurantAPIController@store');
Route::put('restaurants/update', 'CUDRestaurantAPIController@update');
Route::delete('restaurants/destroy', 'CUDRestaurantAPIController@destroy');

// Post based on restaurant ID
Route::get('postsbasedonrestaurantid', 'CUDPostBasedOnRestaurantAPIController@index');
Route::get('postsbasedonrestaurantid/show', 'CUDPostBasedOnRestaurantAPIController@show');
Route::post('postsbasedonrestaurantid/store', 'CUDPostBasedOnRestaurantAPIController@store');
Route::put('postsbasedonrestaurantid/update', 'CUDPostBasedOnRestaurantAPIController@update');
Route::delete('postsbasedonrestaurantid/destroy', 'CUDPostBasedOnRestaurantAPIController@destroy');