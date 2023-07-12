<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Models\Student_fees;
use App\Models\Books_courses;
use App\Models\Category;
use App\Models\Courses;
use App\Models\Group;
use App\Models\Group_fees;
use App\Models\Course_Register;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;


// STUEDENT PLAN

class Student_planController extends Controller
{
    public function index(Request $request)
    {
        // $student_plan = Group_users::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        // $student_plan = Student_fees::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        // $group = Group::with('courses', 'teacher','user','student_fees')->orderby('id', 'desc')->select('*')->get();
        //  dd($course_register);
        return view('admin.reports.student_plan.index');
    }
    public function get_student_plan(Request $request)
    {
        // $student_plan = Group_users::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        // $student_plan = Student_fees::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        // $group = Group::with('courses', 'teacher','user','student_fees')->orderby('id', 'desc')->select('*')->get();
        $course_register = Course_Register::with('group', 'user','course')->orderby('id', 'desc')->select('*')->get();
        //  dd($course_register);
        $studentplanData['data'] = $course_register;
        echo json_encode($studentplanData);
    }

    public function edit(Request $request)
    {
        //    dd($request->all());
        $control = 'edit';
        $user_id = $request->user_id;
        $course_register_id = $request->course_register_id;

        $student_plan = Student_fees::where('user_id', $user_id)->where('course_register_id', $course_register_id)->get();
        // dd($student_plan);
        $fees_type = Config::get('constants.fees_type');

        return view('admin.reports.student_plan.create', compact(
            'control',
            'student_plan',
            'fees_type'
        ));
    }

    // public function update(Request $request)
    // {
    //     dd($request->all());
    //     // $student_plan = Student_fees::find($id);
    //     // $this->add_or_update($request, $student_plan,$id);
    //     return Redirect('admin/student_plan');
    // }

    public function update(Request $request)
    {


        $user_id = $request->user_id;
        $group_id = $request->group_id;
        $course_id = $request->course_id;
        $course_register_id = $request->course_register_id;


        if ($request->fees_type  ==  null) {
            //purana plan
        } else {

            if ($request->amounts & $request->due_date) {           //new plan

                // dd('saas');
                if ($request->student_id) {
                    foreach ($request->student_id as $key => $st) {
                        $student_feess = Student_fees::where([
                            'id' => $st,
                            // 'user_id'=>$user_id,
                            // 'course_register_id'=>$course_register_id,
                            // 'group_id'=>$group_id,
                        ])->delete();
                    }
                }


                if ($request->fees_type == 'installment') {
                    foreach ($request->amounts as $amnt_key => $am) {
                        $student_fees = new Student_fees();
                        $student_fees->user_id = $user_id;
                        $student_fees->course_register_id =  $course_register_id;
                        $student_fees->group_id =  $group_id;
                        $student_fees->course_id = $course_id;
                        $student_fees->fees_type = $request->fees_type;
                        $student_fees->amount = $am;
                        $student_fees->due_date = strtotime($request->due_date[$amnt_key]);
                        $student_fees->save();
                    }
                }
                //  complete
                elseif ($request->fees_type == 'complete') {

                    $student_fees = new Student_fees();
                    $student_fees->user_id = $user_id;
                    $student_fees->course_register_id =  $course_register_id;
                    $student_fees->group_id =  $group_id;
                    $student_fees->course_id = $course_id;
                    $student_fees->fees_type = $request->fees_type;
                    $student_fees->amount = $request->amounts;
                    $student_fees->due_date = strtotime($request->due_date);
                    $student_fees->save();
                }
            }
        }
        return redirect()->back();
    }
}
