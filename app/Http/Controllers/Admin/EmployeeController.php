<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\Url;
use App\Models\User_Permission;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{

    public function index()
    {

        return view('admin.employee.index');
    }
    public function get_employee()
    {
        $employee = User::where('role_id',4) // role id for all employees is 4 and role id of teacher is 3
                    ->orderBy('created_at', 'DESC')->select('*')->get();
                    $employeeData['data'] = $employee;
        echo json_encode($employeeData);
    }

    public function create()
    {
        $control = 'create';
        return view('admin.employee.create', compact('control'));
    }

    public function save(Request $request)
    {
        $validator =  Validator::make(['email' => $request->email], [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')]
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        $user = new User();
        $user = $this->add_or_update($request, $user);
        return redirect('admin/permissions/show?user_id='.$user->id);
    }

    public function edit($id)
    {
        $control = 'edit';
        $employee = User::find($id);
        return view('admin.employee.create', compact(
            'control',
            'employee',
        ));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator =  Validator::make(['email' => $request->email], [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)]
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        $this->add_or_update($request, $user);
        return redirect('admin/permissions/show?user_id='.$user->id);
    }

    public function add_or_update($request, $user){
        $user->name =  $request->name;
        $user->last_name =  $request->name;
        $user->phone_no =  $request->phone_no;
        // permission for employee is 4 role permission id will be
        // signed in admin_url_permission_user its easy to identify more roles like teacher
        //and role id of teacher is 3
        $user->role_id =  4;
        $user->email =  $request->email;//.uniqid();
        if($request->password){
            $user->password =  Hash::make($request->password);
        }
        $user->save();
        return $user;
    }

    public function destroy_undestroy($id)
    {
        $user = User::find($id);
        if ($user) {
            User::destroy($id);
            $new_value = 'Activate';
        } else {
            User::withTrashed()->find($id)->restore();
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
