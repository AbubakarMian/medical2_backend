<?php


use Illuminate\Support\Facades\Route;
use App\Model\Payment;

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
Route::get('testmail', function(){
    $payment = Payment::first();
    $details = [
        'to' => 'ameer.maavia@gmail.com',
        // 'to' => 'abubakrmianmamoon@gmail.com',
        'title' =>  'Amount Refund Success',
        'subject' =>  'Refund',
        'email_body'=>'You amount refunded successfully',
        'from' => 'contactus@medical2.com',
        'payment' => $payment,
        "dated"  => date('d F, Y (l)'),
    ];
    return view('admin.mail.refund',compact('details'));
});
Route::get('/', 'User\UserController@index')->name('user_index');
Route::get('login_modal', 'User\UserController@login_modal')->name('user_login_modal');
Route::get('courses_registration', 'User\UserController@courses_registration');
Route::get('view_frame/{id}', 'About_UsController@view_frame')->name('aboutus.view_frame');


//  Route::group(['middleware' => 'user.auth'], function () {

//  profile_courses

Route::get('profile_courses', 'User\Profile_Courses_Controller@my_courses');
//  profile_account
Route::get('profile_acount', 'User\Profile_Courses_Controller@my_profile');
//  my_profile_save
Route::post('my_profile_save', 'User\Profile_Courses_Controller@my_profile_save');
//
//  courses/exams
Route::get('exams', 'User\Exams_Controller@index');

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


//  course/frame
Route::get('course/frame', 'User\Profile_Courses_Controller@courses_frame');
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
Route::get('user/update_password', 'User\CoursesController@update_password');

// user/enter_pasword
Route::get('user/enter_pasword', 'User\CoursesController@enter_pasword');

//user/update_password_save
Route::post('user/update_password_save', 'User\CoursesController@update_password_save');


// user/user_show_payment
Route::get('user_show_payment', 'User\CoursesController@user_show_payment');

// user/payment
Route::post('user_payment', 'User\CoursesController@payment_screen');
//


// dekheneeeeaaaa
Route::get('user_single_payment', 'User\CoursesController@payment_screen');

// /

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
// Route::group(['middleware' => 'admin_auth'], function () {

