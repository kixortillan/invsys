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

Route::post('/login', 'LoginController@login');

Route::middleware('auth:api')->get('/parts/pnes', 'Part\PartNumberExtensionController@index')
	->name('list-pnes');
Route::middleware('auth:api')->post('/parts/pnes/pne', 'Part\PartNumberExtensionController@store')
 	->name('new-pnes');


Route::middleware('auth:api')->get('/parts/brands', 'Part\BrandController@index')
	->name('list-brands');
Route::middleware('auth:api')->get('/parts/brands/brand', 'Part\BrandController@showCreateForm')
	->name('new-brands-form');
Route::middleware('auth:api')->post('/parts/brands/brand', 'Part\BrandController@store')
	->name('new-brands');


Route::middleware('auth:api')->get('/inventory/skus', 'Inventory\StockKeepingUnitController@index')
	->name('list-skus');
Route::middleware('auth:api')->get('/inventory/skus/sku', 'Inventory\StockKeepingUnitController@showCreateForm')
	->name('new-skus-form');
Route::middleware('auth:api')->post('/inventory/skus/sku', 'Inventory\StockKeepingUnitController@store')
	->name('new-skus');

Route::middleware('auth:api')->get('/config/currencies', 'Config\CurrencyController@currencies');