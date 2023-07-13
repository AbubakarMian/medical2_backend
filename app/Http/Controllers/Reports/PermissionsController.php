<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Admin_url;
use App\Models\Permission;
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
