<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Teacher;
use App\Model\Category;
use App\Model\Group;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Teacher;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teacher = Teacher::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.teacher.index', compact('teacher'));
    }

    public function create()
    {
        $control = 'create';
        $groups = Group::pluck('name','id');
        return view('admin.teacher.create', compact('control','groups'));
    }

    public function save(Request $request)
    {
        $teacher = new Teacher();
        $this->add_or_update($request, $teacher);

        return redirect('admin/teacher');
    }
    public function edit($id)
    {
        $control = 'edit';
        $teacher = Teacher::find($id);
        $groups = Group::pluck('name','id');
        return view('admin.teacher.create', compact(
            'control',
            'teacher',
             'groups'
        ));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $this->add_or_update($request, $teacher);
        return Redirect('admin/teacher');
    }


    public function add_or_update(Request $request, $teacher)
    {
        // dd($request->all());
        $date_timestamp =  strtotime($request->start_date);
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->address = $request->address;


        // if ($request->hasFile('image')) {
        //     $avatar = $request->image;
        //     $root = $request->root();
        //     $teacher->avatar = $this->move_img_get_path($avatar, $root, 'image');
        // }
        $teacher->save();
        return redirect()->back();
    }

    public function destroy_undestroy($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            Teacher::destroy($id);
            $new_value = 'Activate';
        } else {
            Teacher::withTrashed()->find($id)->restore();
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