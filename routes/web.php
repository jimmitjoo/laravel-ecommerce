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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function(){

    Route::get('products', ['as' => 'admin.products.index', 'uses' => 'ProductsController@index']);
    Route::get('products/create', ['as' => 'admin.products.create', 'uses' => 'ProductsController@create']);
    Route::get('products/edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'ProductsController@edit']);
    Route::get('products/{id}', ['as' => 'admin.products.show', 'uses' => 'ProductsController@show']);
    Route::post('products', ['as' => 'admin.products.store', 'uses' => 'ProductsController@store']);
    Route::post('products/update/{id}', ['as' => 'admin.products.update', 'uses' => 'ProductsController@update']);
    Route::get('products/delete/{id}', ['as' => 'admin.products.delete', 'uses' => 'ProductsController@destroy']);

    Route::get('categories', ['as' => 'admin.categories.index', 'uses' => 'CategoriesController@index']);
    Route::get('categories/create', ['as' => 'admin.categories.create', 'uses' => 'CategoriesController@create']);
    Route::get('categories/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::get('categories/{id}', ['as' => 'admin.categories.show', 'uses' => 'CategoriesController@show']);
    Route::post('categories', ['as' => 'admin.categories.store', 'uses' => 'CategoriesController@store']);
    Route::post('categories/update/{id}', ['as' => 'admin.categories.update', 'uses' => 'CategoriesController@update']);
    Route::get('categories/delete/{id}', ['as' => 'admin.categories.delete', 'uses' => 'CategoriesController@destroy']);

});