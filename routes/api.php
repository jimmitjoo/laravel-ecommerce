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

Route::post('addtocart', 'OrderItemsController@addtoorder');

Route::resource('orders', 'OrdersController');
Route::get('orders/{id}/items', 'OrdersController@showWithItems');
Route::resource('orderitems', 'OrderItemsController');