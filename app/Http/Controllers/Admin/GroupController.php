<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Courses;
use App\Model\Course_Register;
use App\Model\Courses_Fees;
use App\Model\Group_fees;
use App\Model\Day;
use Carbon\Carbon;
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
        $group = Group::with('courses', 'teacher','group_exams')->orderby('id', 'desc')->select('*')->get();
        $groupdata['data'] = $group;
        echo json_encode($groupdata);
    }

    public function create()
    {
        $control = 'create';
        $course_id = Courses::pluck('full_name', 'id');
        $all_courses = Courses::with('group')->get();
        $fees_type = Config::get('constants.fees_type');
        $full_days = Day::pluck('day', 'id');
        $teacher = Teacher::pluck('name', 'id');
        return view('admin.group.create', compact('control', 'course_id', 'full_days', 'teacher', 'fees_type'));
    }

    // select_courses_data

    public function select_courses_data($course_id)
    {
        $course_id = Courses_Fees::where('course_id', $course_id)->with('courses')->get();
        $select_course_data['data'] =   $course_id;
        $select_course_data['status'] =  true;
        echo json_encode($select_course_data);
    }


    public function save(Request $request)
    {
        $group = new Group();
        return $this->add_or_update($request, $group);
    }
    public function edit($id)
    {
        $control = 'edit';
        $group = Group::find($id);

        $group->start_date = date('Y-m-d',$group->start_date);
        $group->end_date = date('Y-m-d',$group->end_date);
        $fees_type = Config::get('constants.fees_type');
        $course_id = Courses::pluck('full_name', 'id');

        $group_timings =  Group_Timings::where('group_id',  $group->id)->get();
        // dd($group_timings);
        $full_days = Day::pluck('day', 'id');
        $teacher = Teacher::pluck('name', 'id');
        return view('admin.group.create', compact(
            'control',
            'group',
            'course_id',
            'group_timings',
            'full_days',
            'teacher',
            'fees_type'

        ));
    }

    public function update(Request $request, $id)
    {
        // dd('aa');
        $group = Group::find($id);
        $group_timings =  Group_Timings::where('group_id',  $group->id)->delete();
        return $this->add_or_update($request, $group);
        return Redirect('admin/group');
    }
    public function add_or_update(Request $request, $group)
    {
        // dd($request->all());
        $start_date_timestamp = strtotime($request->start_date);
        $end_date_timestamp = strtotime($request->end_date);
        $group->name = $request->name;
        $group->courses_id = $request->courses_id;
        $group->start_date = $start_date_timestamp;
        $group->end_date = $end_date_timestamp;

        if ($start_date_timestamp > $end_date_timestamp) {
            return back()->with('error', 'Enter Valid Date');
        }
        // if ($start_date_timestamp = $end_date_timestamp) {
        //     return back()->with('error', 'Enter Valid Date');
        // }

        $group->teacher_id = $request->teacher_id;
        $group->type = 'course';

        if ($request->fees_type == null) {
        } else {
            $group->fees_type = $request->fees_type;
        }

        if ($request->is_online == "on") {
            $group->is_online = 1;
            $group->lat = 0;
            $group->long = 0;
        } else {
            $group->lat = $request->group_lat;
            $group->long = $request->group_long;
            $group->address = $request->address;
            $group->city = $request->city;
            $group->venue = $request->city;
            $group->is_online = 0;
        }
        //
        if ($request->hasFile('zoom')) {

            $file_video = $request->zoom;
            $filename_video = $file_video->getClientOriginalName();

            $db_path_save_video = asset('/uploads/video/' . $filename_video);
            $group->url =  $db_path_save_video;
        } else if (strcmp($request->zoom_visible, "")  !== 0) {
            $embeded_url = $this->get_embeddedyoutube_url($request->zoom_visible);
            $group->url = $embeded_url;
        }


        //
        $group->save();

        if ($request->day) {

            $date = Carbon::now();
            $date_string = strtotime($date);
            // dd($date_string);
            foreach ($request->day as $key => $d) {
                $group_timings = new Group_Timings();
                $group_timings->course_id = $request->courses_id;
                $group_timings->group_id = $group->id;
                $group_timings->day = $d;
                // $group_timings->start_time = $this->time_to_timestamp_group($request->start_time[$key]);
                // $group_timings->end_time = $this->time_to_timestamp_group($request->end_time[$key]);
                $group_timings->start_time = strtotime($request->start_time[$key]);
                $group_timings->end_time = strtotime($request->end_time[$key]);
                // dd( $group_timings->start_time);
                if ($group_timings->start_time > $group_timings->end_time) {
                    return back()->with('error', 'Enter Valid Time');
                }
                $group_timings->save();
            }
        }
        if ($request->fees_type  ==  null) {

            $course_fees = Courses_Fees::where('course_id', $request->courses_id)->get();
            //   dd(    $course_fees);
            // if($course_fees->count() > 1){

            foreach ($course_fees as $c) {
                $group_fees = new Group_fees();
                $group_fees->group_id     = $group->id;
                $group_fees->course_id =  $group->courses_id;
                $group_fees->fees_type = $c->fees_type;
                $group_fees->amount =  $c->amount;
                $group_fees->due_date = $c->due_date;
                $group_fees->save();
            }
            // }

            // elseif ($course_fees->count() == 1) {
            //     $group_fees = new Group_fees();
            //     $group_fees->group_id     = $group->id;
            //     $group_fees->course_id =  $group->courses_id;
            //     $group_fees->fees_type = $course_fees->fees_type;
            //     $group_fees->amount =  $course_fees->amount;
            //     $group_fees->due_date = $course_fees->due_date;
            //     $group_fees->save();
            // }
        } else {

            if ($request->fees_type == 'installment') {
                foreach ($request->amount as $amnt_key => $am) {
                    $group_fees = new Group_fees();
                    $group_fees->group_id     = $group->id;
                    $group_fees->course_id =  $group->courses_id;
                    $group_fees->fees_type = $group->fees_type;
                    $group_fees->amount = $am;
                    $group_fees->due_date = strtotime($request->due_date[$amnt_key]);
                    $group_fees->save();
                }
            } elseif ($request->fees_type == 'complete') {
                $group_fees = new Group_fees();
                $group_fees->group_id     = $group->id;
                $group_fees->course_id =  $group->courses_id;
                $group_fees->fees_type = $group->fees_type;
                $group_fees->amount = $request->amount;
                $group_fees->due_date = strtotime($request->due_date);
                $group_fees->save();
            }
        }
        return redirect('admin/group');

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
        $group_users = Course_Register::where('group_id', $group_id)->pluck('user_id')->toArray();
        return view('admin.student_group_list.index', compact('student', 'group', 'group_users'));
    }

    public function student_group_checked(Request $request)
    {

        $res = new \stdClass();
        $student_id = $request->student_id;
        $group_id = $request->group_id;

        $group = Group::find($group_id);
        $group_users = Course_Register::where('group_id', $group_id)->pluck('user_id')->toArray();
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
    function group_latlong_save(Request $request)
    {
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
}
