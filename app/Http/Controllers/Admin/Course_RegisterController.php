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
    public function index(Request $request)
    {
        $course_register = Course_Register::with('course')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.course_register.index', compact('course_register'));
    }

   
 
}
