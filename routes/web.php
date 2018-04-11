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

Route::group(['middleware' => 'auth'], function()
{
  Route::resources([
      'services' => 'ServiceController',
      'required_files' => 'RequiredFileController',
      'pickup_orders' => 'PickupOrderController',
      'management' => 'ManagementController'
  ]);

  Route::middleware('auth')->get('/', 'HomeController@index')->name('index');

  Route::get('/home', 'HomeController@home')->name('home');
});
