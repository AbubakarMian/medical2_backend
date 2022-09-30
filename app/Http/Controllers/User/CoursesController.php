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
use Illuminate\Support\Facades\Mail;
use App\Model\Student_fees;
use App\Model\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Stripe;

class CoursesController extends Controller
{

    public function index(Request $request)
    {
        $types = $request->type;
        $name = $request->courses_name ?? '';

        $courses = Courses::where('full_name', 'like', '%' . $name . '%');
        if ($types == 'courses') {
            $courses_list =  $courses->whereHas('group', function ($g) {
                    $g->where('type', 'course');
                })->get();
        } else {
            $courses_list = $courses->whereHas('group', function ($g) {
                    $g->where('type', 'workshop');
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
        $courses_id = $request->course_id;
        $type = $request->type;
        $courses = Courses::with('group')->find($courses_id);
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        if ($type == 'courses') {
            $courses_groups = Group::with('group_timings', 'teacher')->where('type', 'course')->whereHas('group_timings')
                ->where('courses_id', $courses->id)->get();
        } elseif ($type == 'workshop') {
            $courses_groups = Group::with('teacher','group_fees')->where('type', 'workshop')->where('courses_id', $courses->id)->get();
        }
        return view('user.course_registration.index', compact('courses', 'stripe_key', 'courses_groups', 'type'));
    }

// single register
    public function user_save_course_register(Request $request)
    {
        $user = Auth::User();
        if ($user) {
         $user =  $user->where('role_id', '2')->first();
        }
        elseif (!$user) {
            return redirect('/')->with('error', 'Please Login To Continue');
        }
        $courses_id = $request->course_id;
        $course = Courses::find($courses_id);
        $course_register =  Course_Register::where('user_id', $user->id)->where('course_id', $course->id)->first();

       
        // if ($course_register) {
        // } 
    //   if (!$course_register) {
            $group = Group::with('group_fees')->find($request->group_id);
            // dd($group);
            $course_register = new Course_Register();
            $course_register->user_id  =  $user->id;
            $course_register->course_id =   $course->id;
            $course_register->group_id = $request->group_id;
            $course_register->is_paid = 0;
            $course_register->one_time_examination_payment = 0;
            $course_register->examination_fees = 0;
            $course_register->save();

            $student_fees =  new Student_fees();
            $student_fees->user_id  =  $user->id;
            $student_fees->course_register_id  =  $course_register->id;
            $student_fees->group_id  =  $group->id;
            $student_fees->course_id  =  $course->id;
            $student_fees->fees_type  =  $group->group_fees->fees_type;
            $student_fees->amount  = $group->group_fees->amount;
            $student_fees->due_date  =  $group->group_fees->due_date;
            $student_fees->save();
            $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        // }
        return redirect('user/payment/?course_register=' . $course_register->id)->with('success', 'Course Register Successfully!');
    }
    // group_registration



    public function group_registration(Request $request)
    {
        
        $user = Auth::User();
        if ($user) {
         $user =  $user->where('role_id', '2')->first();
        }
        elseif (!$user) {
            return redirect('/')->with('error', 'Please Login To Continue');
        }
        $course_id = $request->course_id;
        $group_id   = $request->group_id;
        return view('user.add_group_members.index', compact('user', 'course_id','group_id'));
       
    }

    // 

    public function group_registration_save(Request $request)
    {
        // dd($request->all());
        $user = Auth::User();
        if ($user) {
         $user =  $user->where('role_id', '2')->first();
        }
        elseif (!$user) {
            return redirect('/')->with('error', 'Please Login To Continue');
        }
        $course_id = $request->course_id;
        $group_id   = $request->group_id;
        $response_array   = [];
      
        foreach($request->first_name as $key => $f){
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
         $users->update_password_id = uniqid();
         $users->save();
         $details = [
            'to' => $users->email,
            'user_id' => $users->id,
            'from' => 'contactus@medical2.com',
            'title' => 'Medical2',
            'subject' => 'Reference Link From Medical2 Academy ',
            "dated"  => date('d F, Y (l)'),
            'new_password' =>  $users->update_password_id,
        ];
         $course_register = new Course_Register();
         $course_register->user_id  =  $users->id;
         $course_register->course_id =   $course_id;
         $course_register->group_id = $group_id;
         $course_register->is_paid = 0;
         $course_register->one_time_examination_payment = 0;
         $course_register->examination_fees = 0;
         $course_register->save();

         $response_array['users'] = $users;   
         $response_array['course_register'] = $course_register;   
         Mail::to($users->email)->send(new Update_Password($details));
        }
      
    //    return redirect('user/update_password/?response='.$response_array);
       
    }
    public function update_password(Request $request){
        // dd($request->all());


        $update_password = $request->update_password;
        $user_id = $request->user_id;
        $user  =  User::find($user_id);
        return view('user.update_pass_form.index', compact('user'));

    }
    public function update_password_save(Request $request){
        // dd($request->all());


     
        $user_id = $request->user_id;
        $user_update_password = $request->user_update_password;
        $user  =  User::find($user_id);
        $user->password  = $user_update_password;
        $user->save();
        return view('user.update_pass_form.index', compact('user'));
        return redirect()->back()->with('success', 'Thanks ! Your Password has Been Update');

    }


    public function enter_pasword(Request $request){

        dd($request->all());
  
  
      }





    // 


    public function payment_screen(Request $request)
    {
        
        // User Course Payment History se ayga
        if($request->student_id_not_paid){
        $student_id= $request->student_id_not_paid;
        $student_fees = Student_fees::with('course_register')->find($student_id);
        $course_register_id = $student_fees->course_register_id;
        $course_register = Course_Register::find($course_register_id);
     }
        // Select Your Math Course Group se ayga
        elseif($request->course_register){
        $course_register_id = $request->course_register;
        $course_register = Course_Register::with('student_fees')->find($course_register_id);
        $student_fees_id =  $course_register->student_fees->id;
        $student_fees = Student_fees::find($student_fees_id);
   }
       $stripe_key = Config::get('services.stripe.STRIPE_KEY');
       return view('user.payment_screen.index', compact('course_register', 'stripe_key','student_fees'));
    }
    public function makepayment(Request $request)
    {
        // dd($request->all());
        //final payment
        $user = Auth::User();
        if ($user) {
         $user =  $user->where('role_id', '2')->first();
        }
        Stripe\Stripe::setApiKey(Config::get('services.stripe.STRIPE_SECRET'));
        $stripe = Stripe\Charge::create([
            "amount" => ceil($request->amount),
            "currency" => "usd",
            "source" => $request->stripeToken,
        ]);
        

        if ($stripe->status == "succeeded") {
            $student_id =  $request->student_fees_id;
            $student_fees = Student_fees::with('course_register')->find($student_id);
            // dd( $student_fees);
            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->payment_id = $stripe->id;
            $payment->course_register_id = $request->course_register_id;
            $payment->payment_response = json_encode($stripe);
            $payment->payment_status = $stripe->status;
            $payment->students_fees_id = $student_id;
            $payment->card_type = $stripe->payment_method_details->card->brand;
            //============= amount===============
            $payment->amount =   $student_fees->amount;
            $payment->save();
            $student_fees->status = 'paid';
            $student_fees->save();

            return redirect()->back()->with('success', 'Payment successful!');

            // $course_register = Course_Register::find($request->course_register_id);
            // $course_register->is_paid = 1;
            // $course_register->one_time_payment = 1;
            // $course_register->fees = $request->amount;
            // $course_register->save();
         
        } 
        else {
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
}
