<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Url;
use App\Model\Admin_url;
use App\Model\Permission;
use App\Model\Admin_Url_Role;
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
        // dd($permissions);
        // return view('admin.permissions.index',compact('permissions'));

        return view('admin.role.create',compact('control','permissions'));
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $role = new Role();
        $role->name = $request->role;
        $role->save();

        foreach($request->permissions as $admin_url_id => $detail_ids){
            $admin_url = Admin_url::find($admin_url_id);
            $admin_url_role = new Admin_Url_Role();
            $admin_url_role->heading = $admin_url->heading;
            $admin_url_role->name = $admin_url->heading;
            $admin_url_role->section = $admin_url->section;
            $admin_url_role->role_id = $role->id;

            $admin_url_details_json_decode = json_decode($admin_url->details);
            $details =[];

            foreach($detail_ids as $d_id){
                $key = array_search($d_id, array_column($admin_url_details_json_decode, 'id'));
                $details[] = $admin_url_details_json_decode[$key];
            }
            $admin_url_role->details = json_encode($details);
            $admin_url_role->save();

    }

// dd('saved');
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


