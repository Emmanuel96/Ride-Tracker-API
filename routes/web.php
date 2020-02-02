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

Route::post('/api/login', 'LoginController@postLogin')->name('login');
// Route::get('api/trips/get', 'TripController@getTrips');

Route::get('api/ongoing-trips', 'TripController@getOngoingTrips')->name('trips.ongoing');


Route::middleware('auth:api')->group(function () {
    Route::get('api/company/{company_id}/role/{role}', 'TripController@getCompanyTrips')->name('companyTrips');

    Route::get('api/trips/get/{id}', 'TripController@getTrip');

    Route::get('api/trips/get', 'TripController@getTrips');

    Route::get('api/trips/get/rider/{id}', 'TripController@getRiderTrips');

    Route::get('api/trips/get/rider/completed/{id}', 'TripController@getRiderCompletedTrips');

    Route::get('api/trip/complete/{id}', 'TripController@completeTrip');

    Route::get('test/trips', 'TripController@testTrips');

    Route::post('api/trip/create', 'TripController@createTrip');

    Route::post('api/trip/update/{id}', 'TripController@updateTrip');

    Route::get('api/trip/cancel/{id}', 'TripController@cancelTrip');

    Route::get('api/trip/pickup/{id}', 'TripController@pickUp');

    Route::get('api/ongoing-trips/{id}', 'TripController@getOngoingTrips')->name('trips.ongoing');

    Route::post('api/rider/create', 'RiderController@createRider');

    Route::get('api/rider/get/{id}', 'RiderController@getRider');

    Route::post('api/rider/update/{id}', 'RiderController@updateRider');

    Route::get('api/company/{company_id}/riders/get/role/{user_role}', 'RiderController@getRiders');

    Route::get('api/users/get', 'UserController@getAllUsers');

    Route::get('api/trip/delete/{id}', 'TripController@deleteTrip');

    Route::get('api/rider/delete/{id}', 'RiderController@deleteRider');

    Route::get('api/delete/user/{id}', 'UserController@deleteUser');

    Route::post('api/create/user', 'UserController@createUser');

    Route::post('api/update/user', 'UserController@updateUser');

    Route::get('api/get/company', 'CompanyController@getAll');

    Route::get('api/get/user/{id}', 'UserController@getUser');

    Route::post('api/delete/company/{id}', 'CompanyController@deleteCompany');

    Route::post('api/update/company', 'CompanyController@updateCompany');


    //please try and understand why api find with new but not the first
    Route::post('api/create/company' . 'CompanyController@createCompany');
    Route::post('api/create/new/company', 'CompanyController@createCompany');;
    //ends

    Route::get('api/get/company/{id}', 'CompanyController@getCompany');
});



// Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
