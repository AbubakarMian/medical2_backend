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

     // Route::get('user/home', 'Admin\UserController@index');
     // Route::get('user', 'Admin\UserController@index');
     Route::get('/', 'User\UserController@index');
     Route::get('registration', 'User\UserController@registration');


    Route::get('admin/login', 'Admin\AdminController@index');
    Route::post('admin/checklogin', 'Admin\AdminController@checklogin');


    Route::get('admin/users', 'Admin\UserController@index')->name('location.index');
    Route::get('admin/users/get_users/{id}','Admin\UserController@getUsers')->name('users.get_users');

    // this is user routes

    // Route::group(['middleware'=>'admin_auth'],function(){

   //admin
    Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('admin/logout', 'Admin\AdminController@logout')->name('logout');

   // courses crud

    Route::get('admin/courses', 'Admin\CoursesController@index')->name('courses.index');
    Route::get('admin/courses/create', 'Admin\CoursesController@create')->name('courses.create'); //add
    Route::post('admin/courses/save', 'Admin\CoursesController@save')->name('courses.save');
    Route::get('admin/courses/edit/{id}', 'Admin\CoursesController@edit')->name('courses.edit');
    Route::post('admin/courses/update/{id}', 'Admin\CoursesController@update')->name('courses.update');
    Route::post('admin/courses/delete/{id}', 'Admin\CoursesController@destroy_undestroy')->name('courses.delete');

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



  // question list open
  Route::get('admin/question_list/{id}', 'Admin\QuizController@question_list')->name('quiz.question_list');
  Route::post('admin/quiz_question_list/update', 'Admin\QuizController@quiz_question_list_update')->name('quiz.quiz_question_list_update');

  // question CRUD

  Route::get('admin/question', 'Admin\QuestionController@index')->name('admin.question');

  // create and save question

  Route::get('admin/question/create', 'Admin\QuestionController@create')->name('question.create');
  Route::post('admin/question/save', 'Admin\QuestionController@save')->name('question.save');

 // edit and update question

  Route::get('admin/question/edit/{id}', 'Admin\QuestionController@edit')->name('question.edit');
  Route::post('admin/question/update/{id}', 'Admin\QuestionController@update')->name('question.update');

// delete question
  Route::post('admin/question/delete/{id}', 'Admin\QuestionController@destroy_undestroy')->name('question.delete');


  // quiz CRUD
  Route::get('admin/quiz', 'Admin\QuizController@index')->name('admin.quiz');

  // create and save quiz

  Route::get('admin/quiz/create', 'Admin\QuizController@create')->name('quiz.create');
  Route::post('admin/quiz/save', 'Admin\QuizController@save')->name('quiz.save');

  // edit and update quiz

  Route::get('admin/quiz/edit/{id}', 'Admin\QuizController@edit')->name('quiz.edit');
  Route::post('admin/quiz/update/{id}', 'Admin\QuizController@update')->name('quiz.update');

  // delete quiz
  Route::post('admin/quiz/delete/{id}', 'Admin\QuizController@destroy_undestroy')->name('quiz.delete');

  // question list open
  Route::get('admin/question_list/{id}', 'Admin\QuizController@question_list')->name('quiz.question_list');
  Route::post('admin/quiz_question_list/update', 'Admin\QuizController@quiz_question_list_update')->name('quiz.quiz_question_list_update');
  Route::get('admin/getquestion/{id}', 'Admin\QuestionController@getQuestion')->name('question_list');
  Route::get('admin/course/questions/{id}', 'Admin\QuestionController@course_question_list')->name('question_list');


//   SETTINGS
  Route::get('admin/settings', 'Admin\SettingsController@index')->name('settings.index');
  Route::get('admin/settings/edit/{id}', 'Admin\SettingsController@edit')->name('settings.edit');
  Route::post('admin/settings/update/{id}', 'Admin\SettingsController@update')->name('settings.save');
  Route::post('admin/settings/upload_cropped_image', 'Admin\SettingsController@upload_cropped_image')->name('settings.upload_cropped_image');





//     Route::group(['middleware'=>'user_auth','prefix'=>'user'],function(){


// });









