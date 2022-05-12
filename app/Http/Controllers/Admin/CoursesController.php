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
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Courses;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        // $name = $request->name ?? '';

        $courses = Courses::orderBy('created_at', 'DESC')->paginate(10);
        // dd($courses);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $control = 'create';

        // dd($course);
        return view('admin.courses.create', compact('control'));
    }

    public function save(Request $request)
    {
// dd($request->all());
        $courses = new Courses();

        $this->add_or_update($request, $courses);

        return redirect('admin/courses');

    }
    public function edit($id)
    {

        $control = 'edit';
        $courses = Courses::find($id);


        return view('admin.courses.create', compact(
            'control',
            'courses',


        ));
    }

    public function update(Request $request, $id)
    {
        $courses = Courses::find($id);
        // $courses = Courses::find($id);

        $this->add_or_update($request, $courses);
        return Redirect('admin/courses');
    }


    public function add_or_update(Request $request, $courses)
    {
        // dd($request->all());

        // $current_format_date =  $request->start_date->format('m/d/Y');    //24/02/22
        $date_timestamp =  strtotime($request->start_date);  //date



        $courses->full_name = $request->full_name;
        $courses->short_name = $request->short_name;

        $courses->fees = $request->fees;
        $courses->description = $request->description;
        $courses->start_date = $date_timestamp;


        if ($request->hasFile('image')) {
            $avatar = $request->image;
            $root = $request->root();
            $courses->avatar = $this->move_img_get_path($avatar, $root, 'image');
        }
        $courses->save();





        return redirect()->back();
    }

    public function destroy_undestroy($id)
    {

        $courses = Courses::find($id);
        if ($courses) {
            Courses::destroy($id);
            $new_value = 'Activate';
        } else {
            Courses::withTrashed()->find($id)->restore();
            $new_value = 'Delete';
        }
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => $new_value
        ]);
        return $response;
    }



}
