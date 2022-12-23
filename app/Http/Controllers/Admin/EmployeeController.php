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
        $employee = User_Permission::orderBy('created_at', 'DESC')->paginate(10);
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
        $user->name =  $request->name;
        $user->last_name =  $request->name;
        $user->email =  $request->email;
        $user->password =  Hash::make($request->password);
       $user->save();

        // $urls = Url::get();
        // $permission = Permission::with('url','role')->get();

        // foreach ($urls as $u) {

        //     $user_permission = new User_Permission();
        //     $user_permission->user_id = $user->id;
        //     $user_permission->url_id =  $u->id;
        //     $user_permission->role_id =  0;
        //     $user_permission->can_view =  0;
        //     $user_permission->can_create = 0;
        //     $user_permission->can_save = 0;
        //     $user_permission->can_edit =  0;
        //     $user_permission->can_update = 0;
        //     $user_permission->can_delete =  0;
        //     //
        //     $user_permission->save();
        // }
        return redirect('admin/permissions/show?user_id=' . $user->id);
    }



    // public function edit($id)
    // {
    //     $control = 'edit';
    //     $courses = Role::find($id);
    //     $category = Role::pluck('name','id');
    //     // $fees_type = Role::get('constants.fees_type');
    //     return view('admin.role.create', compact(
    //         'control',
    //         'courses',
    //         'category',
    //     ));
    // }

    // public function update(Request $request, $id)
    // {
    //     $courses = Role::find($id);
    //     // $this->add_or_update($request, $courses);
    //     return Redirect('admin/role');
    // }



}
