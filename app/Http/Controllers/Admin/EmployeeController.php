<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;
use App\Model\Permission;
use App\Model\Url;
use App\Model\User_Permission;
use App\Model\Category;
use App\Model\Courses;
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
        $employee = User::where('role_id',3) // role id for all employees is 3 and role id of teacher is 4
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
        $validator =  Validator::make(['email' => $request->email], [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)]
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        $user = User::find($id);
        $this->add_or_update($request, $user);
        return redirect('admin/permissions/show?user_id='.$user->id);
    }

    public function add_or_update($request, $user){
        $user->name =  $request->name;
        $user->last_name =  $request->name;
        // permission for employee is 3 role permission id will be
        // signed in admin_url_permission_user its easy to identify more roles like teacher
        //and role id of teacher is 4
        $user->role_id =  3;
        $user->email =  $request->email;//.uniqid();
        $user->password =  Hash::make($request->password);
        $user->save();
        return $user;
    }



}
