<?php

use App\Models\Promo_code;
use Illuminate\Support\Facades\Route;

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

// this is admin routes


    Route::get('admin/login', 'Admin\AdminController@index');
    Route::post('admin/checklogin', 'Admin\AdminController@checklogin');


    Route::get('user/user', 'User\UserController@index')->name('location.index');
    // this is user routes

    // Route::group(['middleware'=>'admin_auth'],function(){

   //admin
    Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('admin/logout', 'Admin\AdminController@logout')->name('logout');

   // parent crud

    Route::get('admin/parents', 'Admin\ParentController@index')->name('parents.index');
    Route::get('admin/parents/create', 'Admin\ParentController@create')->name('parents.create'); //add
    Route::post('admin/parents/save', 'Admin\ParentController@save')->name('parents.save');
    Route::get('admin/parents/edit/{id}', 'Admin\ParentController@edit')->name('parents.edit');
    Route::post('admin/parents/update/{id}', 'Admin\ParentController@update')->name('parents.update');
    Route::post('admin/parents/delete/{id}', 'Admin\ParentController@destroy_undestroy')->name('parents.delete');

    // parents map open

    Route::get('admin/parent/map', 'Admin\ParentController@parentmap')->name('parent.map');



    // save lat long of parents
    Route::post('admin/parent/map/lat_long', 'Admin\ParentController@parent_latlong_save')->name('parent.map');


    // Drivers crud

    Route::get('admin/drivers', 'Admin\DriversController@index')->name('drivers.index');
    Route::get('admin/drivers/create', 'Admin\DriversController@create')->name('drivers.create'); //add
    Route::post('admin/drivers/save', 'Admin\DriversController@save')->name('drivers.save');
    Route::get('admin/drivers/edit/{id}', 'Admin\DriversController@edit')->name('drivers.edit');
    Route::post('admin/drivers/update/{id}', 'Admin\DriversController@update')->name('drivers.update');
    Route::post('admin/drivers/delete/{id}', 'Admin\DriversController@destroy_undestroy')->name('drivers.delete');
    Route::get('admin/drivers/map', 'Admin\DriversController@map')->name('drivers.map');







//  =================================  settings ==========================

     Route::get('admin/settings','Admin\SettingsController@edit')->name('settings.index');

     Route::post('admin/settings/map/lat_long','Admin\SettingsController@update_save')->name('settings.update');

//  =================================  notification ==========================


     Route::get('admin/notification','Admin\NotificationController@index')->name('notification.index');
     Route::get('admin/notification/create', 'Admin\NotificationController@create')->name('notification.create'); //add
     Route::post('admin/notification/save', 'Admin\NotificationController@save')->name('notification.save');
     Route::get('admin/notification/edit/{id}', 'Admin\NotificationController@edit')->name('notification.edit');
     Route::post('admin/notification/update/{id}', 'Admin\NotificationController@update')->name('notification.update');
     Route::post('admin/notification/delete/{id}', 'Admin\NotificationController@destroy_undestroy')->name('notification.delete');








//     Route::group(['middleware'=>'user_auth','prefix'=>'user'],function(){


// });









