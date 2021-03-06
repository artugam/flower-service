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




Auth::routes();
Route::get('/', 'MainController@index')->name('welcome');


Route::group(['middleware' => ['auth', 'admin']], function (){
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/users', 'AdminController@showUsers')->name('usersAdmin');
    Route::get('/admin/orders', 'AdminController@showOrders')->name('ordersAdmin');

    Route::get('/admin/user/{id}', [
        'as' => 'userAdmin.show',
        'uses' => 'AdminController@concreteUser'
    ]);

});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/order', 'OrderController@index')->name('order');

Route::post('/order/make', 'OrderController@makeOrder')->name('makeOrder');

Route::get('/order/form', 'OrderController@order')->name('orderForm');

Route::get('/apiRefuse', 'MainController@index')->name('apiRefuse');






