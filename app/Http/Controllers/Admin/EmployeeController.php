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
        $employee = User::wherenotIn('role_id',[1,2])
                    ->orderBy('created_at', 'DESC')->paginate(10); // not super admin and student
        return view('admin.employee.index', compact('employee'));
    }

    public function create()
    {
        $control = 'create';
        return view('admin.employee.create', compact('control'));
    }

    public function save(Request $request)
    {
        $user = new User;
        $validator =  Validator::make(['email' => $request->email], [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)]
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        return redirect('admin/permissions/show?user_id=' . $user->id);
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
        return Redirect('admin/role');
    }

    public function add_or_update($request, $user){
        $user->name =  $request->name;
        $user->last_name =  $request->name;
        $user->email =  $request->email;
        $user->password =  Hash::make($request->password);
        $user->save();
    }



}
