<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Url;
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
        // dd($request->all());
        
    //     foreach($request->url_id as $key => $u){
    //         $permission = new Permission();  
    //         $permission->url_id = $u;            //courses ya category ya book  ki permission deni hai...
    //         $permission->can_view = in_array($u, $request->permissions['view']);  
    //         $permission->can_create = in_array($u, $request->permissions['create']);  
    //         $permission->can_save = in_array($u, $request->permissions['save']);  
    //         $permission->can_edit = in_array($u, $request->permissions['edit']);  
    //         $permission->can_update = in_array($u, $request->permissions['update']);  
    //         $permission->can_delete = in_array($u, $request->permissions['delete']);  
    //         $permission->role_id = $request->role;                      //supervisor role
    //         $permission->save();  
    // }
  
    


    return redirect('admin/role');
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


