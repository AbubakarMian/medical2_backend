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
// $users  = Course_Register::with('group')->where('user_id',$user->id)->get();
$users  = Course_Register::with('group_exams')->where('user_id',$user->id)->get();
// $course_register_group_id  = $course_register->group->id;
dd($users[0]->group_exams->exams[0]->name);
// $group  = Group::with('exams')->where('id',$course_register_group_id)->get();
// dd( $users);
//   $exams = 

// dd($user);
return view('user.exams.index',compact('users'));

    }



}
   