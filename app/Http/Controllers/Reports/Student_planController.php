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
use App\Model\Books;
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
        // dd('saassa');
        $student_plan = User::where('role_id',2)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.reports.student_plan.index', compact('student_plan'));
    }

    public function create()
    {
        $control = 'create';
       
        return view('admin.reports.student_plan.create', compact('control'));
    }

    public function save(Request $request)
    {
        $student_plan = new User();
        $this->add_or_update($request, $student_plan);

        return redirect('admin/student_plan');
    }
    public function edit(Request $request)
    {
        // dd($request->all());
        $control = 'edit';
        $student_plan = User::find($request->user_id);
        $fees_type = Config::get('constants.fees_type');
  
        return view('admin.reports.student_plan.create', compact(
            'control',
            'student_plan',
            'fees_type'
        ));
    }

    public function update(Request $request, $id)
    {
        $student_plan = User::find($id);
        // Books_courses::delete()
        $this->add_or_update($request, $student_plan);
        return Redirect('admin/student_plan');
    }


    
       
    }

