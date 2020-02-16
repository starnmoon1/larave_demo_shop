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

use Illuminate\Support\Facades\Route;
Route::get('/login', 'LoginController@showFormLogin')->name('getLogin');
Route::post('/login','LoginController@login')->name('login');
Route::get('/','LoginController@logout')->name('logout');
Route::middleware('checkLogin')->prefix('users')->group(function (){
    Route::get('dashboard', 'UserController@index')->name('dashboard');
});

Route::middleware('checkLogin')->prefix('categories')->group(function (){
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/create', 'CategoryController@store')->name('category.store');
    Route::get('/{id}/update', 'CategoryController@edit')->name('category.edit');
    Route::post('/{id}/update', 'CategoryController@update')->name('category.update');
    Route::get('/{id}/delete', 'CategoryController@destroy')->name('category.destroy');
    Route::get('{id}/show', 'CategoryController@show')->name('category.show');
    Route::get('/search', 'CategoryController@search')->name('category.search');
});

Route::middleware('checkLogin')->prefix('products')->group(function (){
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/create', 'ProductController@store')->name('product.store');
    Route::get('/{id}/update', 'ProductController@edit')->name('product.edit');
    Route::post('/{id}/update', 'ProductController@update')->name('product.update');
    Route::get('/{id}/delete', 'ProductController@destroy')->name('product.destroy');
    Route::get('{id}/show', 'ProductController@show')->name('product.show');
    Route::get('/search', 'ProductController@search')->name('product.search');
});

Route::get('/shop', 'shopController@index')->name('shop.index');
Route::get('/products/{id}/add-to-cart', 'CartController@addToCart')->name('addToCart');
Route::get('/cart','CartController@index')->name('cartIndex');
Route::post('/cart/{id}','CartController@updateProductIntoCart')->name('updateCart');
Route::get('/cart/{id}', 'CartController@removeProductIntoCart')->name('removeCart');


