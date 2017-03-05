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

Route::get('users', 'UsersController@index');
Route::get('users/{id}', 'UsersController@show');

Route::post('addtocart', 'OrderItemsController@addtoorder');

Route::resource('orders', 'OrdersController');
Route::get('orders/{id}/items', 'OrdersController@showWithItems');
Route::get('orders/{order_id}/items/{item_id}/delete', 'OrdersController@showWithItems');
Route::resource('orderitems', 'OrderItemsController');