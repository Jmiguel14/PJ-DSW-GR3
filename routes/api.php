<?php

use App\Product;
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

/*Route::middleware('auth:api')->get('/user', function (Petition $request) {
    return $request->user();
});*/

#Rutas para Product
Route::get('products', 'ProductController@index');
Route::get('products/{product}', 'ProductController@show');
Route::post('products', 'ProductController@store');
Route::put('products/{product}', 'ProductController@update');
Route::delete('products/{product}', 'ProductController@delete');

#Rutas para Petition
Route::get('petitions', 'PetitionController@index');
Route::get('petitions/{petition}', 'PetitionController@show');
Route::post('petitions', 'PetitionController@store');
Route::put('petitions/{petition}', 'PetitionController@update');
Route::delete('petitions/{petition}', 'PetitionController@delete');

#Rutas para Notification
Route::get('notifications', 'NotificationController@index');
Route::get('notifications/{notification}', 'NotificationController@show');
Route::post('notifications', 'NotificationController@store');
Route::put('notifications/{notification}', 'NotificationController@update');
Route::delete('notifications/{notification}', 'NotificationController@delete');

#Rutas para Category
Route::get('categories', 'CategoryController@index');
Route::get('categories/{category}', 'CategoryController@show');
Route::post('categories', 'CategoryController@store');
Route::put('categories/{category}', 'CategoryController@update');
Route::delete('categories/{category}', 'CategoryController@delete');
