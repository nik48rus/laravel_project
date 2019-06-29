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

Route::get('/сonfirm', 'Confirm@index');

Route::get('/userinfo', 'UInfo@index');

Route::get('/comm', 'UInfo@comm');

Route::get('/topcustomers', 'Lists@cust');

Route::get('/topexecutors', 'Lists@exec');

Route::get('/myorders', 'MOrders@index');

Route::get('/myorders/info', 'MOrders@info');

Route::get('/home/save', 'HomeSave@index');

Route::get('/home/search/order', 'Search@order');

Route::get('/home/search/deliver', 'Search@orderdel');