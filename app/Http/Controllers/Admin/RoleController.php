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
        $role->save();
        
        foreach($request->url_id as $key => $u){
            $permission = new Permission();  
            $permission->url_id = $u;            //courses ya category ya book  ki permission deni hai...
            if(isset($request->permissions['view'])){
            $permission->can_view = in_array($u, $request->permissions['view']);  
             }
             else{
                $permission->can_view = 0;
             }
             if(isset($request->permissions['create'])){
            $permission->can_create = in_array($u, $request->permissions['create']);    
             }
             else{
                $permission->can_create = 0;
             }
             if(isset($request->permissions['save'])){
            $permission->can_save = in_array($u, $request->permissions['save']); 
             }
             else{
                $permission->can_save = 0;
             }
             if(isset($request->permissions['edit'])){ 
            $permission->can_edit = in_array($u, $request->permissions['edit']); 
             }
             else{
                $permission->can_edit = 0;
             }
             if(isset($request->permissions['update'])){
            $permission->can_update = in_array($u, $request->permissions['update']);  
             }
             else{
                $permission->can_update = 0;
             }
             if(isset($request->permissions['delete'])){
            $permission->can_delete = in_array($u, $request->permissions['delete']); 
             }  
             else{
                $permission->can_delete = 0;
             }
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


