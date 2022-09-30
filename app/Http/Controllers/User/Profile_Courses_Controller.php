<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Course_Register;
use App\Model\Student_fees;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class Profile_Courses_Controller extends Controller
{
    
      public function my_courses(){
        
      $user = Auth::user();
      if(!$user){
          $user = new \stdClass();
          $user->role_id = 0;
      }

        if($user->role_id == 2){
        $course_register = Course_Register::where('user_id', $user->id)->with('course.group','user')->orderby('id', 'desc')->select('*')->get();
       
        }
        
      
        return view('user.profile_courses',compact('course_register'));
    }

  
    public function my_profile(){
        $user = Auth::user();
        if($user){
            // $user =  $user->where('role_id','2')->first();
            $user =  $user->where('role_id','2');
            }
        return view('user.profile_acount');
    }


     public function my_profile_save(Request $request){
        $users = Auth::user();
        if($users){
        $users =  $users->where('role_id','2');
          }
        $users->name = $request->name;
        $users->city = $request->city;
        $users->zip_code = $request->zip;
        $users->state = $request->state;
        $users->work_experience = $request->experience;
        $users->role_id = 2;
        $users->save();
        return redirect()->back()->with('success', 'Your Profile Has Been Update Successfully.Thank You !');
    }

    public function course_payemts(Request $request){
      // dd($request->all());
      $user = Auth::user();
      if(!$user){
          $user = new \stdClass();
          $user->role_id = 0;
      }

        if($user->role_id == 2){
       
        // dd( $user);
        $student_fees = Student_fees::with('user','course')->where('user_id',$user->id)->orderby('due_date')->get();
         
      }
         
          // dd($student_fees);
         return view('user.course_payment_users.index',compact('student_fees'));
      
    }




}
