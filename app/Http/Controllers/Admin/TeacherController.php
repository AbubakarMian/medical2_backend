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
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Facades\Validator;

// Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        ///role id of teacher is 4
        return view('admin.teacher.index');
    }
    public function get_teacher(Request $request)
    {
        $teacher = Teacher::orderBy('created_at', 'DESC')->select('*')->get();
        $teacherData['data'] = $teacher;
        echo json_encode($teacherData);

    }

    public function create()
    {
        $control = 'create';
        $groups = Group::pluck('name','id');
        return view('admin.teacher.create', compact('control','groups'));
    }

    public function save(Request $request)
    {

        $validator =  Validator::make(['email' => $request->email], [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')]
        ]);

        if ($validator->fails()) {
            dd( $validator);
            return back()->with('error', $validator->errors());
        }
        $teacher = new Teacher();
        $user = new User();
        $this->add_or_update($request, $teacher,$user);

        return redirect('admin/teacher');
    }
    public function edit($id)
    {
        $control = 'edit';
        $teacher = Teacher::find($id);
        $users = User::find($id);
        $groups = Group::pluck('name','id');
        return view('admin.teacher.create', compact(
            'control',
            'teacher',
             'groups',
             'users'
        ));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $user = $teacher->user;
        // dd($user);
        $validator =  Validator::make(['email' => $request->email], [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)]
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        $teacher = Teacher::find($id);
        $user = $teacher->user;
        $this->add_or_update($request, $teacher,$user);
        return Redirect('admin/teacher');
    }


    public function add_or_update(Request $request, $teacher,$user)
    {
        // dd($request->all());
        // if ($request->hasFile('image')) {
        //     $avatar = $request->image;
        //     $root = $request->root();
        //     $teacher->avatar = $this->move_img_get_path($avatar, $root, 'image');
        // }

        $user->name = $request->name;
        $user->role_id = 3;
        // $user->gender = $request->gender;
        $user->email = $request->email;
        $user->adderss = $request->address;
        $user->phone_no = $request->phone_no;
        if($request->password){
            $user->password =  Hash::make($request->password);
        }
        $user->save();

        $teacher->users_id = $user->id;
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->save();
        return redirect()->back();
    }
///role id of teacher is 4
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
