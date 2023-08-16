<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\UserController as Admin_UserController;
use App\Http\Controllers\User\Profile_Courses_Controller;
use App\Http\Controllers\User\CategoryController;

use App\Http\Controllers\User\CoursesController;
use App\Http\Controllers\User\About_UsController as User_About_usContoller;
use App\Http\Controllers\Admin\About_UsController as Admin_About_usContoller;
use App\Http\Controllers\Admin\CoursesController as AdminCoursesController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PermissionsController as Admin_PermissionsController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\Group_ExamsController;
use App\Http\Controllers\Admin\Course_RegisterController;
use App\Http\Controllers\Admin\WorkshopController;

use App\Http\Controllers\Reports\PaymentController;
use App\Http\Controllers\Reports\PermissionsController as Reports_PermissionsController;
use App\Http\Controllers\Reports\Student_planController;

     
use App\Http\Controllers\DataImportController;
// use App\Http\Controllers\;
     
Route::get('migrate/data',[DataImportController::class, 'index']);
Route::get('migrate/table/view',[DataImportController::class, 'view_table']);
Route::get('migrate/user/import',[DataImportController::class, 'user_import']);
Route::get('migrate/course/import',[DataImportController::class, 'course_import']);
Route::get('migrate/course_category_import/import',[DataImportController::class, 'course_category_import']);
Route::get('migrate/enroll_group_import/import',[DataImportController::class, 'enroll_group_import']);


Route::get('/', function () {
    return view('welcome');
});

// Route::get('testmail', function(){
//     $payment = Payment::first();
//     $details = [
//         'to' => 'ameer.maavia@gmail.com',
//         // 'to' => 'abubakrmianmamoon@gmail.com',
//         'title' =>  'Amount Refund Success',
//         'subject' =>  'Refund',
//         'email_body'=>'You amount refunded successfully',
//         'from' => 'contactus@medical2.com',
//         'payment' => $payment,
//         "dated"  => date('d F, Y (l)'),
//     ];
//     return view('admin.mail.refund',compact('details'));
// });




