<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Course_Register;
use App\Model\Category;
use App\Model\Courses;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Books;

class Course_RegisterController extends Controller
{

    public function index()
    {
     return view('admin.course_register.index');
    }
    public function get_course_register()
    {
        $course_register = Course_Register::with('course','user')->orderby('id', 'desc')->select('*')->get();
        $course_register_data['data'] = $course_register;
        echo json_encode($course_register_data);
    }



}
