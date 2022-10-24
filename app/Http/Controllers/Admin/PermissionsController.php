<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;
use App\Model\Permission;
use App\Model\User_Permission;
use App\Model\Category;
use App\Model\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class PermissionsController extends Controller
{

    public function show_list_permision(Request $request)
    {
        // dd($request->all());
        $user_permission = User_Permission::with('user')->find($request->user_permission_id);
        // dd($user_permission);
        $permissions = Permission::with('url')->orderBy('created_at', 'ASC')->paginate(10);   
        // dd('permissions') ;  
        return view('admin.permissions.index', compact('permissions','user_permission'));
    }
    
   


}


