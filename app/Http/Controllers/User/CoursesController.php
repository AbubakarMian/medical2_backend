<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Courses;
use App\Model\Course_Register;
use App\Model\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Stripe;

class CoursesController extends Controller
{

    // multiple courses list open
    public function index(Request $request)
    {
        $name = $request->courses_name ?? '';

        $courses_list = Courses::where('full_name', 'like', '%' . $name . '%')->get();
        // $courses_list  =  Courses::get();
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

        // dd($courses_split);
        $category_arr = Category::pluck('name', 'id');
        return view('user.courses.index', compact('courses_split', 'category_arr', 'name'));
    }

    // course details screen open
    public function courses_details(Request $request)
    {
        // dd($request->all());
        $courses_id = $request->courses_id;
        $courses = Courses::find($courses_id);
        return view('user.courses_details.index', compact('courses'));
    }


    // course/registration
    public function course_registration(Request $request)
    {

        $courses_id = $request->course_id;
        $courses = Courses::find($courses_id);
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        return view('user.course_registration.index', compact('courses', 'stripe_key'));
    }

    // user_save_course_register
    public function user_save_course_register(Request $request)
    {
// dd('sas');
        $user = Auth::user();
        $courses_id = $request->course_id;
        $course = Courses::find($courses_id);
        $course_register =  Course_Register::where('user_id', '2')->where('course_id', $course->id)->first();


        if($course_register ){

         }
         elseif(!$course_register){
            $course_register = new Course_Register();
            $course_register->user_id    =2;
            $course_register->course_id =   $course->id;
            $course_register->group_id = 0;
            $course_register->is_paid = 0;
            $course_register->one_time_payment = 0;
            $course_register->fees = 0;
            $course_register->save();
    $stripe_key = Config::get('services.stripe.STRIPE_KEY');
         }
    return redirect('user/payment/?course_register='.$course_register->id)->with('success', 'Course Register Successfully!');

    }

    // payment_screen open after course register
    public function payment_screen(Request $request)
    {

        $course_register_id = $request->course_register;
        $course_register = Course_Register::find($course_register_id);
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        return view('user.payment_screen.index', compact('course_register', 'stripe_key'));
    }

    // final payment and course register update
    public function makepayment(Request $request)
    {
   // dd('asd');
        $user = Auth::user();

        Stripe\Stripe::setApiKey(Config::get('services.stripe.STRIPE_SECRET'));
        $stripe = Stripe\Charge::create([
            "amount" => ceil($request->amount),
            "currency" => "usd",
            "source" => $request->stripeToken,
        ]);
        // dd($stripe);

        if ($stripe->status == "succeeded") {

            $payment = new Payment();
            $payment->user_id = 2;
            $payment->payment_id = $stripe->id;
            $payment->course_register_id	 = $request->course_register_id;
            $payment->amount = $request->amount;
            $payment->payment_response = json_encode($stripe);
            $payment->payment_status = $stripe->status;
            $payment->card_type = $stripe->payment_method_details->card->brand;
            $payment->save();
            return redirect()->back()->with('success', 'Payment successful!');

           $course_register = Course_Register::find($request->course_register_id);
           $course_register->is_paid = 1;
           $course_register->one_time_payment = 1;
           $course_register->fees = $request->amount;
           $course_register->save();



        } else {
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
