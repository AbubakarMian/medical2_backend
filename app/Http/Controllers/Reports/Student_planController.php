<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Student_fees;
use App\Model\Books_courses;
use App\Model\Category;
use App\Model\Courses;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;


// STUEDENT PLAN

class Student_planController extends Controller
{
                public function index(Request $request)
                {
                    $student_plan = Student_fees::with('user')->orderBy('created_at', 'DESC')->paginate(10);
                    // dd( $student_plan);
                    return view('admin.reports.student_plan.index', compact('student_plan'));
                }

            public function edit(Request $request)
            {
                
                $control = 'edit';
                $student_plan = Student_fees::with('group')->find($request->student_id);
                $fees_type = Config::get('constants.fees_type');

                return view('admin.reports.student_plan.create', compact(
                    'control',
                    'student_plan',
                    'fees_type'
                ));
            }

            public function update(Request $request, $id)
            {
                $student_plan = Student_fees::find($id);
                $this->add_or_update($request, $student_plan,$id);
                return Redirect('admin/student_plan');
            }

            public function add_or_update(Request $request, $student_plan,$id)
                    {
// dd($request->all());
                        if ($request->amounts & $request->due_date != null ) {
                        if ($request->fees_type == 'installment') {
                            foreach ($request->amounts as $amnt_key => $am) {
                                $student_fees = new Student_fees();
                                $student_fees->user_id = $student_plan->user_id;
                                $student_fees->course_register_id = $student_plan->course_register_id;
                                $student_fees->group_id =  $student_plan->group_id;
                                $student_fees->course_id = $student_plan->course_id;
                                $student_fees->fees_type = $request->fees_type;
                                $student_fees->amount = $am;
                                $student_fees->due_date = strtotime($request->due_date[$amnt_key]);
                                $student_fees->save();
                            }
                                Student_fees::destroy($id);
                        }
                        //  complete
                        elseif ($request->fees_type == 'complete') {    
                            $student_plan->fees_type = $request->fees_type;
                            $student_plan->amount = $request->amount;
                            $student_plan->due_date = $request->due_date;
                            $student_plan->save();
                        }
                        }
                        return redirect()->back();
                    }
}
