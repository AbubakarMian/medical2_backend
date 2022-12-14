<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Student_fees;
use App\Model\Books_courses;
use App\Model\Category;
use App\Model\Courses;
use App\Model\Group_users;
use App\Model\Group;
use App\Model\Group_fees;
use App\Model\Course_Register;
use App\Model\Permission;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;


// STUEDENT PLAN

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::with('role')->orderby('created_at', 'desc')->select('*')->get();
        return view('admin.permissions.index',compact('permissions'));

    }

}
