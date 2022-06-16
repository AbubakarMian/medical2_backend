<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $category = Category::pluck('name','id');
        return view('user.program',compact('category'));
    }


    public function courses_list()
    {
        return view('user.courses');
    }
}