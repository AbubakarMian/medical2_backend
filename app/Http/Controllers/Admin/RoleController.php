<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Url;
use App\Model\Admin_url;
use App\Model\Permission;
use App\Model\Admin_Url_Permission_Role;
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
        $permissions = Admin_url::orderby('section', 'asc')->get();
        $role = new Role();
        // dd($permissions);
        // return view('admin.permissions.index',compact('permissions'));

        return view('admin.role.create',compact('control','permissions','role'));
    }

    public function save(Request $request)
    {
        $role = new Role();
        $this->add_update($role,$request);


    dd('saved');
    return redirect('admin/role');
   }



    public function edit($id)
    {
        $control = 'edit';
        $role = Role::find($id);
        $role_permissions = $role->admin_url_permissions;
        $all_permissions = Admin_url::orderby('section', 'asc')->get();
        $all_permissions = $all_permissions->transform(function($all_p)use($role_permissions){
            $per = $role_permissions->where('admin_url_id',$all_p->id)->first();
            if($per){
                $all_p->permission_granted = true;
                $per_details = collect(json_decode($per->details));
                $all_p_details = collect( json_decode($all_p->details));

                $all_p_details = $all_p_details->transform(function($all_p_detail)use($per){
                    $per_details = collect(json_decode($per->details));
                    $p_detail = $per_details->where('id',$all_p_detail->id)->first();
                    if($p_detail){
                        $all_p_detail->permission_granted = true;
                    }
                    else{
                        $all_p_detail->permission_granted = false;
                    }
                    return $all_p_detail;
                });
                $all_p_details = json_encode($all_p_details->toArray());
                $all_p->details = $all_p_details;
                return $all_p;
            }
            else{
                $all_p->permission_granted = false;
            }
            return $all_p;

        });
        $permissions = $all_permissions;

        return view('admin.role.create', compact(
            'permissions',
            'control',
            'role',
        ));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        Admin_Url_Permission_Role::where('role_id',$role->id)->delete();
        $this->add_update($role,$request);
        return Redirect('admin/role');
    }

    public function add_update($role,$request){
        $role->name = $request->role;
        $role->save();
        foreach($request->permissions as $admin_url_id => $detail_ids){
            $admin_url = Admin_url::find($admin_url_id);
            $admin_url_role = new Admin_Url_Permission_Role();
            $admin_url_role->admin_url_id = $admin_url->id;
            $admin_url_role->heading = $admin_url->heading;
            $admin_url_role->name = $admin_url->heading;
            $admin_url_role->section = $admin_url->section;
            $admin_url_role->role_id = $role->id;

            $admin_url_details_json_decode = json_decode($admin_url->details);
            $details =[];

            foreach($detail_ids as $d_id){
                $key = array_search($d_id, array_column($admin_url_details_json_decode, 'id'));
                if($key!==false){
                    $details[] = $admin_url_details_json_decode[$key];
                }
            }
            $admin_url_role->details = json_encode($details);
            $admin_url_role->save();
        }
    }



}


