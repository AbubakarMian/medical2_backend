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
       
        $user_id = $request->user_id;
        $user_permissions = User_Permission::with('user')->where('user_id',$user_id)->get();
        // 
        $role = Role::pluck('name','id');  
        $urls = Url::with('permission')->paginate(10); 
        // dd( $urls);
        // $urls_arr = array_column($urls, NULL, 'id');
        $permissions = Permission::with('url','role')->orderBy('created_at', 'ASC')->get();   
         // dd($urls_arr[$permissions[0]['url_id']],'permissions') ;  
        return view('admin.permissions.index', compact('permissions','user_permissions','role','urls','user_id'));
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
 
   $user_id = $request->user_id;
   
   $user_permissions = User_Permission::with('user')->where('user_id',$user_id)->get();
// dd( $user_permissions);
   foreach($user_permissions as $up){
       $up->role_id = $request->role_id;
        if(isset($request->view)){
            $up->can_view = in_array($up->url_id,$request->view) ? $up->url->view_name : 0;
        }
        else{
            $up->can_view = 0 ;
        }
        if(isset($request->create)){
            $up->can_create = in_array($up->url_id,$request->create) ? $up->url->create_name : 0;
           if($up->can_create){
            $up->can_view = $up->url->view_name;
           }
        }
        else{
            $up->can_create = 0 ;
        }
        if(isset($request->save)){
            $up->can_save = in_array($up->url_id,$request->save) ? $up->url->save_name : 0;
            if($up->can_save){
                $up->can_view = $up->url->view_name;
               }
        }
        else{
            $up->can_save = 0;
            
        }
        if(isset($request->edit)){
            $up->can_edit = in_array($up->url_id,$request->edit) ? $up->url->edit_name : 0;
            if($up->can_edit){
                $up->can_view = $up->url->view_name;
               }
        }
        else{
            $up->can_edit = 0 ;
            
        }
        if(isset($request->update)){
            $up->can_update = in_array($up->url_id,$request->update) ? $up->url->update_name : 0;
            if($up->can_update){
                $up->can_view = $up->url->view_name;
               }
        }
        else{
            $up->can_update = 0 ;
            
        }
        if(isset($request->delete)){
            $up->can_delete = in_array($up->url_id,$request->delete) ? $up->url->delete_name : 0;
            if($up->can_delete){
                $up->can_view = $up->url->view_name;
               }
        }
        else{
            $up->can_delete = 0 ;            
        }
        // dd($up->url_id,$request->view);
        // dd($up);
        $up->save();
   }
   return redirect('admin/dashboard');
//    dd('saved');

 }

}
    
   




