<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses_list  =  Courses::get();
        $courses_list_count =  $courses_list->count();
        if($courses_list_count  == 1){
        $courses_split = $courses_list->split($courses_list_count / 1);

        }
        elseif($courses_list_count  == 2){
        $courses_split = $courses_list->split($courses_list_count / 2);
        }
        elseif($courses_list_count  == 3){
        $courses_split = $courses_list->split($courses_list_count / 3);
        }
        else{
        $courses_split = $courses_list->split($courses_list_count / 4);
        }



        // dd($courses_split);
        $category_arr = Category::pluck('name','id');
        return view('user.courses.index',compact('courses_split','category_arr'));
    }



    public function courses_details(Request $request)
    {
        // dd($request->all());
        $courses_id = $request->courses_id;
        $courses  =  Courses::find($courses_id);
        return view('user.courses_details.index',compact('courses'));
    }
}
