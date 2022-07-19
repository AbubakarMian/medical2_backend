<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Category;
use App\Model\Courses;
use App\Model\Teacher;
use App\Model\Group;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Group;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $workshop = Group::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.workshop.index', compact('workshop'));
    }

    public function create()
    {
        $control = 'create';
        $course_id = Courses::pluck('full_name', 'id');
        $teacher = Teacher::pluck('name', 'id');
        return view('admin.workshop.create', compact('control', 'course_id','teacher'));
    }

    public function save(Request $request)
    {
        $workshop = new Group();
        $this->add_or_update($request, $workshop);

        return redirect('admin/workshop');
    }
    public function edit($id)
    {
        $control = 'edit';
        $workshop = Group::find($id);
        $course_id = Courses::pluck('full_name', 'id');
        $teacher = Teacher::pluck('name', 'id');
      
      
        return view('admin.workshop.create', compact(
            'control',
            'workshop',
            'course_id',
            'teacher',
        ));
    }

    public function update(Request $request, $id)
    {
        $workshop = Group::find($id);
        $this->add_or_update($request, $workshop);
        return Redirect('admin/workshop');
    }


    public function add_or_update(Request $request, $workshop)
    {
        // dd($request->all());
        $date_timestamp =  strtotime($request->start_date);
        $workshop->name = $request->name;
        $workshop->gender = $request->gender;
        $workshop->email = $request->email;
        $workshop->address = $request->address;


        $workshop->save();
        return redirect()->back();
    }

    public function destroy_undestroy($id)
    {
        $workshop = Group::find($id);
        if ($workshop) {
            Group::destroy($id);
            $new_value = 'Activate';
        } else {
            Group::withTrashed()->find($id)->restore();
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
