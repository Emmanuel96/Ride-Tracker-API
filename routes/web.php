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

Route::get('/', function () {
    return ;
});

Route::get('api/trips/get', 'TripController@getTrips'); 

Route::get('api/trips/get/rider/{id}', 'TripController@getRiderTrips');

Route::get('api/trips/get/rider/completled/{id}', 'TripController@getRiderCompletedTrips');

Route::get('api/trip/complete/{id}', 'TripController@completeTrip');

Route::get('test/trips', 'TripController@testTrips');

Route::post('api/trip/create', 'TripController@createTrip');

Route::get('api/trip/cancel', 'TripController@cancelTrip');
