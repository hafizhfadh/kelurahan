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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');
  Route::resources([
      'services' => 'API\ServiceController',
      'pickup_orders' => 'API\PickupOrderController'
  ]);
});

Route::get('required_file', 'API\Select2Controller@getRequired');
Route::get('get_services', 'API\Select2Controller@getService');

Route::prefix('datatable')->group(function () {
  Route::get('/orders', 'PickupOrderController@orders');
  Route::get('/managements', 'ManagementController@management');
});
