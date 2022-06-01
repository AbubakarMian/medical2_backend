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
use App\Model\Category;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Courses;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $courses = Courses::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $control = 'create';
        $category = Category::pluck('name','id');
        return view('admin.courses.create', compact('control','category'));
    }

    public function save(Request $request)
    {
        $courses = new Courses();
        $this->add_or_update($request, $courses);

        return redirect('admin/courses');
    }
    public function edit($id)
    {
        $control = 'edit';
        $courses = Courses::find($id);
        $category = Category::pluck('name','id');
        return view('admin.courses.create', compact(
            'control',
            'courses',
            'category'
        ));
    }

    public function update(Request $request, $id)
    {
        $courses = Courses::find($id);
        $this->add_or_update($request, $courses);
        return Redirect('admin/courses');
    }


    public function add_or_update(Request $request, $courses)
    {
        // dd($request->all());
        $date_timestamp =  strtotime($request->start_date);
        $courses->full_name = $request->full_name;
        $courses->short_name = $request->short_name;
        $courses->category_id = $request->category_id;
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
