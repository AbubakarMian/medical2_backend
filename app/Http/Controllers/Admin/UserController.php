<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Courses;
use App\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Courses;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $name = $request->name ?? '';

        //$user = User::where('role_id','!=',1)->orderBy('created_at', 'DESC')->paginate(10);
        // dd($user);
        return view('admin.user.index');
    }


    public function getUsers($id = 0){


        $user = User::where('role_id',3)
            ->orderby('id','asc')->select('*')->get();
        $userData['data'] = $user;

        echo json_encode($userData);

    }


}
