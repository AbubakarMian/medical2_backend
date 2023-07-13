<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Course_Register;
use App\Models\Group;
use App\Models\Exams;
use App\Models\Student_fees;
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
// dd($users[0]->group_exams->exams[0]->name);
// dd($users[0]->group_exams[0]->exam);
// dd($users[0]->group_exams->exam);
// $group  = Group::with('exams')->where('id',$course_register_group_id)->get();
// dd( $users);
//   $exams = 

// dd($user);
return view('user.exams.index',compact('users'));

    }



}
   