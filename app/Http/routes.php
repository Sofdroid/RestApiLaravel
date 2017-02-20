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

Route::group(['middleware' => ['web']], function () {
	Route::get ( '/product', 'ProductController@index' );
	Route::get ( '/product/view/{id}', 'ProductController@show' );
	Route::get ( '/product/delete/{id}', 'ProductController@destroy' );
	Route::get ( '/product/edit/{id}', 'ProductController@edit' );
	Route::get ( '/product/search', 'ProductController@search' );
	Route::post ( '/product', 'ProductController@store' );
	Route::post ( '/product/update', 'ProductController@update' );
	Route::get ( '/productall', 'ProductController@all' );
});
 

Route::group(['middleware' => ['web']], function () {
	Route::get ( '/login', 'LoginController@index' );
	Route::get ( '/login/view/{id}', 'LoginController@show' );
	Route::get ( '/login/delete/{id}', 'LoginController@destroy' );
	Route::get ( '/login/edit/{id}', 'LoginController@edit' );
	Route::get ( '/login/search', 'LoginController@search' );
	Route::post ( '/login', 'LoginController@store' );
	Route::post ( '/login/update', 'LoginController@update' );
	Route::get ( '/login/user/{username}/pwd/{password}', 'LoginController@login' );
	Route::get ( '/loginall', 'LoginController@all' );
});

Route::group(['middleware' => ['web']], function () {
	Route::get ( '/staff', 'StaffController@index' );
	Route::get ( '/staff/view/{id}', 'StaffController@show' );
	Route::get ( '/staff/delete/{id}', 'StaffController@destroy' );
	Route::get ( '/staff/edit/{id}', 'StaffController@edit' );
	Route::get ( '/staff/search', 'StaffController@search' );
	Route::post ( '/staff', 'StaffController@store' );
	Route::post ( '/staff/update', 'StaffController@update' );
	Route::get ( '/staffall', 'StaffController@all' );
});

Route::group(['middleware' => ['web']], function () {
	Route::get ( '/invoice', 'InvoiceController@index' );
	Route::get ( '/invoice/view/{id}', 'InvoiceController@show' );
	Route::get ( '/invoice/delete/{id}', 'InvoiceController@destroy' );
	Route::get ( '/invoice/edit/{id}', 'InvoiceController@edit' );
	Route::get ( '/invoice/search', 'InvoiceController@search' );
	Route::post ( '/invoice', 'InvoiceController@store' );
	Route::post ( '/invoice/update', 'InvoiceController@update' );
	Route::get ( '/invoiceall', 'InvoiceController@all' );
});