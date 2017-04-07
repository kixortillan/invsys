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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Auth::routes();

//Route::get('/', 'Auth\LoginController@showLoginForm');

// Route::get('/', function(){
// 	return view('app');
// });

Route::any('/{all}', function(){
	return view('app');
})->where(['all' => '.*']);

// Route::get('/dashboard', 'DashboardController@index');

// Route::get('/verify/{id}/{token}', 'Auth\RegisterController@verify');

// Route::get('/app/management/users', 'UserManagement\UserController@index');
// Route::get('/app/management/users/{id}', 'UserManagement\UserController@edit');

// /*
//  | Routes for Part Number Extensions
//  |
//  */
//Route::get('parts/pnes', 'Part\PartNumberExtensionController@index')
//	->name('list-pnes');
// Route::get('parts/pnes/pne', 'Part\PartNumberExtensionController@showCreateForm')
// 	->name('new-pnes-form');
//Route::post('parts/pnes/pne', 'Part\PartNumberExtensionController@store')
// 	->name('new-pnes');
// Route::get('parts/pnes/pne/{code}', 'Part\PartNumberExtensionController@edit')
// 	->name('view-pnes');
// Route::put('parts/pnes/pne/{code}', 'Part\PartNumberExtensionController@update')
// 	->name('update-pnes');
// Route::delete('parts/pnes/pne/{code}', 'Part\PartNumberExtensionController@delete')
// 	->name('delete-pnes');

// /*
//  | Routes for Stock Keeping Units
//  |
//  */
// Route::get('inventory/skus', 'Inventory\StockKeepingUnitController@index')
// 	->name('list-skus');
// Route::get('inventory/skus/sku', 'Inventory\StockKeepingUnitController@showCreateForm')
// 	->name('new-skus-form');
// Route::post('inventory/skus/sku', 'Inventory\StockKeepingUnitController@store')
// 	->name('new-skus');
// Route::get('inventory/skus/sku/{id}', 'Inventory\StockKeepingUnitController@edit')
// 	->name('view-skus');
// Route::post('inventory/skus/upload', 'Inventory\StockKeepingUnitController@upload')
// 	->name('upload-skus');
 Route::get('inventory/skus/search', 'Inventory\StockKeepingUnitController@search')
 	->name('search-skus');

// /*
//  | Routes for Brands
//  |
//  */
// Route::get('parts/brands', 'Part\BrandController@index')
// 	->name('list-brands');
// Route::get('parts/brands/brand', 'Part\BrandController@showCreateForm')
// 	->name('new-brands-form');
// Route::post('parts/brands/brand', 'Part\BrandController@store')
// 	->name('new-brands');
// Route::get('parts/brands/brand/{name}', 'Part\BrandController@edit')
// 	->name('view-brands');
// Route::put('parts/brands/brand', 'Part\BrandController@update')
// 	->name('update-brands');

// /*
//  | Routes for Purchase Order
//  |
//  */
// Route::get('purchases/purchase/order', 'Purchasing\PurchaseOrderController@showCreateForm')
// 	->name('new-purchase-order-form');
// Route::post('purchases/purchase/order/upload', 
// 	'Purchasing\PurchaseOrderController@uploadPurchaseOrderFile')
// 	->name('upload-purchase-order-file');

/*
 | Routes for Receiving
 |
 */
// Route::get('inventory/receiving/reports/report', 'Inventory\ReceivingController@showCreateForm')
// 	->name('new-receiving-report-form');
Route::get('/inventory/receiving/reports', 'Inventory\ReceivingController@index')
	->name('list-receiving-report');
Route::post('/inventory/receiving/reports/report', 'Inventory\ReceivingController@store')
	->name('new-receiving-report');


// /*
//  | Routes for managing groups a user belongs to
//  |
//  */
// Route::get('/app/management/users/group/manage', 'UserManagement\UserController@showAddToGroupForm');
// Route::post('/app/management/users/group/manage', 'UserManagement\UserController@addToGroup');

// Route::get('/app/management/groups', 'UserManagement\GroupController@index');

Route::get('/inventory/binnings/location/search', 'Inventory\BinController@searchLocation');
