<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Stripe;
use Illuminate\Support\Facades\Auth;
use Log;

class CoursesController extends Controller
{


    public function index(Request $request)
    {
        $name = $request->courses_name ?? '';

        $courses_list = Courses::where('full_name', 'like', '%' . $name . '%')->get();
        // $courses_list  =  Courses::get();
        $courses_list_count =  $courses_list->count();
        if($courses_list_count  == 1){
        $courses_split = $courses_list->split($courses_list_count / 1);

        }
        elseif($courses_list_count  == 2){
        $courses_split = $courses_list->split($courses_list_count / 2);
        }
        elseif($courses_list_count  == 3){
        $courses_split = $courses_list->split($courses_list_count / 3);
        }
        else{
        $courses_split = $courses_list->split($courses_list_count / 4);
        }



        // dd($courses_split);
        $category_arr = Category::pluck('name','id');
        return view('user.courses.index',compact('courses_split','category_arr','name'));
    }



    public function courses_details(Request $request)
    {
        // dd($request->all());
        $courses_id = $request->courses_id;
        $courses  =  Courses::find($courses_id);
        return view('user.courses_details.index',compact('courses'));
    }


       // course/registration
    public function course_registration(Request $request)
    {
        // dd($request->all());
        $courses_id = $request->courses_id;
        $courses  =  Courses::find($courses_id);
        $stripe_key = Config::get('services.stripe.STRIPE_KEY');
        return view('user.course_registration.index',compact('courses','stripe_key'));
    }



    public function makepayment(Request $request)
    
    {

        $user = Auth::user();
    
       Stripe\Stripe::setApiKey(Config::get('services.stripe.STRIPE_SECRET'));
       $stripe =  Stripe\Charge::create([
        // "amount" => ceil($course_register->course->price) * 100, // value pass in cent
        "amount" => ceil($request->amount), 
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Points ".$request->amount."purchased  Medical2."
    ]);
    dd($stripe);

    
if( $stripe->status == "succeeded"){

    $payment = new Payment();
    $payment->user_id = $user->id;
    $payment->payment_id = $stripe->id;
    $payment->price = $request->amount;
    $payment->payment_response = json_encode($stripe);
    $payment->payment_status = $stripe->status;
    $payment->card_type = $stripe->payment_method_details->card->brand;
    $payment->save();
    return redirect()->back()->with('success', 'Payment successful!');

}
else{
    $payment = new Payment();
    $payment->user_id = $user->id;
    $payment->payment_id = $stripe->id;
    $payment->price = $request->amount;
    $payment->payment_response = json_encode($stripe);
    $payment->payment_status = $stripe->status;
    $payment->card_type = $stripe->payment_method_details->card->brand;
    $payment->save();
    return back()->with('error', 'Invalid Payment');



}
}





}