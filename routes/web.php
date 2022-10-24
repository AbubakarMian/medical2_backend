<?php


use Illuminate\Support\Facades\Route;
// use App\Model\Routes as erp;

// $db_routes = erp::first();
// $url_method =  $db_routes->url_method;
// // dd( $db_routes);


// Route::$url_method($db_routes->url , $db_routes->controller_function);
// return;






// return;


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
     Route::get('/', 'User\UserController@index')->name('user_index');
     Route::get('courses_registration', 'User\UserController@courses_registration');
   
    //  profile_courses

     Route::get('profile_courses', 'User\Profile_Courses_Controller@my_courses');
     //  profile_account
     Route::get('profile_acount', 'User\Profile_Courses_Controller@my_profile');
    //  my_profile_save
     Route::post('my_profile_save', 'User\Profile_Courses_Controller@my_profile_save');
// 

//  new ourse_payemts for installment and comnplete
Route::get('course_payemts', 'User\Profile_Courses_Controller@course_payemts');
// Route::get('user/course_history/payment', 'User\Profile_Courses_Controller@course_history_payment');


    //category page
     Route::get('category', 'User\CategoryController@index');
     Route::post('user/category_search', 'User\CategoryController@index');
     Route::get('category_courses', 'User\CategoryController@category_courses');
    //courses page
     Route::get('courses', 'User\CoursesController@index');
     Route::post('user/courses_search', 'User\CoursesController@index');

    //  workshop

     //workshop page
     Route::get('workshop', 'User\CoursesController@index');
  
     // courses/details page
    Route::get('courses/details', 'User\CoursesController@courses_details');

    // course_register
    Route::get('course/registration', 'User\CoursesController@course_registration');

    // single save_course_registeration
    Route::get('save_course_register', 'User\CoursesController@user_save_course_register');


     // group_registration
    Route::get('group_registration', 'User\CoursesController@group_registration');

      // ===================group_registration save============================
    Route::post('group_registration_save', 'User\CoursesController@group_registration_save');
    // group_payment_finalize
    Route::post('group_payment_finalize', 'User\CoursesController@group_payment_finalize');


      // user/update_password
    Route::post('user/update_password', 'User\CoursesController@update_password');

    // user/enter_pasword
    Route::post('user/enter_pasword', 'User\CoursesController@enter_pasword');

    //user/update_password_save
    Route::post('user/update_password_save', 'User\CoursesController@update_password_save');

    // user/user_show_payment
    Route::get('user_show_payment', 'User\CoursesController@user_show_payment');
      
    // user/payment
    Route::post('user_payment', 'User\CoursesController@payment_screen');
    Route::post('user_single_payment', 'User\CoursesController@payment_screen');

    // group_memebers/payment
    Route::get('group_members/payment', 'User\CoursesController@group_members_payment_screen');

    // payment/stripe

    Route::post('payment/stripe', 'User\CoursesController@makepayment');
    Route::get('payment/success', 'User\CoursesController@payment_success');
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
    Route::get('user_logout', 'User\UserController@logout');



    Route::get('admin/login', 'Admin\AdminController@index');
    Route::post('admin/checklogin', 'Admin\AdminController@checklogin');
    Route::group(['middleware' => 'admin_auth'], function () {

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


    // role
    Route::get('admin/role', 'Admin\RoleController@index')->name('role.index'); 
    Route::get('admin/role/create', 'Admin\RoleController@create')->name('role.create'); 
    Route::post('admin/role/save', 'Admin\RoleController@save')->name('role.save');
    Route::get('admin/role/edit/{id}', 'Admin\RoleController@edit')->name('role.edit');
    Route::post('admin/role/update/{id}', 'Admin\RoleController@update')->name('role.update');
    Route::post('admin/role/delete/{id}', 'Admin\RoleController@destroy_undestroy')->name('role.delete');

    // Empolyee
       
    Route::get('admin/employee', 'Admin\EmployeeController@index')->name('employee.index'); 
    Route::get('admin/employee/create', 'Admin\EmployeeController@create')->name('employee.create'); 
    Route::post('admin/employee/save', 'Admin\EmployeeController@save')->name('employee.save');
    Route::get('admin/employee/edit/{id}', 'Admin\EmployeeController@edit')->name('employee.edit');
    Route::post('admin/employee/update/{id}', 'Admin\EmployeeController@update')->name('employee.update');
    Route::post('admin/employee/delete/{id}', 'Admin\EmployeeController@destroy_undestroy')->name('employee.delete');

    // Permissions
    Route::get('admin/permissions/show', 'Admin\PermissionsController@show_list_permision')->name('permissions.index'); 
    Route::get('admin/permissions/create', 'Admin\PermissionsController@create')->name('rolpermissionse.create'); 
    Route::post('admin/permissions/save', 'Admin\PermissionsController@save')->name('permissions.save');
    Route::get('admin/permissions/edit/{id}', 'Admin\PermissionsController@edit')->name('permissions.edit');
    Route::post('admin/permissions/update/{id}', 'Admin\PermissionsController@update')->name('permissions.update');
    Route::post('admin/permissions/delete/{id}', 'Admin\PermissionsController@destroy_undestroy')->name('permissions.delete');

    // Route::post('admin/courses_crop_image', 'Admin\CoursesController@crop_image')->name('admin.crop_image');




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


Route::post('admin/group/select_courses_id/{id}', 'Admin\GroupController@select_courses_data')->name('select_courses_id.delete');


 // save lat long of parents
 Route::post('admin/group/map/lat_long', 'Admin\GroupController@group_latlong_save')->name('parent.map');



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


// ================================workshop=================================
Route::get('admin/workshop', 'Admin\WorkshopController@index')->name('workshop.index');

Route::get('admin/workshop/create', 'Admin\WorkshopController@create')->name('workshop.create'); //add
Route::post('admin/workshop/save', 'Admin\WorkshopController@save')->name('workshop.save');

// Route::get('admin/workshop/edit/{id}', 'Admin\WorkshopController@edit')->name('workshop.edit');
Route::post('admin/workshop_value_updte', 'Admin\WorkshopController@update')->name('workshop.update');

Route::post('admin/workshop/delete/{id}', 'Admin\WorkshopController@destroy_undestroy')->name('workshop.delete');





// ================================ Reports admin student_plan=================================
Route::get('admin/student_plan', 'Reports\Student_planController@index')->name('student_plan.index');

Route::get('admin/student_plan/create', 'Reports\Student_planController@create')->name('student_plan.create'); //add
Route::post('admin/student_plan/save', 'Reports\Student_planController@save')->name('student_plan.save');

Route::get('admin/student_plan/edit', 'Reports\Student_planController@edit')->name('student_plan.edit');
Route::post('student_plan/update/{id}', 'Reports\Student_planController@update')->name('student_plan.update');

Route::post('admin/student_plan/delete/{id}', 'Reports\Student_planController@destroy_undestroy')->name('student_plan.delete');



// 

//  =================================  Reports PAYMENT ==========================


    Route::get('admin/reports/payments','Reports\PaymentController@index')->name('order_payment.index');
    Route::post('admin/reports/payments', 'Reports\PaymentController@index')->name('payment.index');
    Route::get('admin/orders/payments', 'Reports\PaymentController@index_excel')->name('payment.excel');
    Route::post('admin/reports/payment/status_update/{id}','Reports\PaymentController@status_update')->name('payment.status_update');





  });




