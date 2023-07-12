<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Url;
use App\Models\Admin_url;
use App\Models\Permission;
use App\Models\Admin_Url_Permission_Role;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class RoleController extends Controller
{

    public function index()
    {
        return view('admin.role.index');
    }
    public function get_role()
    {
        $role = Role::orderBy('created_at', 'DESC')->select('*')->get();
        $roleData['data'] = $role;
        echo json_encode($roleData);
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
        return redirect('admin/role');
   }

    public function edit($id)
    {
        $control = 'edit';
        $role = Role::find($id);
        $role_permissions = $role->admin_url_permissions;
        $all_permissions = Admin_url::orderby('section', 'asc')->get();
        $all_permissions = $this->get_permission_details($all_permissions,$role_permissions);

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


