<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Courses;
use App\Model\Course_Register;
use App\Model\Courses_Fees;
use App\Model\Group_fees;
use App\Model\Day;
use App\Model\Exams;
use Carbon\Carbon;
use App\Model\Group;
use App\Model\Group_Timings;
use App\Model\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class Group_ExamsController extends Controller
{
    public function index($id)
    {
        $group = Group::find($id);
        // $exams = Exams::with('group')->orderby('created_at', 'DESC')->paginate(10);
        $exams = Exams::with('group')->where('group_id',$group->id)->get();
        // dd( $exams);
        return view('admin.group_exams.index',compact('group','exams'));
    }
    public function create(Request $request)
    {
        // dd($request->all());
        $group = Group::find($request->group_id);
        $control = 'create';
        // $courses_list = Courses::pluck('full_name','id');
        return view('admin.group_exams.create', compact('control','group'));
    }
    public function save(Request $request)
    {
        //    dd($request->all());
        $exams = new Exams();
        $exams->name =$request->name;
        $exams->detail =$request->detail;
        $exams->group_id =$request->group_id;
        $exams->save();

        

        return redirect('admin/group_exams/'.$request->group_id);
    }
   
   

}