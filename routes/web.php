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
     Route::get('courses_registration', 'User\UserController@courses_registration');
     Route::get('profile_acount', 'User\UserController@profile_acount');
     Route::get('profile_courses', 'User\UserController@profile_courses');


    //category page
     Route::get('category', 'User\CategoryController@index');
     Route::post('user/category_search', 'User\CategoryController@index');
     Route::get('category_courses', 'User\CategoryController@category_courses');
    //courses page
     Route::get('courses', 'User\CoursesController@index');
     Route::post('user/courses_search', 'User\CoursesController@index');
     // courses/details page
    Route::get('courses/details', 'User\CoursesController@courses_details');

    // course_register
    Route::get('course/registration', 'User\CoursesController@course_registration');
    // save_course_register
    Route::get('save_course_register', 'User\CoursesController@user_save_course_register');
    // user/payment
    Route::get('user/payment', 'User\CoursesController@payment_screen');

    // payment/stripe

    Route::post('payment/stripe', 'User\CoursesController@makepayment');
   // other pages
   Route::get('about_us', 'User\About_UsController@index');
   Route::get('contactus', 'User\About_UsController@contactus');
   Route::post('user/contactform', 'User\About_UsController@contactform');
    //registration
     Route::get('registration', 'User\UserController@registration');
    //  courses_list
     Route::get('courses_list', 'User\CoursesController@courses_list');

    //

     Route::post('user/save', 'User\UserController@save');

    //  login
    Route::post('user_login', 'User\UserController@user_login');




    Route::get('admin/login', 'Admin\AdminController@index');
    Route::post('admin/checklogin', 'Admin\AdminController@checklogin');

    // contact module
    Route::get('admin/contact', 'Admin\ContactUsController@index')->name('contact.index');


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
    Route::post('admin/courses_crop_image', 'Admin\CoursesController@crop_image')->name('admin.crop_image');





//  =================================  Category ==========================
Route::get('admin/category', 'Admin\CategoryController@index')->name('category.index');

Route::get('admin/category/create', 'Admin\CategoryController@create')->name('category.create'); //add
Route::post('admin/category/save', 'Admin\CategoryController@save')->name('category.save');

Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
Route::post('admin/category/update/{id}', 'Admin\CategoryController@update')->name('category.update');

Route::post('admin/category/delete/{id}', 'Admin\CategoryController@destroy_undestroy')->name('category.delete');

// crop image
Route::post('admin/category_crop_image', 'Admin\CategoryController@crop_image')->name('admin.crop_image');


// admin/aboutus
Route::get('admin/aboutus', 'Admin\About_UsController@index')->name('admin.aboutus');
Route::get('admin/aboutus/create', 'Admin\About_UsController@create')->name('aboutus.create'); //add
Route::post('admin/aboutus/save', 'Admin\About_UsController@save')->name('aboutus.save');

Route::get('admin/aboutus/edit/{id}', 'Admin\About_UsController@edit')->name('aboutus.edit');
Route::post('admin/aboutus/update/{id}', 'Admin\About_UsController@update')->name('aboutus.update');

Route::post('admin/aboutus/delete/{id}', 'Admin\About_UsController@destroy_undestroy')->name('aboutus.delete');





//  =================================  Books ==========================
Route::get('admin/books', 'Admin\BooksController@index')->name('books.index');

Route::get('admin/books/create', 'Admin\BooksController@create')->name('books.create'); //add
Route::post('admin/books/save', 'Admin\BooksController@save')->name('books.save');

Route::get('admin/books/edit/{id}', 'Admin\BooksController@edit')->name('books.edit');
Route::post('admin/books/update/{id}', 'Admin\BooksController@update')->name('books.update');

Route::post('admin/books/delete/{id}', 'Admin\BooksController@destroy_undestroy')->name('books.delete');



//  =================================  teacher ==========================

Route::get('admin/teacher', 'Admin\TeacherController@index')->name('teacher.index');

Route::get('admin/teacher/create', 'Admin\TeacherController@create')->name('teacher.create'); //add
Route::post('admin/teacher/save', 'Admin\TeacherController@save')->name('teacher.save');

Route::get('admin/teacher/edit/{id}', 'Admin\TeacherController@edit')->name('teacher.edit');
Route::post('admin/teacher/update/{id}', 'Admin\TeacherController@update')->name('teacher.update');

Route::post('admin/teacher/delete/{id}', 'Admin\TeacherController@destroy_undestroy')->name('teacher.delete');


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




//   Group crud


Route::get('admin/get_group', 'Admin\GroupController@getGroup')->name('group');
Route::get('admin/group', 'Admin\GroupController@index')->name('group.index');
Route::get('admin/group/create', 'Admin\GroupController@create')->name('group.create'); //add
Route::post('admin/group/save', 'Admin\GroupController@save')->name('group.save');
Route::get('admin/group/edit/{id}', 'Admin\GroupController@edit')->name('group.edit');
Route::post('admin/group/update/{id}', 'Admin\GroupController@update')->name('group.update');
Route::post('admin/group/delete/{id}', 'Admin\GroupController@destroy_undestroy')->name('group.delete');



// ================================student list==================================
Route::get('admin/group/students/{id}', 'Admin\GroupController@student_list')->name('admin.group_students');
Route::post('admin/student_group_checked/update', 'Admin\GroupController@student_group_checked')->name('admin.student_group_checked');

// ================================course_register=================================
// Route::get('admin/course_register', 'Admin\Course_RegisterController@index')->name('admin.course_register');

// data tables myy
Route::get('admin/course_register', 'Admin\Course_RegisterController@index')->name('admin.course_register');
Route::get('admin/get_course_register', 'Admin\Course_RegisterController@get_course_register')->name('admin.get_course_register');
Route::get('admin/courses/group/{id}', 'Admin\Course_RegisterController@get_courses_group')->name('admin.get_courses_group');
Route::post('admin/update_course_group', 'Admin\Course_RegisterController@update_course_group')->name('admin.update_course_group');

//

//  =================================  Reports PAYMENT ==========================


    Route::get('admin/reports/payments','Reports\PaymentController@index')->name('order_payment.index');
    Route::post('admin/reports/payments', 'Reports\PaymentController@index')->name('payment.index');
    Route::get('admin/orders/payments', 'Reports\PaymentController@index_excel')->name('payment.excel');
    Route::post('admin/reports/payment/status_update/{id}','Reports\PaymentController@status_update')->name('payment.status_update');










