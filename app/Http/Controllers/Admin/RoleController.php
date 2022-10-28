<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Url;
use App\Model\Permission;
use App\Model\Category;
use App\Model\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class RoleController extends Controller
{

    public function index()
    {
        $role = Role::orderBy('created_at', 'DESC')->paginate(10);        
        return view('admin.role.index', compact('role'));
    }
    
    public function create()
    {       
        $control = 'create';
        $urls = Url::get();
        // dd($urls);
        return view('admin.role.create',compact('control','urls'));
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $role = new Role();
        $role->name = $request->role;
        $role->save;
        
        foreach($request->url_id as $key => $u){
            $permission = new Permission();  
            $permission->url_id = $u;            //courses ya category ya book  ki permission deni hai...
            $permission->can_view = in_array($u, $request->permissions['view']);  
            $permission->can_create = in_array($u, $request->permissions['create']);  
            $permission->can_save = in_array($u, $request->permissions['save']);  
            $permission->can_edit = in_array($u, $request->permissions['edit']);  
            $permission->can_update = in_array($u, $request->permissions['update']);  
            $permission->can_delete = in_array($u, $request->permissions['delete']);  
            $permission->role_id = $role->id;                      //supervisor role id
            $permission->save();  
    }
  

    return redirect('admin/role');
   }



    // public function edit($id)
    // {
    //     $control = 'edit';
    //     $role = Role::find($id);
    //     return view('admin.role.create', compact(
    //         'control',
    //         'role',            
    //     ));
    // }

    // public function update(Request $request, $id)
    // {
    //     $courses = Role::find($id);
    //     // $this->add_or_update($request, $courses);
    //     return Redirect('admin/role');
    // }



}