Route::group(['middleware' => 'role_auth','prefix'=>'admin'], function () {
    Route::group(['namespace'=>'Admin'], function () {

        Route::get('contact', 'ContactUsController@index')->name('contact.index');
        Route::get('users', 'UserController@index')->name('location.index');
        Route::get('users/get_users/{id}', 'UserController@getUsers')->name('users.get_users');
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('logout', 'AdminController@logout')->name('logout');
        Route::post('courses_crop_image', 'CoursesController@crop_image')->name('admin.crop_image');

        // courses crud
        Route::group(['prefix'=>'courses'],function(){
            Route::get('/', 'CoursesController@index')->name('courses.index');
            Route::get('get_courses/{id}', 'CoursesController@get_courses')->name('teacher.get_courses');
            Route::get('create', 'CoursesController@create')->name('courses.create'); //add
            Route::post('save', 'CoursesController@save')->name('courses.save');
            Route::get('edit/{id}', 'CoursesController@edit')->name('courses.edit');
            Route::post('update/{id}', 'CoursesController@update')->name('courses.update');
            Route::post('delete/{id}', 'CoursesController@destroy_undestroy')->name('courses.delete');
        });

        // role
        Route::group(['prefix'=>'role'],function(){
            Route::get('/', 'RoleController@index')->name('role.index');
            //   Route::get('create', 'RoleController@create')->name('role.create');
            Route::get('create', 'RoleController@create')->name('role.create');
            Route::post('save', 'RoleController@save')->name('role.save');
            Route::get('edit/{id}', 'RoleController@edit')->name('role.edit');
            Route::post('update/{id}', 'RoleController@update')->name('role.update');
            Route::post('delete/{id}', 'RoleController@destroy_undestroy')->name('role.delete');
        });

        // Empolyee
        Route::group(['prefix'=>'employee'],function(){
            Route::get('/', 'EmployeeController@index')->name('employee.index');
            Route::get('get_employee/{id}', 'EmployeeController@get_employee')->name('get_employee.index');
            Route::get('create', 'EmployeeController@create')->name('employee.create');
            Route::post('save', 'EmployeeController@save')->name('employee.save');
            Route::get('edit/{id}', 'EmployeeController@edit')->name('employee.edit');
            Route::post('update/{id}', 'EmployeeController@update')->name('employee.update');
            Route::post('delete/{id}', 'EmployeeController@destroy_undestroy')->name('employee.delete');
        });

        // Permissions
        Route::group(['prefix'=>'permissions'],function(){
            Route::get('show', 'PermissionsController@show_list_permision')->name('permissions.index');
            Route::get('create', 'PermissionsController@create')->name('permissions.create');
            Route::post('save', 'PermissionsController@save')->name('permissions.save');
            Route::get('edit/{id}', 'PermissionsController@edit')->name('permissions.edit');
            Route::post('update/{id}', 'PermissionsController@update')->name('permissions.update');
            Route::post('delete/{id}', 'PermissionsController@destroy_undestroy')->name('permissions.delete');
            Route::get('role_response', 'PermissionsController@role_response')->name('role.role_response');
        });

        // role_response
        // permisiion/save
        Route::post('role/permission/save', 'PermissionsController@permisiion_save')->name('role.role_response');
        // Route::post('courses_crop_image', 'CoursesController@crop_image')->name('admin.crop_image');
        //  =================================  Category ==========================
        Route::group(['prefix'=>'category'],function(){
            Route::get('/', 'CategoryController@index')->name('category.index');
            Route::get('get_category/{id}', 'CategoryController@get_category')->name('category.get_category');
            Route::get('create', 'CategoryController@create')->name('category.create'); //add
            Route::post('save', 'CategoryController@save')->name('category.save');
            Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::post('update/{id}', 'CategoryController@update')->name('category.update');
            Route::post('delete/{id}', 'CategoryController@destroy_undestroy')->name('category.delete');
        });

        // crop image
        Route::post('category_crop_image', 'CategoryController@crop_image')->name('admin.crop_image');
        // aboutus
        Route::group(['prefix'=>'aboutus'],function(){
            Route::get('/', 'About_UsController@index')->name('admin.aboutus');
            Route::get('create', 'About_UsController@create')->name('aboutus.create'); //add
            Route::post('save', 'About_UsController@save')->name('aboutus.save');
            Route::get('edit/{id}', 'About_UsController@edit')->name('aboutus.edit');
            Route::post('update/{id}', 'About_UsController@update')->name('aboutus.update');
            Route::post('delete/{id}', 'About_UsController@destroy_undestroy')->name('aboutus.delete');
        });

        //  =================================  Books ==========================
        Route::group(['prefix'=>'books'],function(){
            Route::get('/', 'BooksController@index')->name('books.index');
            Route::get('get_books/{id}', 'BooksController@get_books')->name('books.get_books');
            Route::get('create', 'BooksController@create')->name('books.create'); //add
            Route::post('save', 'BooksController@save')->name('books.save');
            Route::get('edit/{id}', 'BooksController@edit')->name('books.edit');
            Route::post('update/{id}', 'BooksController@update')->name('books.update');
            Route::post('delete/{id}', 'BooksController@destroy_undestroy')->name('books.delete');
        });

        //  =================================  teacher ==========================
        Route::group(['prefix'=>'teacher'],function(){
            Route::get('/', 'TeacherController@index')->name('teacher.index');
            Route::get('get_teacher/{id}', 'TeacherController@get_teacher')->name('teacher.get_teacher');
            Route::get('create', 'TeacherController@create')->name('teacher.create'); //add
            Route::post('save', 'TeacherController@save')->name('teacher.save');
            Route::get('edit/{id}', 'TeacherController@edit')->name('teacher.edit');
            Route::post('update/{id}', 'TeacherController@update')->name('teacher.update');
            Route::post('delete/{id}', 'TeacherController@destroy_undestroy')->name('teacher.delete');
        });

        // question list open
        Route::get('question_list/{id}', 'QuizController@question_list')->name('quiz.question_list');
        Route::post('quiz_question_list/update', 'QuizController@quiz_question_list_update')->name('quiz.quiz_question_list_update');
        Route::get('question', 'QuestionController@index')->name('admin.question');
        Route::group(['prefix'=>'question'],function(){
            Route::get('create', 'QuestionController@create')->name('question.create');
            Route::post('save', 'QuestionController@save')->name('question.save');
            Route::get('edit/{id}', 'QuestionController@edit')->name('question.edit');
            Route::post('update/{id}', 'QuestionController@update')->name('question.update');
            Route::post('delete/{id}', 'QuestionController@destroy_undestroy')->name('question.delete');
        });

        // quiz CRUD
        Route::group(['prefix'=>'quiz'],function(){
            Route::get('/', 'QuizController@index')->name('admin.quiz');
            Route::get('get_quiz/{id}', 'QuizController@get_quiz')->name('admin.get_quiz');
            Route::get('create', 'QuizController@create')->name('quiz.create');
            Route::post('save', 'QuizController@save')->name('quiz.save');
            Route::get('edit/{id}', 'QuizController@edit')->name('quiz.edit');
            Route::post('update/{id}', 'QuizController@update')->name('quiz.update');
            Route::post('quiz/delete/{id}', 'QuizController@destroy_undestroy')->name('quiz.delete');
        });

        // question list open
        Route::get('question_list/{id}', 'QuizController@question_list')->name('quiz.question_list');
        Route::post('quiz_question_list/update', 'QuizController@quiz_question_list_update')->name('quiz.quiz_question_list_update');
        Route::get('getquestion/{id}', 'QuestionController@getQuestion')->name('question_list');
        Route::get('course/questions/{id}', 'QuestionController@course_question_list')->name('question_list');
        //   SETTINGS
        Route::group(['prefix'=>'settings'],function(){
            Route::get('/', 'SettingsController@index')->name('settings.index');
            Route::get('edit/{id}', 'SettingsController@edit')->name('settings.edit');
            Route::post('update/{id}', 'SettingsController@update')->name('settings.save');
            Route::post('upload_cropped_image', 'SettingsController@upload_cropped_image')->name('settings.upload_cropped_image');
        });

        //   Group crud
        Route::get('get_group', 'GroupController@getGroup')->name('group');
        Route::group(['prefix'=>'group'],function(){
            Route::get('/', 'GroupController@index')->name('group.index');
            Route::get('create', 'GroupController@create')->name('group.create'); //add
            Route::post('save', 'GroupController@save')->name('group.save');
            Route::get('edit/{id}', 'GroupController@edit')->name('group.edit');
            Route::post('update/{id}', 'GroupController@update')->name('group.update');
            Route::post('delete/{id}', 'GroupController@destroy_undestroy')->name('group.delete');
            Route::post('select_courses_id/{id}', 'GroupController@select_courses_data')->name('select_courses_id.delete');
            Route::post('map/lat_long', 'GroupController@group_latlong_save')->name('parent.map');
        });

        // group_exams
        Route::group(['prefix'=>'group_exams'],function(){
            Route::get('list/{id}', 'Group_ExamsController@index')->name('group_exams.index')->where('id','[0-9]+');
            Route::post('create', 'Group_ExamsController@create')->name('group_exams.create');
            Route::post('save', 'Group_ExamsController@save')->name('group_exams.save');
        });


    // ================================student list==================================
        Route::get('group/students/{id}', 'GroupController@student_list')->name('admin.group_students');
        Route::post('student_group_checked/update', 'GroupController@student_group_checked')->name('admin.student_group_checked');
        // ================================course_register=================================
        // data tables myy
        Route::get('course_register', 'Course_RegisterController@index')->name('admin.course_register');
        Route::get('get_course_register', 'Course_RegisterController@get_course_register')->name('admin.get_course_register');
        Route::get('courses/group/{id}', 'Course_RegisterController@get_courses_group')->name('admin.get_courses_group');
        Route::post('update_course_group', 'Course_RegisterController@update_course_group')->name('admin.update_course_group');
        // ================================workshop=================================
        Route::group(['prefix'=>'workshop'],function(){
            Route::get('/', 'WorkshopController@index')->name('workshop.index');
            Route::get('create', 'WorkshopController@create')->name('workshop.create'); //add
            Route::post('save', 'WorkshopController@save')->name('workshop.save');
            // Route::get('workshop/edit/{id}', 'WorkshopController@edit')->name('workshop.edit');
            Route::post('delete/{id}', 'WorkshopController@destroy_undestroy')->name('workshop.delete');
        });

        Route::post('workshop_value_updte', 'WorkshopController@update')->name('workshop.update');
    });
        //  =================================  Reports PAYMENT =========================
        Route::get('orders/payments', 'Reports\PaymentController@index_excel')->name('payment.excel');

            Route::group(['prefix'=>'reports'],function(){
                Route::get('payments', 'Reports\PaymentController@index')->name('order_payment.index');
                Route::post('payments', 'Reports\PaymentController@index')->name('payment.index');
                Route::get('payments/get_payment_report', 'Reports\PaymentController@get_payment_report')->name('get_payment_report.index');
                //   Route::post('payment/status_update/{id}', 'Reports\PaymentController@status_update')->name('payment.status_update');
                Route::post('payment/payment_refund/{id}', 'Reports\PaymentController@payment_refund')->name('payment.payment_refund');
                Route::get('permissions', 'Reports\PermissionsController@index')->name('permissions.index');
            });
            // permissions
            //    Route::get('permissions', 'Reports\PermissionsController@index')->name('permissions.index');
            Route::group(['prefix'=>'student_plan'],function(){
               Route::get('/', 'Reports\Student_planController@index')->name('student_plan.index');
               Route::get('get_student_plan', 'Reports\Student_planController@get_student_plan')->name('get_student_plan.index');
               Route::get('create', 'Reports\Student_planController@create')->name('student_plan.create'); //add
               Route::post('save', 'Reports\Student_planController@save')->name('student_plan.save');
               Route::get('edit', 'Reports\Student_planController@edit')->name('student_plan.edit');
               Route::post('update', 'Reports\Student_planController@update')->name('student_plan.update');
               Route::post('delete/{id}', 'Reports\Student_planController@destroy_undestroy')->name('student_plan.delete');
            });

});

