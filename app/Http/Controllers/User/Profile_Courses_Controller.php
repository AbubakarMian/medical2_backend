<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Course_Register;
use App\Model\Group;
use App\Model\Student_fees;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class Profile_Courses_Controller extends Controller
{

    public function my_courses()
    {
    //  dd(   $student_fees );
    $user = Auth::user();
        // if (!$user) {
        //     $user = new \stdClass();
        //     $user->role_id = 0;
        // }
        $now = time();
          $course_register = Course_Register::with(['group', 'user','course',
          'student_feess'=>function($q)use($now){
            $q
            ->where('due_date','<',$now)
            ->where('status','pending');
          }])
          ->where('user_id', $user->id)
          ->orderby('id', 'desc')
          ->select('*')->get();

        //   dd($course_register);
            // dd($course_register);
            // $date = Carbon::now();


        return view('user.profile_courses', compact('course_register'));
    }

    //
    public function courses_frame(Request $request)
    {
        // dd('saa');
        $group_id = $request->group_id;
        $group = Group::find($group_id);

        return view('user.courses_frame.index', compact('group'));
    }
    //



    public function my_profile()
    {
        $user = Auth::user();

        return view('user.profile_acount');
    }


    public function my_profile_save(Request $request)
    {
        $users = Auth::user();
        $users->name = $request->name;
        $users->city = $request->city;
        $users->zip_code = $request->zip;
        $users->state = $request->state;
        $users->work_experience = $request->experience;
        $users->role_id = 2;
        $users->save();
        return redirect()->back()->with('success', 'Your Profile Has Been Update Successfully.Thank You !');
    }

    public function course_payemts(Request $request)
    {
        $user = Auth::user();
        $student_fees = Student_fees::with('user', 'course','group')->where('user_id', $user->id)->orderby('due_date')->get();
        // dd(    $student_fees);

        return view('user.course_payment_users.index', compact('student_fees'));
    }
}
