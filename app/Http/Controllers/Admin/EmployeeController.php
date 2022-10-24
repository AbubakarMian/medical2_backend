<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;
use App\Model\Permission;
use App\Model\User_Permission;
use App\Model\Category;
use App\Model\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

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
      
        return view('admin.employee.create',compact('control'));
    }

    public function save(Request $request)
    {
       
    $user = new User;
    $user->name = $request->name;
    $user->email =  $request->email;
    $user->save();
     $user_permission = New User_Permission();
     $user_permission->user_id = $user->id;
     $user_permission->save();

    return redirect('admin/permissions/show?user_permission_id='.$user_permission->id);
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


