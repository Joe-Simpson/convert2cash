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
Route::get('/', 'HomeController@index')->name('home');


// Clients
Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/clients/create', 'ClientController@create');

Route::post('/clients', 'ClientController@store');

Route::get('/clients/{client}','ClientController@show');

Route::get('/clients/{client}/edit', 'ClientController@edit');

Route::put('/clients/{client}', 'ClientController@update');

Route::delete('/clients/{client}', 'ClientController@destroy');

// Client Notes
Route::put('/client-notes/', 'ClientNotesController@store');

Route::delete('/client-notes/{client}', 'ClientNotesController@destroy');

// Stock
Route::get('/stock', 'StockController@index')->name('stock');

Route::get('/stock/create', 'StockController@create');

Route::post('/stock', 'StockController@store');

Route::get('/stock/{stock}', 'StockController@show');

Route::get('/stock/{stock}/edit', 'StockController@edit');

Route::put('/stock/{stock}', 'StockController@update');

Route::delete('/stock/{stock}', 'StockController@destroy');


// Buy-In
Route::get('/buyin', 'BuyinController@index')->name('buyin');

Route::get('/buyin/create', 'BuyinController@create');

Route::post('/buyin','BuyinController@store');

Route::get('/buyin/{buyin}', 'BuyinController@show');

Route::get('/buyin/{buyin}/edit', 'BuyinController@edit');

Route::put('/buyin/{buyin}', 'BuyinController@update');

Route::delete('/buyin/{buyin}', 'BuyinController@destroy');

// Buy-Back
Route::get('/buyback', 'BuybackController@index')->name('buyback');

Route::get('/buyback/create', 'BuybackController@create');

Route::post('/buyback','BuybackController@store');

Route::get('/buyback/{buyback}', 'BuybackController@show');

Route::get('/buyback/{buyback}/edit', 'BuybackController@edit');

Route::put('/buyback/{buyback}', 'BuybackController@update');

Route::delete('/buyback/{buyback}', 'BuybackController@destroy');

Route::get('/buyback/{buyback}/seize', 'BuybackController@seize');

Route::get('/buyback/{buyback}/cancel', 'BuybackController@cancel');

Route::get('/buyback/{buyback}/buy-back', 'BuybackController@buyBack');

Route::get('/buyback/{buyback}/clone', 'BuybackController@clone');

Route::get('/buyback/{buyback}/renew', 'BuybackController@renew');


// Sales
Route::get('/sales', 'SalesController@index')->name('sales');

Route::get('/sales/create', 'SalesController@create');

Route::post('/sales', 'SalesController@store');

Route::get('/sales/{sales}', 'SalesController@show');

Route::get('/sales/{sales}/edit', 'SalesController@edit');

Route::put('/sales/{sales}','SalesController@update');

// Layaways
Route::get('/layaways', 'LayawaysController@index')->name('layaways');

Route::get('/layaways/create', 'LayawaysController@create');

Route::post('/layaways', 'LayawaysController@store');

Route::get('/layaways/{layaways}', 'LayawaysController@show');

Route::get('/layaways/{layaways}/cancel', 'LayawaysController@cancel');

// Layaway Payments
Route::put('/layaways-payment', 'LayawayPaymentController@store');

Route::delete('/layaways-payment/{layaways}', 'LayawayPaymentController@destroy');
