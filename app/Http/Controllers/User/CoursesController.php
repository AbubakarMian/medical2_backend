<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Courses;
use App\User;
use App\Model\Group;
use App\Model\Course_Register;
use App\Mail\Update_Password;
use App\Model\Group_Timings;
use App\Model\Group_users;
use Illuminate\Support\Facades\Mail;
use App\Model\Student_fees;
use App\Model\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Stripe;

class CoursesController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::User();
        // dd(   $user);
        $types = $request->type;
        $name = $request->courses_name ?? '';

        $courses = Courses::where('full_name', 'like', '%' . $name . '%');
        if ($types == 'courses') {
            $courses_list =  $courses->whereHas('group.group_fees', function ($g) {
                $g->where('type', 'course');
            })->get();
        } else {
            $courses_list = $courses->whereHas('group', function ($g) {
                $g->where('type', 'workshop')->with([
                    'group.group_fees' => function ($u) use ($g) {
                        $u->where('group.group_fees', '>', 0);
                    }

                ]);
            })->get();
        }
        $courses_list_count = $courses_list->count();
        if ($courses_list_count == 1) {
            $courses_split = $courses_list->split($courses_list_count / 1);
        } elseif ($courses_list_count == 2) {
            $courses_split = $courses_list->split($courses_list_count / 2);
        } elseif ($courses_list_count == 3) {
            $courses_split = $courses_list->split($courses_list_count / 3);
        } else {
            $courses_split = $courses_list->split($courses_list_count / 4);
        }
        $category_arr = Category::pluck('name', 'id');
        return view('user.courses.index', compact('courses_split', 'category_arr', 'name', 'types'));
    }

    public function courses_details(Request $request)
    {
        $courses_id = $request->courses_id;
        $courses = Courses::find($courses_id);
        return view('user.courses_details.index', compact('courses'));
    }



    public function course_registration(Request $request)
    {
        $user = Auth::User();
        if (!$user) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
        }
        $courses_id = $request->course_id;
        $type = $request->type;
        $courses = Courses::with('group')->find($courses_id);
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        $course_registers =  Course_Register::with('group')->where('user_id', $user_id)->where('course_id',  $courses->id)->first();

        if ($course_registers) {
            $course_register =  Course_Register::with('group')->where('user_id', $user->id)->where('course_id',  $courses->id)->first();

            return view('user.course_registration.index', compact('courses', 'stripe_key', 'type', 'course_register'));
        } else {
            if ($type == 'courses') {
                $courses_groups = Group::with('group_timings', 'teacher')->where('type', 'course')->whereHas('group_timings')
                    ->where('courses_id', $courses->id)->get();
            } elseif ($type == 'workshop') {
                $courses_groups = Group::with('teacher', 'group_fees')->where('type', 'workshop')->where('courses_id', $courses->id)->get();
            }
            // dd(  $courses_groups);
            return view('user.course_registration.index', compact('courses', 'stripe_key', 'courses_groups', 'type'));
        }




        // dd($course_register);


    }






    // group memebers opennnnnnnnnnnn


    public function group_registration(Request $request)
    {
        // dd('sas');
        $user = Auth::User();
        if (!$user) {
            // return redirect('/')->with('error', 'Please Login To Continue');
            return redirect('/')->with('login_error', 'Please Login To Continue');
        }
        $course_id = $request->course_id;
        $group_id   = $request->group_id;
        return view('user.add_group_members.index', compact('user', 'course_id', 'group_id'));
    }
    // group memebers course  register

    public function group_registration_save(Request $request)
    {



        // dd($request->all());
        $one_user = Auth::User();
        $reg_key = uniqid();

        if (!$one_user) {
            // return redirect('/')->with('error', 'Please Login To Continue');
            return redirect('/')->with('login_error', 'Please Login To Continue');
        }
        $course_id = $request->course_id;
        $group_id   = $request->group_id;
        $group = Group::with('group_fees')->find($group_id);
        $response_array   = [];
        $all_users_id  = [];
        $all_course_register   = [];
        $res = new \stdClass();
        $studen_array_id = [];


        // for groupppppp
        foreach ($request->first_name as $key => $f) {

            $user = new User;


            $email_validator =  Validator::make(['email' => $request->email[$key]], [
                'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)]
            ]);
            if ($email_validator->fails()) {
                return back()->with('error', $email_validator->errors());
            }
            $phone_validator =  Validator::make(['phone_no' => $request->contact[$key]], [
                'phone_no' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)] //
            ]);
            if ($phone_validator->fails()) {
                return back()->with('error', $phone_validator->errors());
            }
            $users = new User();
            $users->name = $f;
            $users->last_name = $request->last_name[$key];
            $users->email = $request->email[$key];
            $users->phone_no = $request->contact[$key];
            $users->adderss = $request->address[$key];
            $users->city = $request->city[$key];
            $users->zip_code = $request->zip_code[$key];
            $users->state = $request->state[$key];;
            $users->role_id = 2;
            $users->update_password_id = rand(10000, 99999);
            $users->save();
            $all_users_id[] = $users;
            $details = [
                'to' => $users->email,
                'user_id' => $users->id,
                'from' => 'contactus@medical2.com',
                'title' => 'Medical2',
                'subject' => 'Reference Link From Medical2 Academy ',
                "dated"  => date('d F, Y (l)'),
                'new_password' =>  $users->update_password_id,
            ];
            $user_group = new Group_users();
            $user_group->group_id = $group_id;
            $user_group->user_id = $users->id;
            $user_group->save();

            $course_register = new Course_Register();
            $course_register->user_id  =  $users->id;
            $course_register->course_id =   $course_id;
            $course_register->group_id = $group_id;
            $course_register->user_group_id = $user_group->id;
            $course_register->is_paid = 0;
            $course_register->one_time_examination_payment = 0;
            $course_register->examination_fees = 0;
            $course_register->registration_key = $reg_key;
            $course_register->save();
            $all_course_register[] =    $course_register;

            //

            $group = Group::with('group_fees')->find($group_id);

            foreach ($group->group_fees as $gf) {
                $student_fees =  new Student_fees();
                $student_fees->user_id  =  $users->id;
                $student_fees->course_register_id  =  $course_register->id;
                $student_fees->group_id  =  $group->id;
                $student_fees->course_id  =  $course_id;
                $student_fees->fees_type  =  $gf->fees_type;
                $student_fees->amount  = $gf->amount;
                $student_fees->due_date  =  $gf->due_date;
                $student_fees->save();
                $studen_array_id[] =   $student_fees;
            }
            //   Mail::to($users->email)->send(new Update_Password($details));

        }



        // 
        // special user jo logo ko group register krwata hai


        $group = Group::with('group_fees')->find($request->group_id);
        $course_register_one = new Course_Register();
        $course_register_one->user_id  =  $one_user->id;
        $course_register_one->course_id =   $course_id;
        $course_register_one->group_id = $group_id;
        // $course_register->user_group_id = $user_group->id;
        $course_register_one->is_paid = 0;
        $course_register_one->one_time_examination_payment = 0;
        $course_register_one->examination_fees = 0;
        $course_register_one->save();
        foreach ($group->group_fees as $gf) {
            $student_fee =  new Student_fees();
            $student_fee->user_id  =  $one_user->id;
            $student_fee->course_register_id  =  $course_register_one->id;
            $student_fee->group_id  =  $group->id;
            $student_fee->course_id  =  $course_id;
            $student_fee->fees_type  =  $gf->fees_type;
            $student_fee->amount  = $gf->amount;
            $student_fee->due_date  =  $gf->due_date;
            $student_fee->save();
            $studen_array_id[] =   $student_fee;
        }

        //




        $course = Courses::with('group')->find($course_id);
        $success = 'success';
        return view('user.show_group_members_payment.index', compact('studen_array_id', 'all_users_id', 'all_course_register', 'success', 'course', 'group'));
    }


    // group_payment_finalize

    public function group_payment_finalize(Request $request)
    {
        //   dd($request->all());
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        $res_student_array = [];
        $amount = $request->total_amount;
        // if (!$request->student_id) {
        //     return redirect()->back()->with('error', 'Please ! Choose The Payment');;
        // }
        if ($request->student_id) {
            foreach ($request->student_id as $st_id) {
                $student_fees = Student_fees::with('user', 'course')->find($st_id);
                $res_student_array[] =  $student_fees;
            }
            return view('user.group_payment_screen.index', compact('stripe_key', 'res_student_array', 'amount'));
        }
    }
    // group_members_payment_screen

    public function group_members_payment_screen(Request $request)
    {
        // dd($request->all());

        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        $course_register_id = $request->course_register;
        $course_register = Course_Register::with('student_fees', 'user', 'course', 'group')->find($course_register_id);
        $student_fees_id =  $course_register->student_fees->id;
        //multipe couurses register ki payment ayngi
        $student_fees = Student_fees::with('user', 'course')->where('user_id', $course_register->user->id)->orderby('due_date')->get();
        return view('user.payment_screen.index', compact('course_register', 'stripe_key', 'student_fees'));
    }


    // group memebers closeeeeeeeeeeeeeee


    // pending function for update password


    public function update_password(Request $request)
    {
        // dd($request->all());
        $update_password = $request->update_password;
        $user_id = $request->user_id;
        $user  =  User::find($user_id);
        return view('user.update_pass_form.index', compact('user'));
    }

    public function enter_pasword(Request $request)
    {

        // dd($request->all());
    }

    public function update_password_save(Request $request)
    {
        // dd($request->all());
        $user_id = $request->user_id;
        $user_update_password = $request->user_update_password;
        $user  =  User::find($user_id);
        $user->password =  Hash::make($user_update_password);
        $user->save();

        return redirect()->back()->with('success', 'Thanks ! Your Password has Been Update');
    }
    // return view('user.update_pass_form.index', compact('user'));




    // close pending functionsssss


    // single register opennnnnnnnnnnnnnnnnn
    public function user_save_course_register(Request $request)
    {
        // dd($request->all());
        $user = Auth::User();
        if (!$user) {
            // return redirect('registration');
            return redirect('/')->with('login_error', 'Please Login To Continue');
        }
        $courses_id = $request->course_id;
        $group_id = $request->group_id;
        $course = Courses::find($courses_id);
        $course_register =  Course_Register::where('user_id', $user->id)->where('course_id', $course->id)->first();

        // dd( $course_register);
        if ($course_register) {
            // do nothing and go to payment screen
            //         $payment = Payment
            // return redirect('user_show_payment/?course_register=' . $course_register->id)->with('success', 'Course Register Successfully!');
            // return redirect()->back()->with('success', 'Sorry ! You are  already Registered in this Course ');
        } elseif (!$course_register) {

            $user_group = new Group_users();
            $user_group->group_id = $group_id;
            $user_group->user_id = $user->id;
            $user_group->save();

            $group = Group::with('group_fees')->find($request->group_id);
            $course_register = new Course_Register();
            $course_register->user_id  =  $user->id;
            $course_register->course_id =   $course->id;
            $course_register->group_id = $group_id;
            $course_register->user_group_id = $user_group->id;
            $course_register->is_paid = 0;
            $course_register->one_time_examination_payment = 0;
            $course_register->examination_fees = 0;
            $course_register->save();
            foreach ($group->group_fees as $gf) {
                $student_fees =  new Student_fees();
                $student_fees->user_id  =  $user->id;
                $student_fees->course_register_id  =  $course_register->id;
                $student_fees->group_id  =  $group->id;
                $student_fees->course_id  =  $course->id;
                $student_fees->fees_type  =  $gf->fees_type;
                $student_fees->amount  = $gf->amount;
                $student_fees->due_date  =  $gf->due_date;
                $student_fees->save();
            }

            $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        }
        // dd( $course_register);
        return redirect('user_show_payment/?course_register=' . $course_register->id)->with('success', 'Course Register Successfully!');
    }

    public function user_show_payment(Request $request)
    {
        // dd('asa');
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');

        // User Course Payment History se ayga
        if (isset($request->student_id_not_paid)) {
            // dd('asas');
            $student_id = $request->student_id_not_paid;
            $single_student_fees = Student_fees::with('course_register')->where('status', '!=', 'paid')->find($student_id);
            $course_register_id = $single_student_fees->course_register_id;
            $course_register = Course_Register::with('student_fees', 'user', 'course', 'group')->find($course_register_id);
            return view('user.user_show_payment.index', compact('course_register', 'stripe_key', 'single_student_fees'));
        }
        // Select Your Math Course Group se ayga
        elseif ($request->course_register) {
            // dd('saass');
            $course_register_id = $request->course_register;
            $course_register = Course_Register::with('student_fees', 'user', 'course', 'group')->find($course_register_id);
            // dd($course_register);
            $student_fees_id =  $course_register->student_fees->id;
            //   dd($student_fees_id);
            $group_id =  $course_register->group_id;
            //multipe couurses register ki payment ayngi
            $student_fees = Student_fees::with('user', 'course', 'group')->where('status', '!=', 'paid')->where('user_id', $course_register->user->id)
                ->where('group_id', $group_id)->orderby('due_date')->get();
            // dd(  $student_fees );
            return view('user.user_show_payment.index', compact('course_register', 'stripe_key', 'student_fees'));
        }
    }

    public function payment_screen(Request $request)
    {
        // dd($request->all());
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        $res_student_array = [];

        // multiple installmemnt choose
        if ($request->student_id) {
            foreach ($request->student_id as $st_id) {
                $student_fees = Student_fees::with('user', 'course')->find($st_id);
                $res_student_array[] =  $student_fees;
            }
            return view('user.payment_screen.index', compact('stripe_key', 'res_student_array'));
        }

        // single installmemnt choose
        elseif ($request->single_student_id) {
            $single_student_id = $request->single_student_id;
            $student_fees = Student_fees::with('user', 'course')->find($single_student_id);
            return view('user.payment_screen.index', compact('stripe_key', 'student_fees'));
        } elseif (!$request->student_id || !$request->single_student_id) {
            return redirect()->back()->with('error', 'Please ! Choose The Payment');;
        }
    }
    // single register closeeeeeeeeeeee




    //   payment for all group and users

    public function makepayment(Request $request)
    {
        //final payment
        $user = Auth::User();

        Stripe\Stripe::setApiKey(Config::get('services.stripe.STRIPE_SECRET'));
        $stripe = Stripe\Charge::create([
            "amount" => ceil($request->amount),
            "currency" => "usd",
            "source" => $request->stripeToken,
        ]);


        if ($stripe->status == "succeeded") {

            //  dd($request->all());

      // multiple installmemnt choose
            if ($request->student_id) {
                    $student_fees = Student_fees::with('user', 'course', 'course_register')->find($request->student_id);
                    $payment = new Payment();
                    $payment->user_id = $user->id;
                    $payment->payment_id = $stripe->id;
                    $payment->course_id = $student_fees->course_register->course_id;
                    $payment->payment_response = json_encode($stripe);
                    $payment->payment_status = $stripe->status;
                    $payment->card_type = $stripe->payment_method_details->card->brand;
                    //============= amount===============
                    $payment->amount =   $request->amount;
                    $payment->save();

                foreach ($request->student_id as $st_id) {
                    $student_fees = Student_fees::with('user', 'course', 'course_register')->find($st_id);
                    //
                    // $course_register = Course_Register::find($request->course_register_id);
                    // $course_register->is_paid =   1;
                    // $course_register->save();
                    //
                    $student_fees->status = 'paid';
                    $student_fees->payment_id = $payment->id;
                    $student_fees->save();
                }

                // single installmemnt choose
            } elseif ($request->single_student_id) {
                $student_fees = Student_fees::with('user', 'course','course_register')->find($request->single_student_id);
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->payment_id = $stripe->id;
                $payment->course_id = $student_fees->course_register->course_id;
                $payment->payment_response = json_encode($stripe);
                $payment->payment_status = $stripe->status;
                $payment->card_type = $stripe->payment_method_details->card->brand;
                //============= amount===============
                $payment->amount =   $student_fees->amount;
                $payment->save();
                //
                // $course_register = Course_Register::find($request->course_register_id);
                // $course_register->is_paid =   1;
                // $course_register->save();
                //
                $student_fees->status = 'paid';
                $student_fees->payment_id = $payment->id;
                $student_fees->save();
            } elseif ($request->group_student_id) {
                //   student_fees for groups
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->payment_id = $stripe->id;
                $payment->payment_response = json_encode($stripe);
                $payment->payment_status = $stripe->status;
                $payment->card_type = $stripe->payment_method_details->card->brand;
                //============= amount===============
                $payment->amount =   $request->amount;
                $payment->save();
                //
                // $course_register = Course_Register::find($request->course_register_id);
                // $course_register->is_paid =   1;
                // $course_register->save();
                //
                foreach ($request->group_student_id as $st_id) {
                    $student_fees = Student_fees::with('user', 'course')->find($st_id);
                    // dd( $student_fees);
                    $student_fees->status = 'paid';
                    $student_fees->payment_id = $payment->id;
                    $student_fees->save();
                }
                $payment->course_id = $student_fees->course_register->course_id;
                $payment->save();
            }
            return redirect('payment/success');
        } elseif (!$stripe->status == "succeeded") {
            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->payment_id = $stripe->id;
            $payment->amount = $request->amount;
            $payment->payment_response = json_encode($stripe);
            $payment->payment_status = $stripe->status;
            $payment->card_type = $stripe->payment_method_details->card->brand;
            $payment->save();
            return back()->with('error', 'Invalid Payment');
        }
    }
    public function payment_success()
    {

        // dd('sasa');
        // return view('user.user_show_success.index')->with('success', 'Payment successfull!');
        return redirect('/')->with('success', 'Payment successfull');
    }
}
