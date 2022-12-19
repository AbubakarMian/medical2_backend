<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Model\Admin_url;
use App\Model\Permission;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;


// STUEDENT PLAN

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        // $permissions = Permission::with('role')->orderby('created_at', 'desc')->select('*')->get();
        $permissions = Admin_url::orderby('section', 'asc')->get();
        // dd($permissions);
        return view('admin.permissions.index',compact('permissions'));

    }

}
