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
use App\Model\Admin_url;
use App\Model\AdminUrlUserPermission;
use App\Model\Admin_Url_Permission_Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class PermissionsController extends Controller
{
    public $user_permission;

    public function show_list_permision(Request $request)
    {

        return $this->get_user_permission_list($request->user_id);
        // $user_permissions = User_Permission::with('user')->where('user_id',$user_id)->get();
        // //
        // $role = Role::pluck('name','id');
        // $urls = Url::with('permission')->paginate(10);
        // // dd( $urls);
        // // $urls_arr = array_column($urls, NULL, 'id');
        // $permissions = Permission::with('url','role')->orderBy('created_at', 'ASC')->get();
        //  // dd($urls_arr[$permissions[0]['url_id']],'permissions') ;
        // return view('admin.permissions.index', compact('permissions','user_permissions','role','urls','user_id'));
    }

    public function get_user_permission_list($user_id){
        // if($user_id){
            $user = User::find($user_id);
        // }
        // else{
        //     $user = new User();
        // }
        $all_permissions = Admin_url::orderby('section', 'asc')->get();
        $user_permissions = AdminUrlUserPermission::where('user_id',$user_id)->get();
        $role_template = Role::pluck('name','id');
        $permissions = $this->get_permission_details($all_permissions,$user_permissions);
        return view('admin.permissions.index', compact('permissions','user','role_template'));
    }

    // public function edit_user_permissions(Request $request,$user_id){
    //     return $this->get_user_permission_list($user_id);

    // }

    public function update(Request $request,$user_id){

        AdminUrlUserPermission::where('user_id',$user_id)->delete();
        $this->add_update($request,$user_id);
        return Redirect('admin/employee');

    }

    public function add_update($request,$user_id){
        foreach($request->permissions as $admin_url_id => $detail_ids){
            $admin_url = Admin_url::find($admin_url_id);
            $admin_url_user = new AdminUrlUserPermission();
            $admin_url_user->admin_url_id = $admin_url->id;
            $admin_url_user->heading = $admin_url->heading;
            // $admin_url_user->name = $admin_url->heading;
            $admin_url_user->section = $admin_url->section;
            $admin_url_user->role_id = $request->role_id;
            $admin_url_user->user_id = $user_id;

            $admin_url_details_json_decode = json_decode($admin_url->details);
            $details =[];

            // foreach($admin_url_details_json_decode as $admin_url_details_obj){
            //     if(!$admin_url_details_obj->need_permission){
            //         $details[] = $admin_url_details_obj;
            //     }
            // }

            foreach($detail_ids as $d_id){
                $key = array_search($d_id, array_column($admin_url_details_json_decode, 'id'));
                if($key!==false){
                    $details[] = $admin_url_details_json_decode[$key];
                }
            }
            $admin_url_user->details = json_encode($details);
            $admin_url_user->save();
        }
    }


    public function role_response(Request $request){

        // $permissions = Role::with('admin_url_permissions')->where('role_id',$request->role_id)->get();

        $permissions = Admin_Url_Permission_Role::where('role_id',$request->role_id)->get();

        $res = new \stdClass();
        $res->permissions =  $permissions;
        $res->status = true;

        return json_encode($res);

    }


}






