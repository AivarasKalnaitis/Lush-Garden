<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('/auth/login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('products', 'ProductController')->except(['show']);
    Route::resource('categories', 'CategoryController')->except(['show']);
    Route::resource('features', 'FeatureController')->except(['show']);
    Route::resource('orders', 'OrderController')->only(['index', 'edit', 'update', 'show']);
    Route::get('orders/{order}/item/{orderItem}/edit', 'OrderItemController@edit')->name('orders.item.edit');
    Route::put('orders/{order}/item/{orderItem}', 'OrderItemController@update')->name('orders.item.update');
});
