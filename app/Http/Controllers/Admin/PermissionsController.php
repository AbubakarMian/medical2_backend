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
    public $user_permission;

    public function show_list_permision(Request $request)
    {
        // dd($request->all());
        $user_permission = User_Permission::with('user')->find($request->user_permission_id);
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
        $permissions = Permission::with('url','role')->orderBy('created_at', 'ASC')->where('role_id',$request->role_id)->get();

         $res->permissions =  $permissions; 
         $res->status = true; 
         
        return json_encode($res);

    }

    public function permisiion_save(Request $request){

//  dd($request->all());

$user_permission = User_Permission::with('user')->find($request->user_permission_id);
$user_id = $user_permission->user->id;

$user_permissions = User_Permission::with('user')->where('user_id',$user_id)->get();
dd($user_permissions[1]);

foreach($user_permissions  as $key => $user){
    
  
$user_permission = User_Permission::with('user')->find($request->user_permission_id);
// dd($user_permissions);

  $user->role_id = $request->role_id;
//   $user_permission->url_id = $key;
//   

//   
//   $user_permission->can_view = in_array($u_id, $request->view_checked);  
//   $user_permission->can_create = $request->role_id;
//   $user_permission->can_save = $request->role_id;
//   $user_permission->can_edit = $request->role_id;
//   $user_permission->can_update = $request->role_id;
//   $user_permission->can_delete = $request->role_id;
$user->save(); 




 }

}
    
   


}


