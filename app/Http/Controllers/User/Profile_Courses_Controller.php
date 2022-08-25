<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Course_Register;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class Profile_Courses_Controller extends Controller
{
    /// my courses list
      public function my_courses(){
        $user = Auth::User();
        // dd($user);
        if($user){
        $user =  $user->where('role_id','2')->first();
        }
   
        $course_register = Course_Register::where('user_id', $user->id)->with('course.group','user')->orderby('id', 'desc')->select('*')->get();
        return view('user.profile_courses',compact('course_register'));
    }

    // profile
    public function my_profile(){
        $user = Auth::user();
        if($user){
            $user =  $user->where('role_id','2')->first();
            }
        return view('user.profile_acount');
    }

    // my_profile_save
     public function my_profile_save(Request $request){
        // dd($request->all());
        $users = Auth::user();
        if($users){
        $users =  $user->where('role_id','2')->first();
          }
       
        $users->name = $request->name;
        // $users->email = $request->email;
        $users->city = $request->city;
        $users->zip_code = $request->zip;
        $users->state = $request->state;
        $users->work_experience = $request->experience;
        $users->role_id = 2;
        $users->save();
     
     
        return redirect()->back()->with('success', 'Your Profile Has Been Update Successfully.Thank You !');
    }


   


}
