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
use App\Model\Courses_Fees;
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
        $fees_type = Config::get('constants.fees_type');
        return view('admin.courses.create', compact('control','category','fees_type'));
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
        $fees_type = Config::get('constants.fees_type');
        return view('admin.courses.create', compact(
            'control',
            'courses',
            'category',
            'fees_type'
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
        $courses->examination_fees = $request->examination_fees;
        $courses->description = $request->description;
        $courses->start_date = $date_timestamp;
        if($request->one_time_payment == 'on'){
            $courses->one_time_examination_payment =1;
         }
         else{
            $courses->one_time_examination_payment =0;
         }
         if($request->fees_type == 'installment'){
            $courses->fees_type = $request->fees_type;
         }
         else{
            $courses->fees_type = $request->fees_type;
         }
         if ($request->cropped_image) {
            $courses->avatar = $request->cropped_image;
        }
        $courses->save();

        // new Courses_Fees table 
        if ($request->amount & $request->due_date != null ) {
        if($request->fees_type == 'installment'){

         foreach($request->amount as $amnt_key =>$am){
          $course_fees = new Courses_Fees();
          $course_fees->course_id = $courses->id;
          $course_fees->fees_type = $courses->fees_type;
          $course_fees->amount = $am;
          $course_fees->due_date = strtotime($request->due_date[$amnt_key]);
          $course_fees->save();

         }
        }
        elseif($request->fees_type == 'complete'){
            $course_fees = new Courses_Fees();
            $course_fees->course_id = $courses->id;
            $course_fees->fees_type = $courses->fees_type;
            $course_fees->amount = $request->amount;
            $course_fees->due_date =  strtotime($request->due_date);
            $course_fees->save();
       
        }
        }
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
     public function crop_image(Request $request)
    {
        $folderPath = public_path('images/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        $su = file_put_contents($imageFullPath, $image_base64);
        $image_path = asset('/images/' .$imageName);
        return response()->json(['success'=>'Crop Image Uploaded Successfully','image'=>$image_path]);
    }
}