Route::get('admin/login',[AdminController::class, 'index']);
Route::post('admin/checklogin',[AdminController::class, 'checklogin']);
Route::get('admin/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
Route::get('admin/logout',[AdminController::class, 'logout']);


// Route::get('',[::class, '']);
// Route::get('',[::class, '']);
// Route::get('',[::class, '']);
// Route::get('',[::class, '']);
// Route::get('',[::class, '']);
// Route::get('',[::class, '']);
Route::get('/',[UserController::class,'index'])->name('user_index');;
Route::get('login_modal',[UserController::class, 'login_modal'])->name('user_login_modal');
Route::get('courses_registration',[UserController::class, 'courses_registration']);
Route::get('aboutus/view_frame/{id}',[About_UsController::class, 'view_frame'])->name('aboutus.view_frame');
// Route::get('/', 'User\UserController@index')->name('user_index');
// Route::get('login_modal', 'User\UserController@login_modal')->name('user_login_modal');
// Route::get('courses_registration', 'User\UserController@courses_registration');
// Route::get('aboutus/view_frame/{id}', 'Admin\About_UsController@view_frame')->name('aboutus.view_frame');

//  Route::group(['middleware' => 'user.auth'], function () {

//  profile_courses

// Route::get('profile_courses', 'User\Profile_Courses_Controller@my_courses');
Route::get('profile_courses',[Profile_Courses_Controller::class, 'my_courses']);
//  profile_account
// Route::get('profile_acount', 'User\Profile_Courses_Controller@my_profile');
Route::get('profile_acount',[Profile_Courses_Controller::class, 'my_profile']);
//  my_profile_save
// Route::post('my_profile_save', 'User\Profile_Courses_Controller@my_profile_save');
Route::post('my_profile_save',[Profile_Courses_Controller::class, 'my_profile_save']);
//
//  courses/exams
// Route::get('exams', 'User\Exams_Controller@index');
Route::get('exams',[Exams_Controller::class, 'index']);

//  new ourse_payemts for installment and comnplete
// Route::get('course_payemts', 'User\Profile_Courses_Controller@course_payemts');
Route::get('course_payemts',[Profile_Courses_Controller::class, 'course_payemts']);
// Route::get('user/course_history/payment', 'User\Profile_Courses_Controller@course_history_payment');


//category page
// Route::get('category', 'User\CategoryController@index');
Route::get('category',[CategoryController::class, 'index']);
// Route::post('user/category_search', 'User\CategoryController@index');
Route::post('user/category_search',[CategoryController::class, 'index']);
// Route::get('category_courses', 'User\CategoryController@category_courses');
Route::get('category_courses',[CategoryController::class, 'category_courses']);
//courses page
// Route::get('courses', 'User\CoursesController@index');
Route::get('courses',[CoursesController::class, 'index']);
// Route::post('user/courses_search', 'User\CoursesController@index');
Route::post('user/courses_search',[CoursesController::class, 'index']);


//  course/frame
// Route::get('course/frame', 'User\Profile_Courses_Controller@courses_frame');
Route::get('course/frame',[Profile_Courses_Controller::class, 'courses_frame']);
//  workshop

//workshop page
// Route::get('workshop', 'User\CoursesController@index');
Route::get('workshop',[CoursesController::class, 'index']);

// courses/details page
// Route::get('courses/details', 'User\CoursesController@courses_details');
Route::get('courses/details',[CoursesController::class, 'courses_details']);

// course_register
// Route::get('course/registration', 'User\CoursesController@course_registration');
Route::get('course/registration',[CoursesController::class, 'course_registration']);

// single save_course_registeration
// Route::get('save_course_register', 'User\CoursesController@user_save_course_register');
Route::get('save_course_register',[CoursesController::class, 'user_save_course_register']);


// group_registration
// Route::get('group_registration', 'User\CoursesController@group_registration');
Route::get('group_registration',[CoursesController::class, 'group_registration']);

// ===================group_registration save============================
// Route::post('group_registration_save', 'User\CoursesController@group_registration_save');
Route::post('group_registration_save',[CoursesController::class, 'group_registration_save']);
// group_payment_finalize
// Route::post('group_payment_finalize', 'User\CoursesController@group_payment_finalize');
Route::post('group_payment_finalize',[CoursesController::class, 'group_payment_finalize']);


// user/update_password
Route::get('user/update_password', 'User\CoursesController@update_password');
Route::get('user/update_password',[CoursesController::class, 'update_password']);

// user/enter_pasword
// Route::get('user/enter_pasword', 'User\CoursesController@enter_pasword');
Route::get('user/enter_pasword',[CoursesController::class, 'enter_pasword']);

//user/update_password_save
// Route::post('user/update_password_save', 'User\CoursesController@update_password_save');
Route::post('user/update_password_save',[CoursesController::class, 'update_password_save']);


// user/user_show_payment
// Route::get('user_show_payment', 'User\CoursesController@user_show_payment');
Route::get('user_show_payment',[CoursesController::class, 'user_show_payment']);

// user/payment
// Route::post('user_payment', 'User\CoursesController@payment_screen');
Route::post('user_payment',[CoursesController::class, 'payment_screen']);
//


// dekheneeeeaaaa
// Route::get('user_single_payment', 'User\CoursesController@payment_screen');
Route::get('user_single_payment',[CoursesController::class, 'payment_screen']);

// /

// group_memebers/payment
// Route::get('group_members/payment', 'User\CoursesController@group_members_payment_screen');
Route::get('group_members/payment',[CoursesController::class, 'group_members_payment_screen']);

// payment/stripe

// Route::post('payment/stripe', 'User\CoursesController@makepayment');
Route::post('payment/stripe',[CoursesController::class, 'makepayment']);
// Route::get('payment/success', 'User\CoursesController@payment_success');
Route::get('payment/success',[CoursesController::class, 'payment_success']);
// other pages
// Route::get('about_us', 'User\About_UsController@index');
Route::get('about_us',[About_UsController::class, 'index']);
// Route::get('contactus', 'User\About_UsController@contactus');
Route::get('contactus',[About_UsController::class, 'contactus']);
// Route::post('user/contactform', 'User\About_UsController@contactform');
Route::post('user/contactform',[About_UsController::class, 'contactform']);
//registration
// Route::get('registration', 'User\UserController@registration');
Route::get('registration',[UserController::class, 'registration']);
//  courses_list
// Route::get('courses_list', 'User\CoursesController@courses_list');
Route::get('courses_list',[CoursesController::class, 'courses_list']);

//

// Route::post('user/save', 'User\UserController@save');
Route::post('user/save',[UserController::class, 'save']);

//  login
// Route::post('user_login', 'User\UserController@user_login');
Route::post('user_login',[UserController::class, 'user_login']);
// Route::get('user_logout', 'User\UserController@logout');
Route::get('user_logout',[UserController::class, 'logout']);



// Route::group(['middleware' => 'admin_auth'], function () {

Route::group(['middleware' => 'role_auth','prefix'=>'admin'], function () {
    // Route::group(['namespace'=>'Admin'], function () {

        // Route::get('contact', 'ContactUsController@index')->name('contact.index');
        Route::get('contact',[ContactUsController::class, 'index'])->name('contact.index');
        // Route::get('get_contactus', 'ContactUsController@get_contactus')->name('get_contactus.index');
        Route::get('get_contactus',[ContactUsController::class, 'get_contactus'])->name('get_contactus.index');
        // Route::get('users', 'UserController@index')->name('location.index');
        Route::get('users',[Admin_UserController::class, 'index'])->name('location.index');
        // Route::get('users/get_users', 'UserController@getUsers')->name('users.get_users');
        Route::get('users/get_users',[Admin_UserController::class, 'getUsers'])->name('users.get_users');
        // Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
        // Route::get('logout', 'AdminController@logout')->name('logout');
        Route::get('logout',[AdminController::class, 'logout'])->name('logout');
        // Route::post('courses_crop_image', 'CoursesController@crop_image')->name('admin.crop_image');
        Route::post('courses_crop_image',[AdminCoursesController::class, 'crop_image'])->name('admin.crop_image');

        // courses crud
        Route::group(['prefix'=>'courses'],function(){
            // Route::get('/', 'CoursesController@index')->name('courses.index');
            Route::get('/',[AdminCoursesController::class, 'index'])->name('courses.index');
            // Route::get('get_courses', 'CoursesController@get_courses')->name('get_courses.index');
            Route::get('get_courses',[AdminCoursesController::class, 'get_courses'])->name('get_courses.index');
            // Route::get('create', 'CoursesController@create')->name('courses.create'); //add
            Route::get('create',[AdminCoursesController::class, 'create'])->name('courses.create'); //add
            // Route::post('save', 'CoursesController@save')->name('courses.save');
            Route::post('save',[AdminCoursesController::class, 'save'])->name('courses.save');
            // Route::get('edit/{id}', 'CoursesController@edit')->name('courses.edit');
            Route::get('edit/{id}',[AdminCoursesController::class, 'edit'])->name('courses.edit');
            // Route::post('update/{id}', 'CoursesController@update')->name('courses.update');
            Route::post('update/{id}',[AdminCoursesController::class, 'update'])->name('courses.update');
            // Route::post('delete/{id}', 'CoursesController@destroy_undestroy')->name('courses.delete');
            Route::post('delete/{id}',[AdminCoursesController::class, 'destroy_undestroy'])->name('courses.delete');


        });

        // role
        Route::group(['prefix'=>'role'],function(){
            // Route::get('/', 'RoleController@index')->name('role.index');
            Route::get('/',[RoleController::class, 'index'])->name('role.index');
            // Route::get('get_role', 'RoleController@get_role')->name('role.get_role');
            Route::get('get_role',[RoleController::class, 'get_role'])->name('role.get_role');
            //   Route::get('create', 'RoleController@create')->name('role.create');
            // Route::get('create', 'RoleController@create')->name('role.create');
            Route::get('create',[RoleController::class, 'create'])->name('role.create');
            // Route::post('save', 'RoleController@save')->name('role.save');
            Route::post('save',[RoleController::class, 'save'])->name('role.save');
            // Route::get('edit/{id}', 'RoleController@edit')->name('role.edit');
            Route::get('edit/{id}',[RoleController::class, 'edit'])->name('role.edit');
            // Route::post('update/{id}', 'RoleController@update')->name('role.update');
            Route::post('update/{id}',[RoleController::class, 'update'])->name('role.update');
            // Route::post('delete/{id}', 'RoleController@destroy_undestroy')->name('role.delete');
            Route::post('delete/{id}',[RoleController::class, 'destroy_undestroy'])->name('role.delete');
        });

        // Empolyee
        Route::group(['prefix'=>'employee'],function(){
            // Route::get('/', 'EmployeeController@index')->name('employee.index');
            Route::get('/',[EmployeeController::class, 'index'])->name('employee.index');
            // Route::get('get_employee', 'EmployeeController@get_employee')->name('get_employee.index');
            Route::get('get_employee',[EmployeeController::class, 'get_employee'])->name('get_employee.index');
            // Route::get('create', 'EmployeeController@create')->name('employee.create');
            Route::get('create',[EmployeeController::class, 'create'])->name('employee.create');
            // Route::post('save', 'EmployeeController@save')->name('employee.save');
            Route::post('save',[EmployeeController::class, 'save'])->name('employee.save');
            // Route::get('edit/{id}', 'EmployeeController@edit')->name('employee.edit');
            Route::get('edit/{id}',[EmployeeController::class, 'edit'])->name('employee.edit');
            // Route::post('update/{id}', 'EmployeeController@update')->name('employee.update');
            Route::post('update/{id}',[EmployeeController::class, 'update'])->name('employee.update');
            // Route::post('delete/{id}', 'EmployeeController@destroy_undestroy')->name('employee.delete');
            Route::post('delete/{id}',[EmployeeController::class, 'destroy_undestroy'])->name('employee.delete');
        });

        // Permissions
        Route::group(['prefix'=>'permissions'],function(){
            // Route::get('show', 'PermissionsController@show_list_permision')->name('permissions.index');
            Route::get('show',[PermissionsController::class, 'show_list_permision'])->name('permissions.index');
            // Route::get('create', 'PermissionsController@create')->name('permissions.create');
            Route::get('create',[PermissionsController::class, 'create'])->name('permissions.create');
            // Route::post('save', 'PermissionsController@save')->name('permissions.save');
            Route::post('save',[PermissionsController::class, 'save'])->name('permissions.save');
            // Route::get('edit/{id}', 'PermissionsController@edit')->name('permissions.edit');
            Route::get('edit/{id}',[PermissionsController::class, 'edit'])->name('permissions.edit');
            // Route::post('update/{id}', 'PermissionsController@update')->name('permissions.update');
            Route::post('update/{id}',[PermissionsController::class, 'update'])->name('permissions.update');
            // Route::post('delete/{id}', 'PermissionsController@destroy_undestroy')->name('permissions.delete');
            Route::post('delete/{id}',[PermissionsController::class, 'destroy_undestroy'])->name('permissions.delete');
            // Route::post('role_response', 'PermissionsController@role_response')->name('role.role_response');
            Route::post('role_response',[PermissionsController::class, 'role_response'])->name('role.role_response');
        });

        // role_response
        // permisiion/save
        // Route::post('role/permission/save', 'PermissionsController@permisiion_save')->name('role.role_response');
        Route::post('role/permission/save',[PermissionsController::class, 'permisiion_save'])->name('role.role_response');
        // Route::post('courses_crop_image', 'CoursesController@crop_image')->name('admin.crop_image');
        //  =================================  Category ==========================
        Route::group(['prefix'=>'category'],function(){
            // Route::get('/', 'CategoryController@index')->name('category.index');
            Route::get('/',[CategoryController::class, 'index'])->name('category.index');
            // Route::get('get_category', 'CategoryController@get_category')->name('get_category.index');
            Route::get('get_category',[CategoryController::class, 'get_category'])->name('get_category.index');
            // Route::get('create', 'CategoryController@create')->name('category.create'); //add
            Route::get('create',[CategoryController::class, 'create'])->name('category.create'); //add
            // Route::post('save', 'CategoryController@save')->name('category.save');
            Route::post('save',[CategoryController::class, 'save'])->name('category.save');
            // Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
            // Route::post('update/{id}', 'CategoryController@update')->name('category.update');
            Route::post('update/{id}',[CategoryController::class, 'update'])->name('category.update');
            // Route::post('delete/{id}', 'CategoryController@destroy_undestroy')->name('category.delete');
            Route::post('delete/{id}',[CategoryController::class, 'destroy_undestroy'])->name('category.delete');
        });

        // crop image
        // Route::post('category_crop_image', 'CategoryController@crop_image')->name('admin.crop_image');
        Route::post('category_crop_image',[CategoryController::class, 'crop_image'])->name('admin.crop_image');
        // aboutus
        Route::group(['prefix'=>'aboutus'],function(){
            // Route::get('/', 'About_UsController@index')->name('admin.aboutus');
            Route::get('/',[About_UsController::class, 'index'])->name('admin.aboutus');
            // Route::get('create', 'About_UsController@create')->name('aboutus.create'); //add
            Route::get('create',[About_UsController::class, 'create'])->name('aboutus.create'); //add
            // Route::post('save', 'About_UsController@save')->name('aboutus.save');
            Route::post('save',[About_UsController::class, 'save'])->name('aboutus.save');
            // Route::get('edit/{id}', 'About_UsController@edit')->name('aboutus.edit');
            Route::get('edit/{id}',[About_UsController::class, 'edit'])->name('aboutus.edit');
            // Route::post('update/{id}', 'About_UsController@update')->name('aboutus.update');
            Route::post('update/{id}',[About_UsController::class, 'update'])->name('aboutus.update');
            // Route::post('delete/{id}', 'About_UsController@destroy_undestroy')->name('aboutus.delete');
            Route::post('delete/{id}',[About_UsController::class, 'destroy_undestroy'])->name('aboutus.delete');
        });

        //  =================================  Books ==========================
        Route::group(['prefix'=>'books'],function(){
            // Route::get('/', 'BooksController@index')->name('books.index');
            Route::get('/',[BooksController::class, 'index'])->name('books.index');
            // Route::get('get_books', 'BooksController@get_books')->name('get_books.index');
            Route::get('get_books',[BooksController::class, 'get_books'])->name('get_books.index');
            // Route::get('create', 'BooksController@create')->name('books.create'); //add
            Route::get('create',[BooksController::class, 'create'])->name('books.create'); //add
            // Route::post('save', 'BooksController@save')->name('books.save');
            Route::post('save',[BooksController::class, 'save'])->name('books.save');
            // Route::get('edit/{id}', 'BooksController@edit')->name('books.edit');
            Route::get('edit/{id}',[BooksController::class, 'edit'])->name('books.edit');
            // Route::post('update/{id}', 'BooksController@update')->name('books.update');
            Route::post('update/{id}',[BooksController::class, 'update'])->name('books.update');
            // Route::post('delete/{id}', 'BooksController@destroy_undestroy')->name('books.delete');
            Route::post('delete/{id}',[BooksController::class, 'destroy_undestroy'])->name('books.delete');
        });

        //  =================================  teacher ==========================
        Route::group(['prefix'=>'teacher'],function(){
            // Route::get('/', 'TeacherController@index')->name('teacher.index');
            Route::get('/',[TeacherController::class, 'index'])->name('teacher.index');
            // Route::get('get_teacher', 'TeacherController@get_teacher')->name('teacher.get_teacher');
            Route::get('get_teacher',[TeacherController::class, 'get_teacher'])->name('teacher.get_teacher');
            Route::get('create', 'TeacherController@create')->name('teacher.create'); //add
            Route::get('create',[TeacherController::class, 'create'])->name('teacher.create'); //add
            // Route::post('save', 'TeacherController@save')->name('teacher.save');
            Route::post('save',[TeacherController::class, 'save'])->name('teacher.save');
            // Route::get('edit/{id}', 'TeacherController@edit')->name('teacher.edit');
            Route::get('edit/{id}',[TeacherController::class, 'edit'])->name('teacher.edit');
            // Route::post('update/{id}', 'TeacherController@update')->name('teacher.update');
            Route::post('update/{id}',[TeacherController::class, 'update'])->name('teacher.update');
            // Route::post('delete/{id}', 'TeacherController@destroy_undestroy')->name('teacher.delete');
            Route::post('delete/{id}',[TeacherController::class, 'destroy_undestroy'])->name('teacher.delete');
        });

            // question list open
            // Route::get('question_list/{id}', 'QuizController@question_list')->name('quiz.question_list');
            Route::get('question_list/{id}',[QuizController::class, 'question_list'])->name('quiz.question_list');
            // Route::post('quiz_question_list/update', 'QuizController@quiz_question_list_update')->name('quiz.quiz_question_list_update');
            Route::post('quiz_question_list/update',[QuizController::class, 'quiz_question_list_update'])->name('quiz.quiz_question_list_update');
            // Route::get('question', 'QuestionController@index')->name('admin.question');
            Route::get('question',[QuestionController::class, 'index'])->name('admin.question');


        Route::group(['prefix'=>'question'],function(){
            // Route::get('create', 'QuestionController@create')->name('question.create');
            Route::get('create',[QuestionController::class, 'create'])->name('question.create');
            // Route::post('save', 'QuestionController@save')->name('question.save');
            Route::post('save',[QuestionController::class, 'save'])->name('question.save');
            // Route::get('edit/{id}', 'QuestionController@edit')->name('question.edit');
            Route::get('edit/{id}',[QuestionController::class, 'edit'])->name('question.edit');
            // Route::post('update/{id}', 'QuestionController@update')->name('question.update');
            Route::post('update/{id}',[QuestionController::class, 'update'])->name('question.update');
            // Route::post('delete/{id}', 'QuestionController@destroy_undestroy')->name('question.delete');
            Route::post('delete/{id}',[QuestionController::class, 'destroy_undestroy'])->name('question.delete');
        });

        // quiz CRUD
        Route::group(['prefix'=>'quiz'],function(){
            // Route::get('/', 'QuizController@index')->name('admin.quiz');
            Route::get('/',[QuizController::class, 'index'])->name('admin.quiz');
            // Route::get('get_quiz', 'QuizController@get_quiz')->name('admin.get_quiz');
            Route::get('get_quiz',[QuizController::class, 'get_quiz'])->name('admin.get_quiz');
            // Route::get('create', 'QuizController@create')->name('quiz.create');
            Route::get('create',[QuizController::class, 'create'])->name('quiz.create');
            // Route::post('save', 'QuizController@save')->name('quiz.save');
            Route::post('save',[QuizController::class, 'save'])->name('quiz.save');
            // Route::get('edit/{id}', 'QuizController@edit')->name('quiz.edit');
            Route::get('edit/{id}',[QuizController::class, 'edit'])->name('quiz.edit');
            // Route::post('update/{id}', 'QuizController@update')->name('quiz.update');
            Route::post('update/{id}',[QuizController::class, 'update'])->name('quiz.update');
            // Route::post('delete/{id}', 'QuizController@destroy_undestroy')->name('quiz.delete');
            Route::post('delete/{id}',[QuizController::class, 'destroy_undestroy'])->name('quiz.delete');
        });

        // question list open
        // Route::get('question_list/{id}', 'QuizController@question_list')->name('quiz.question_list');
        Route::get('question_list/{id}',[QuizController::class, 'question_list'])->name('quiz.question_list');
        // Route::post('quiz_question_list/update', 'QuizController@quiz_question_list_update')->name('quiz.quiz_question_list_update');
        Route::post('quiz_question_list/update',[QuizController::class, 'quiz_question_list_update'])->name('quiz.quiz_question_list_update');
        // Route::get('getquestion/{id}', 'QuestionController@getQuestion')->name('question_list');
        Route::get('getquestion/{id}',[QuestionController::class, 'getQuestion'])->name('question_list');
        // Route::get('course/questions/{id}', 'QuestionController@course_question_list')->name('question_list');
        Route::get('course/questions/{id}',[QuestionController::class, 'course_question_list'])->name('question_list');
        //   SETTINGS
        Route::group(['prefix'=>'settings'],function(){
            // Route::get('/', 'SettingsController@index')->name('settings.index');
            Route::get('/',[SettingsController::class, 'index'])->name('settings.index');
            // Route::get('edit/{id}', 'SettingsController@edit')->name('settings.edit');
            Route::get('edit/{id}',[SettingsController::class, 'edit'])->name('settings.edit');
            // Route::post('update/{id}', 'SettingsController@update')->name('settings.save');
            Route::post('update/{id}',[SettingsController::class, 'update'])->name('settings.save');
            // Route::post('upload_cropped_image', 'SettingsController@upload_cropped_image')->name('settings.upload_cropped_image');
            Route::post('upload_cropped_image',[SettingsController::class, 'upload_cropped_image'])->name('settings.upload_cropped_image');
        });

        //   Group crud
        // Route::get('get_group', 'GroupController@getGroup')->name('group');
        Route::get('get_group',[GroupController::class, 'getGroup'])->name('group');
        Route::group(['prefix'=>'group'],function(){
            // Route::get('/', 'GroupController@index')->name('group.index');
            Route::get('/',[GroupController::class, 'index'])->name('group.index');
            // Route::get('create', 'GroupController@create')->name('group.create'); //add
            Route::get('create',[GroupController::class, 'create'])->name('group.create'); //add
            // Route::post('save', 'GroupController@save')->name('group.save');
            Route::post('save',[GroupController::class, 'save'])->name('group.save');
            // Route::get('edit/{id}', 'GroupController@edit')->name('group.edit');
            Route::get('edit/{id}',[GroupController::class, 'edit'])->name('group.edit');
            // Route::post('update/{id}', 'GroupController@update')->name('group.update');
            Route::post('update/{id}',[GroupController::class, 'update'])->name('group.update');
            // Route::post('delete/{id}', 'GroupController@destroy_undestroy')->name('group.delete');
            Route::post('delete/{id}',[GroupController::class, 'destroy_undestroy'])->name('group.delete');
            // Route::post('select_courses_id/{id}', 'GroupController@select_courses_data')->name('select_courses_id.delete');
            Route::post('select_courses_id/{id}',[GroupController::class, 'select_courses_data'])->name('select_courses_id.delete');
            // Route::post('map/lat_long', 'GroupController@group_latlong_save')->name('parent.map');
            Route::post('map/lat_long',[GroupController::class, 'group_latlong_save'])->name('parent.map');
        });

        // group_exams
        Route::group(['prefix'=>'group_exams'],function(){
            // Route::get('list/{id}', 'Group_ExamsController@index')->name('group_exams.index')->where('id','[0-9]+');
            Route::get('list/{id}',[Group_ExamsController::class, 'index'])->name('group_exams.index')->where('id','[0-9]+');
            // Route::post('create', 'Group_ExamsController@create')->name('group_exams.create');
            Route::post('create',[Group_ExamsController::class, 'create'])->name('group_exams.create');
            // Route::post('save', 'Group_ExamsController@save')->name('group_exams.save');
            Route::post('save',[Group_ExamsController::class, 'save'])->name('group_exams.save');
        });


    // ================================student list==================================
        // Route::get('group/students/{id}', 'GroupController@student_list')->name('admin.group_students');
        Route::get('group/students/{id}',[GroupController::class, 'student_list'])->name('admin.group_students');
        // Route::post('student_group_checked/update', 'GroupController@student_group_checked')->name('admin.student_group_checked');
        Route::post('student_group_checked/update',[GroupController::class, 'student_group_checked'])->name('admin.student_group_checked');
        // ================================course_register=================================
        // data tables myy
        // Route::get('course_register', 'Course_RegisterController@index')->name('admin.course_register');
        Route::get('course_register',[Course_RegisterController::class, 'index'])->name('admin.course_register');
        // Route::get('get_course_register', 'Course_RegisterController@get_course_register')->name('admin.get_course_register');
        Route::get('get_course_register',[Course_RegisterController::class, 'get_course_register'])->name('admin.get_course_register');
        // Route::get('courses/group/{id}', 'Course_RegisterController@get_courses_group')->name('admin.get_courses_group');
        Route::get('courses/group/{id}',[Course_RegisterController::class, 'get_courses_group'])->name('admin.get_courses_group');
        // Route::post('update_course_group', 'Course_RegisterController@update_course_group')->name('admin.update_course_group');
        Route::post('update_course_group',[Course_RegisterController::class, 'update_course_group'])->name('admin.update_course_group');
        // ================================workshop=================================
        Route::group(['prefix'=>'workshop'],function(){
            // Route::get('/', 'WorkshopController@index')->name('workshop.index');
            Route::get('/',[WorkshopController::class, 'index'])->name('workshop.index');
            // Route::get('create', 'WorkshopController@create')->name('workshop.create'); //add
            Route::get('create',[WorkshopController::class, 'create'])->name('workshop.create'); //add
            // Route::post('save', 'WorkshopController@save')->name('workshop.save');
            Route::post('save',[WorkshopController::class, 'save'])->name('workshop.save');
            // Route::get('workshop/edit/{id}', 'WorkshopController@edit')->name('workshop.edit');
            // Route::post('delete/{id}', 'WorkshopController@destroy_undestroy')->name('workshop.delete');
            Route::post('delete/{id}',[WorkshopController::class, 'destroy_undestroy'])->name('workshop.delete');
        });

        // Route::post('workshop_value_updte', 'WorkshopController@update')->name('workshop.update');
        Route::post('workshop_value_updte',[WorkshopController::class, 'update'])->name('workshop.update');
    });
        //  =================================  Reports PAYMENT =========================
        
        // Route::get('orders/payments', 'Reports\PaymentController@index_excel')->name('payment.excel');
        Route::get('orders/payments',[PaymentController::class, 'index_excel'])->name('payment.excel');

            Route::group(['prefix'=>'reports'],function(){
                // Route::get('payments', 'PaymentController@index')->name('order_payment.index');
                Route::get('payments',[PaymentController::class, 'index'])->name('order_payment.index');
                // Route::post('payments', 'PaymentController@index')->name('payment.index');
                Route::post('payments',[PaymentController::class, 'index'])->name('payment.index');
                // Route::get('payments/get_payment_report', 'PaymentController@get_payment_report')->name('get_payment_report.index');
                Route::get('payments/get_payment_report',[PaymentController::class, 'get_payment_report'])->name('get_payment_report.index');
                //   Route::post('payment/status_update/{id}', 'PaymentController@status_update')->name('payment.status_update');
                // Route::post('payment/payment_refund/{id}', 'PaymentController@payment_refund')->name('payment.payment_refund');
                Route::post('payment/payment_refund/{id}',[PaymentController::class, 'payment_refund'])->name('payment.payment_refund');
                // Route::get('payment/refund/details/{id}', 'PaymentController@payment_refund_details')->name('payment.refund.details');
                // Route::post('payment/refund/details/{id}', 'PaymentController@payment_refund_details')->name('payment.refund.details');
                Route::post('payment/refund/details/{id}',[PaymentController::class, 'payment_refund_details'])->name('payment.refund.details');
                // Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
                Route::get('permissions',[PermissionsController::class, 'index'])->name('permissions.index');
            });
            // permissions
            //    Route::get('permissions', 'Reports\PermissionsController@index')->name('permissions.index');
            Route::group(['prefix'=>'student_plan'],function(){
            //    Route::get('/', 'Reports\Student_planController@index')->name('student_plan.index');
               Route::get('/',[Student_planController::class, 'index'])->name('student_plan.index');
            //    Route::get('get_student_plan', 'Reports\Student_planController@get_student_plan')->name('get_student_plan.index');
               Route::get('get_student_plan',[Student_planController::class, 'get_student_plan'])->name('get_student_plan.index');
            //    Route::get('create', 'Reports\Student_planController@create')->name('student_plan.create'); //add
               Route::get('create',[Student_planController::class, 'create'])->name('student_plan.create'); //add
            //    Route::post('save', 'Reports\Student_planController@save')->name('student_plan.save');
               Route::post('save',[Student_planController::class, 'save'])->name('student_plan.save');
            //    Route::get('edit', 'Reports\Student_planController@edit')->name('student_plan.edit');
               Route::get('edit',[Student_planController::class, 'edit'])->name('student_plan.edit');
            //    Route::post('update', 'Reports\Student_planController@update')->name('student_plan.update');
               Route::post('update',[Student_planController::class, 'update'])->name('student_plan.update');
            //    Route::post('delete/{id}', 'Reports\Student_planController@destroy_undestroy')->name('student_plan.delete');
               Route::post('delete/{id}',[Student_planController::class, 'destroy_undestroy'])->name('student_plan.delete');
            });

// });

