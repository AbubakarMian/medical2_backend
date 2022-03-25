<?php


// dd('asdsad');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::post('user/login', 'Services\UserController@create');
// Route::post('user/drivers', 'Services\DriversController@create');
// Route::get('/start_trip', 'Services\TripController@start_trip');
// Route::get('/driver_student_list', 'Services\DriversController@get_students_list');

Route::group(['middleware' => 'auth.client_token','prefix'=>'user'], function () {

//    user login
    Route::post('/signup', 'Services\UserController@signUp');
    Route::post('/login', 'Services\UserController@login');
    Route::post('/enter_otp', 'Services\UserController@enter_otp');
    Route::post('/update_profile', 'Services\UserController@update');

    // /drivers contoller

    Route::post('/drivers', 'Services\DriversController@lat_long');
    Route::get('/driver_trip_list', 'Services\DriversController@driver_trip_details');
    Route::get('/driver_student_list', 'Services\DriversController@get_students_list');


 // /parent contoller
    Route::post('/drivers_parents', 'Services\ParentsController@parents_lat_long');
    Route::get('/parents', 'Services\ParentsController@get_lat_long');

    // Trip controller

    Route::post('/start_trip', 'Services\TripController@start_trip');
    Route::post('/end_trip', 'Services\TripController@end_trip');


// notifiaction controller
    Route::get('/notifiaction', 'Services\NotifiactionController@get_list');
    Route::get('/user_notification', 'Services\NotifiactionController@user_notification');
    Route::get('/count_notifiacation', 'Services\NotifiactionController@count_notifiacation');


    // chat screen
    Route::post('/send_msg', 'Services\ChatController@user_chat');
    Route::get('/chat_list', 'Services\ChatController@user_chat_list');


});
