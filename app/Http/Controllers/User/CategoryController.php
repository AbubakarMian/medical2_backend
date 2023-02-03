<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Courses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->category_name ?? '';

        $category_split = Category::where('name', 'like', '%' . $name . '%')->get()->toArray();
        $category_count = count($category_split);
        if ($category_count > 3) {
            $category_split = array_chunk($category_split , 4);
        }
        else{
            // dd('asdasd');
            $arr[] = $category_split;
            // dd($arr);
            $category_split = $arr ;
        }
        // dd($category_split);
        // elseif ($category_count == 2) {
        //     $category_split = $category_list->split($category_count / 2);
        // } elseif ($category_count == 3) {
        //     $category_split = $category_list->split($category_count / 3);
        // } else {
        //     $category_split = $category_list->split($category_count / 4);
        // }
        // $category_arr = Category::pluck('name', 'id');
        // $category_split = $category_split->toArray();
        return view('user.category.index', compact('category_split', 'name', ));
    }

    public function category_courses(Request $request)
    {
        // dd($request->all());
        $types = $request->type;
        $category_id = $request->category_id;
        $courses_list = Courses::where('category_id', $category_id)->get();

        if ($courses_list->count() > 0) {
            if ($courses_list->count() == 1) {
                $courses_list_count = $courses_list->count();
                $courses_split = $courses_list->split($courses_list_count / 1);
            } elseif ($courses_list->count() == 2) {
                $courses_list_count = $courses_list->count();
                $courses_split = $courses_list->split($courses_list_count / 2);
            } elseif ($courses_list->count() == 3) {
                $courses_list_count = $courses_list->count();
                $courses_split = $courses_list->split($courses_list_count / 3);
            } else {
                $courses_list_count = $courses_list->count();
                $courses_split = $courses_list->split($courses_list_count / 4);
            }
        } else {
            $courses_list = Courses::get();
            $courses_list_count = $courses_list->count();
            $courses_split = $courses_list->split($courses_list_count / 4);
        }
        $category_arr = Category::pluck('name', 'id');
        return view('user.courses.index', compact('courses_split', 'category_arr','types'));
    }

}
