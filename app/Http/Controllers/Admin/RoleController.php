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
        dd($request->all());
        
        foreach($request->url_id as $key => $u){
            $permission = new Permission();  
            $permission->url_id = $u;            //courses ya category ya book ...this is url 
            $permission->can_view = $request->view[$key];  
            $permission->role_id = $request->role;                      //supervisor role
            $permission->save();    
    

        
    }
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


