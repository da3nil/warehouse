<?php

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
    return redirect()
        ->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', function () {
    return redirect()
        ->route('products.index');
})->name('home');

Route::get('/cart/{id}/add', 'CartController@add')->name('cart.add');
Route::delete('/cart/{rowId}/del', 'CartController@del')->name('cart.del');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');
Route::post('/cart/checkout', 'CartController@checkout')->name('cart.checkout');

Route::group(['prefix' => 'user'], function () {
    Route::resource('products', 'Users\ProductController')->names('users.products');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


	// Products
    Route::resource('products', 'ProductController')->names('products');

    // Categories
    Route::resource('categories', 'ProductCategoryController')->names('categories');

    // Locations
    Route::resource('locations', 'LocationController')->names('locations');

    // Types
    Route::resource('types', 'ProductTypeController')->names('types');
});

