<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Category;
use App\Model\Courses;
use App\Model\Teacher;
use App\Model\Group;
use Carbon\Carbon;
use Date; 
use Maatwebsite\Excel\Concerns\ToArray;
// Group;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $workshop = Group::with('courses','teacher')->where('type','workshop')->orderBy('created_at', 'DESC')->paginate(10);
        $teacher = Teacher::pluck('id','name');
        // dd( $teacher);
        return view('admin.workshop.index', compact('workshop','teacher'));
    }

    public function create()
    {
        $control = 'create';
        $course_id = Courses::pluck('full_name', 'id');
        $teacher = Teacher::pluck('name', 'id');
        return view('admin.workshop.create', compact('control', 'course_id','teacher'));
    }

    public function save(Request $request)
    {
         $workshop = new Group();

        $start_timestamp = $this->time_to_timestamp($request->start_time);
        $end_timestamp = $this->time_to_timestamp($request->end_time);

        foreach($request->selected_multi as $sm){
            // dd($sm);
            
            $workshop = new Group();
            $workshop->name = $request->name;
            $workshop->courses_id = $request->courses_id;
            // 
            $workshop->start_date = $sm+$start_timestamp;
            $workshop->end_date = $sm+$end_timestamp;
            // 
            $workshop->teacher_id = $request->teacher_id;
            $workshop->type = 'workshop';
            if($request->is_online == "on"){
                //  dd('ABCC');
                $workshop->is_online = 1;
                $workshop->lat = 0;
                $workshop->long = 0;
             }
            else{
                // dd('ABCC');
            $workshop->lat = $request->group_lat;
            $workshop->long = $request->group_long;
            $workshop->is_online = 0;
            }
            $workshop->save();
 }
          return redirect('admin/workshop');
    }
    public function edit($id)
    {
        $control = 'edit';
        $workshop = Group::find($id);
        $course_id = Courses::pluck('full_name', 'id');
        $teacher = Teacher::pluck('name', 'id');
      
      
        return view('admin.workshop.create', compact(
            'control',
            'workshop',
            'course_id',
            'teacher',
        ));
    }
//   edit and update   in index page 
    public function update(Request $request)
    {
        $workshop = Group::find($request->workshop_id);
        $workshop->name = $request->input_enabled_f_name_value_get;
        // $workshop->courses_id = $request->courses_id;
        // $workshop->teacher_id = $request->teacher_id;
        $workshop->save();
        $response = Response::json([
            "status" => true,
            'workshop' => $workshop
        ]);
        return $response;
 }


    public function add_or_update(Request $request, $workshop)
    {
    //    dd($request->all());

       
    }

    public function destroy_undestroy($id)
    {
        $workshop = Group::find($id);
        if ($workshop) {
            Group::destroy($id);
            $new_value = 'Activate';
        } else {
            Group::withTrashed()->find($id)->restore();
            $new_value = 'Delete';
        }
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => $new_value
        ]);
        return $response;
    }
}
