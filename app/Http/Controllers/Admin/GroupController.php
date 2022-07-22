<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Courses;
use App\Model\Course_Register;
use App\Model\Day;
use App\Model\Group;
use App\Model\Group_Timings;
use App\Model\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class GroupController extends Controller
{
    public function index()
    {
        return view('admin.group.index');
    }
    public function getGroup()
    {
        $group = Group::with('courses','teacher')->orderby('id', 'desc')->select('*')->get();
        $groupdata['data'] = $group;
        echo json_encode($groupdata);
    }

    public function create()
    {
        $control = 'create';
        $course_id = Courses::pluck('full_name', 'id');
        $full_days = Day::pluck('day', 'id');
        $teacher = Teacher::pluck('name', 'id');
        // dd($full_days);
        return view('admin.group.create', compact('control', 'course_id', 'full_days','teacher'));
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $group = new Group();
        $this->add_or_update($request, $group);
        return redirect('admin/group');
    }
    public function edit($id)
    {
        $control = 'edit';
        $group = Group::find($id);
        $course_id = Courses::pluck('full_name', 'id');
        $group_timings =  Group_Timings::where('group_id',  $group->id)->get();
        $full_days = Day::pluck('day', 'id');
        $teacher = Teacher::pluck('name', 'id');
        // dd(   $group_timings);
        //  $full_days = Day::pluck('day', 'id');
        return view('admin.group.create', compact(
            'control',
            'group',
            'course_id',
            'group_timings',
            'full_days',
            'teacher',

        ));
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group_timings =  Group_Timings::where('group_id',  $group->id)->delete();

        $this->add_or_update($request, $group);
        return Redirect('admin/group');
    }
    public function add_or_update(Request $request, $group)
    {
// dd($request->all());
        $start_date_timestamp = strtotime($request->start_date); // start date
        $end_date_timestamp = strtotime($request->end_date); //end date
        // dd($start_date_timestamp);

        $group->name = $request->name;
        $group->courses_id = $request->courses_id;
        $group->start_date = $start_date_timestamp;
        $group->end_date = $end_date_timestamp;
        $group->teacher_id = $request->teacher_id;
        $group->type = 'course';
        if($request->is_online == "on"){
            $group->is_online = 1;
            $group->lat = 0;
            $group->long = 0;
         }
        else{
        $group->lat = $request->group_lat;
        $group->long = $request->group_long;
        $group->is_online = 0;
        }
        $group->save();

        foreach ($request->day as $key => $d) {
            // dd($d[]);
            $group_timings = new Group_Timings();
            $group_timings->course_id = $request->courses_id;
            $group_timings->group_id = $group->id;
            $group_timings->day = $d;
            $group_timings->start_time = strtotime($request->start_time[$key]);
            $group_timings->end_time = strtotime($request->end_time[$key]);

            $group_timings->save();
        }
        return redirect()->back();
    }

    public function destroy_undestroy($id)
    {

        $group = Group::find($id);
        if ($group) {
            Group::destroy($id);
            $new_value = 'Activate';
        } else {
            Group::withTrashed()->find($id)->restore();
            $new_value = 'Delete';
        }
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => $new_value,
        ]);
        return $response;
    }

    public function student_list($id)
    {
        $group_id = $id;
        $student = User::where('role_id', '2')->get();
        $group = Group::find($id);
        //   dd ($group);
        $group_users = Course_Register::where('group_id', $group_id)->pluck('user_id')->toArray();
        // dd ($group_users);
        // $group_users =  Group_users::where('group_id', $group_id)->pluck('user_id')->toArray();
        return view('admin.student_group_list.index', compact('student', 'group', 'group_users'));
    }

    public function student_group_checked(Request $request)
    {
        // dd($request->all());

        $res = new \stdClass();
        $student_id = $request->student_id;
        $group_id = $request->group_id;

        $group = Group::find($group_id);

        $group_users = Course_Register::where('group_id', $group_id)->pluck('user_id')->toArray();
        // $group_users =  Group_Users::where('group_id', $group_id)->where('user_id', $student_id)->first();
        if ($group_users) {
            $group_users->delete();
            $res->message = 'Removed Successfully';
        } else {
            $group_users = new Course_Register();
            $group_users->user_id = $student_id;
            $group_users->group_id = $group_id;
            $group_users->course_id = $group->courses_id;
            $group_users->save();
            $res->message = 'Added Successfully';
        }
        $res->status = true;
        return json_encode($res);
    }




    // group_latlong_save  map

    function group_latlong_save(Request $request){

       
        $sample_class =  new \stdClass();
        $sample_class->lat = $request->map_latitide;
        $sample_class->long = $request->map_longitude;
      
    

        $response = Response::json([
            "status" => true,
            'new_value' => 'save',
            'sample_class' => $sample_class,
        ]);
        return $response;


    }

    // "24.961841872696603"




}
