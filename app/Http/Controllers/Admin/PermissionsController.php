<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;
use App\Model\Permission;
use App\Model\User_Permission;
use App\Model\Category;
use App\Model\Courses;
use App\Model\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class PermissionsController extends Controller
{

    public function show_list_permision(Request $request)
    {
        // dd($request->all());
        $user_permission = User_Permission::where('user_id',$request->user_permission_id)->get();
        // 
         $role = Role::pluck('name','id');  
        $urls = Url::with('permission')->paginate(10);
        // dd( $urls);
        // $urls_arr = array_column($urls, NULL, 'id');
     
        $permissions = Permission::with('url','role')->orderBy('created_at', 'ASC')->paginate(10);   
 
      
        // dd($urls_arr[$permissions[0]['url_id']],'permissions') ;  
        return view('admin.permissions.index', compact('permissions','user_permission','role','urls'));
    }

    public function role_response(Request $request){

        $res = new \stdClass();
        $permissions = Permission::with('url','role')->where('role_id',$request->role_id)->get();

         $res->permissions =  $permissions; 
         $res->status = true; 
         
        return json_encode($res);

    }
    
   


}


