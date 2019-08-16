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
    return 'home';
});

Route::get('api/trips/get/{id}', 'TripController@getTrip');

Route::get('api/trips/get', 'TripController@getTrips'); 

Route::get('api/trips/get/rider/{id}', 'TripController@getRiderTrips');

Route::get('api/trips/get/rider/completed/{id}', 'TripController@getRiderCompletedTrips');

Route::get('api/trip/complete/{id}', 'TripController@completeTrip');

Route::get('test/trips', 'TripController@testTrips');

Route::post('api/trip/create', 'TripController@createTrip');

Route::get('api/trip/cancel/{id}', 'TripController@cancelTrip');


// Auth::routes();

Route::post('/api/login', 'LoginController@postLogin')->name('login'); 

Route::get('/home', 'HomeController@index')->name('home');
