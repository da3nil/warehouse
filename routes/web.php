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

Route::group(['middleware' => 'auth'], function () {
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

