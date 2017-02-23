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

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/verify/{id}/{token}', 'Auth\RegisterController@verify');

Route::get('/app/management/users', 'UserManagement\UserController@index');
Route::get('/app/management/users/{id}', 'UserManagement\UserController@edit');

/*
 | Routes for Part Number Extensions
 |
 */
Route::get('parts/pnes', 'Parts\PartNumberExtensionController@index');
Route::get('parts/pnes/pne', 'Parts\PartNumberExtensionController@showCreateForm');
Route::post('parts/pnes/pne', 'Parts\PartNumberExtensionController@store');
Route::get('parts/pnes/pne/{code}', 'Parts\PartNumberExtensionController@edit');
Route::put('parts/pnes/pne/{code}', 'Parts\PartNumberExtensionController@update');
Route::delete('parts/pnes/pne/{code}', 'Parts\PartNumberExtensionController@delete');

/*
 | Routes for Catalogs
 |
 */
Route::get('parts/catalogs', 'Parts\CatalogController@index');
Route::get('parts/catalogs/catalog', 'Parts\CatalogController@showCreateForm');
Route::post('parts/catalogs/catalog', 'Parts\CatalogController@store');
Route::get('parts/catalogs/catalog/{id}', 'Parts\CatalogController@edit');

/*
 | Routes for managing groups a user belongs to
 |
 */
Route::get('/app/management/users/group/manage', 'UserManagement\UserController@showAddToGroupForm');
Route::post('/app/management/users/group/manage', 'UserManagement\UserController@addToGroup');

Route::get('/app/management/groups', 'UserManagement\GroupController@index');


