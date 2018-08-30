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

// Authentication
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


// Home
// Set Clients page as default
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'ClientController@index')->name('home');


// Clients
Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/clients/create', 'ClientController@create');

Route::post('/clients', 'ClientController@store');

Route::get('/clients/{client}','ClientController@show');

Route::get('/clients/{client}/edit', 'ClientController@edit');

Route::delete('/clients/{client}', 'ClientController@destroy');

Route::put('/clients/{client}', 'ClientController@update');


// Stock
Route::get('/stock', 'StockController@index')->name('stock');

Route::get('/stock/create', 'StockController@create');

Route::post('/stock', 'StockController@store');

Route::get('/stock/{stock}', 'StockController@show');

Route::get('/stock/{stock}/edit', 'StockController@edit');

Route::delete('/stock/{stock}', 'StockController@destroy');

Route::put('/stock/{stock}', 'StockController@update');


// Buy-In
Route::get('/buyin', 'BuyinController@index')->name('buyin');

Route::get('/buyin/create', 'BuyinController@create');

Route::post('/buyin','BuyinController@store');

Route::get('/buyin/{buyin}', 'BuyinController@show');

Route::get('/buyin/{buyin}/edit', 'BuyinController@edit');

Route::delete('/buyin/{buyin}', 'BuyinController@destroy');

Route::put('/buyin/{buyin}', 'BuyinController@update');

// Buy-Back
Route::get('/buyback/create', 'BuybackController@create');