<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Course_Register;
use App\Models\Courses_Fees;
use App\Models\Group_fees;
use App\Models\Day;
use App\Models\Exams;
use Carbon\Carbon;
use App\Models\Group;
use App\Models\Group_Exams;
use App\Models\Group_Timings;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class Group_ExamsController extends Controller
{
    public function index($id)
    {
        $group = Group::with('group_exams.group','group_exams.exams')->find($id);//->where('id',$id)->first();
        $group_exams = $group->group_exams;
        // dd( $group);
        return view('admin.group_exams.index',compact('group','group_exams'));
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
        // $exams->group_id =$request->group_id;
        $exams->save();

        $group_exams = new Group_Exams();
        $group_exams->group_id = $request->group_id;
        $group_exams->exam_id = $exams->id;
        $group_exams->save();


        return redirect('admin/group_exams/list/'.$request->group_id);
    }



}
