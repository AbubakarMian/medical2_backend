<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Course_Register;
use App\Model\Group;
use App\Model\Exams;
use App\Model\Student_fees;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class Exams_Controller extends Controller
{

    public function index()
    
    {
        $user= Auth::user();
        $course_register  = Course_Register::with('group')->where('user_id',$user->id)->get();
        // $course_register_group_id  = $course_register->group->id;
        // dd($course_register);
        // $group  = Group::with('exams')->where('id',$course_register_group_id)->get();
        // dd( $group);
    //   $exams = 
        return view('user.exams.index',compact('course_register'));

    }



}
   