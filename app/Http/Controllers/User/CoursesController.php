<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function program()
    {
        $category = Category::pluck('name','id');
        return view('user.program',compact('category'));
    }

    public function courses()
    {
        $category = Category::pluck('name','id');
        return view('user.courses',compact('category'));
    }


    public function courses_details()
    {

        return view('user.courses_details');
    }
}
