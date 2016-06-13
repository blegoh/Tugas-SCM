<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('supplier','SupplierController');

Route::resource('product','ProductController');

Route::resource('receiving','ReceivingController');

Route::resource('preorder','PreOrderController');

Route::resource('sale','SaleController',['only' => ['index','store']]);

Route::get('priority','PriorityController@index');

Route::post('priority','PriorityController@add');

Route::group(['prefix' => 'api'], function(){
    Route::get('product','ProductController@indexAPI');
    Route::get('saletemp','SaleController@indexAPI');
    Route::post('saletemp','SaleController@addList');
    Route::resource('saletemp','SaleController',['except' => ['index','store']]);
});
