<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Course_Register;
use App\Model\Category;
use App\Model\Courses;
use App\Model\Group;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Books;

class Course_RegisterController extends Controller
{

    public function index()
    {
     return view('admin.course_register.index');
    }
    public function get_course_register()
    {
        $course_register = Course_Register::with('course.group','user')->orderby('id', 'desc')->select('*')->get();
        // $course_register_data = [];
        $course_register_data['data'] = $course_register;
        echo json_encode($course_register_data);
        // echo json_encode([
        //     'status'=>true,
        //     'data'=>$course_register_data
        // ]);
    }

    public function get_courses_group($register_course_id)
    {
        $register_course = Course_Register::find($register_course_id);
        $groups = Group::with('courses')->where('courses_id',$register_course->course_id)->get();

        $res = [
            'status'=>true,
            'register_course' =>$register_course,
            'groups'=> $groups
        ];
        echo json_encode($res);
    }

    public function update_course_group(Request $request){

        $register_course_id = $request->register_course_id;
        $group_id = $request->group_id;
        $register_course = Course_Register::find($register_course_id);
        $register_course->group_id =    $group_id;
        // $register_course->user_id = $register_course->user_id;
        $register_course->save();

        $res['status'] = true;
        $res['register_course'] = $register_course;
        echo json_encode($res);
     
    }



}
