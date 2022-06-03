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

     Route::post('user/save', 'User\UserController@save');




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




//  =================================  Category ==========================
Route::get('admin/category', 'Admin\CategoryController@index')->name('category.index');

Route::get('admin/category/create', 'Admin\CategoryController@create')->name('category.create'); //add
Route::post('admin/category/save', 'Admin\CategoryController@save')->name('category.save');

Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
Route::post('admin/category/update/{id}', 'Admin\CategoryController@update')->name('category.update');

Route::post('admin/category/delete/{id}', 'Admin\CategoryController@destroy_undestroy')->name('category.delete');

//  =================================  Books ==========================
Route::get('admin/books', 'Admin\BooksController@index')->name('books.index');

Route::get('admin/books/create', 'Admin\BooksController@create')->name('books.create'); //add
Route::post('admin/books/save', 'Admin\BooksController@save')->name('books.save');

Route::get('admin/books/edit/{id}', 'Admin\BooksController@edit')->name('books.edit');
Route::post('admin/books/update/{id}', 'Admin\BooksController@update')->name('books.update');

Route::post('admin/books/delete/{id}', 'Admin\BooksController@destroy_undestroy')->name('books.delete');




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









