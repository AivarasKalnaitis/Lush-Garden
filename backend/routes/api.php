<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('API\Auth')->prefix('auth')->group(function () {
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');
});

Route::namespace('API')->group(function () {
    Route::get('search', 'SearchController@search');

    Route::get('categories', 'CategoryController@index');
    Route::get('categories/{slug}', 'CategoryController@products');

    Route::get('products', 'ProductController@index');
    Route::get('products/{slug}', 'ProductController@show');

    Route::middleware('auth:api')->group(function () {
        Route::get('order', 'OrderController@index');
        Route::post('order', 'OrderController@store');
        Route::get('order/{order}', 'OrderController@show');
    });
});

