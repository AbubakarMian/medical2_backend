<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Books;
use App\Model\Books_courses;
use App\Model\Category;
use App\Model\Courses;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Books;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $books = Books::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $control = 'create';
        $courses = Courses::pluck('full_name','id');
        $category = Category::pluck('name','id');
        return view('admin.books.create', compact('control','courses','category'));
    }

    public function save(Request $request)
    {
        $books = new Books();
        $this->add_or_update($request, $books);

        return redirect('admin/books');
    }
    public function edit($id)
    {
        $control = 'edit';
        $books = Books::find($id);
        $courses = Courses::pluck('full_name','id');
        $category = Category::pluck('name','id');
        return view('admin.books.create', compact(
            'control',
            'books',
            'courses',
            'category'
        ));
    }

    public function update(Request $request, $id)
    {
        $books = Books::find($id);
        // Books_courses::delete()
        $this->add_or_update($request, $books);
        return Redirect('admin/books');
    }


    public function add_or_update(Request $request, $books)
    {
        // dd($request->all());
        $books->name = $request->name;
        $books->description = $request->description;
        $books->save();

        foreach($request->courses_id as $c){
            $books_courses = new Books_courses();
            $books_courses->book_id = $books->id;
            $books_courses->course_id = $c;
            $books_courses->save();

        }


        if ($request->hasFile('image')) {
            $avatar = $request->image;
            $root = $request->root();
            $books->avatar = $this->move_img_get_path($avatar, $root, 'image');
        }
     
        return redirect()->back();
    }

    public function destroy_undestroy($id)
    {
        $books = Books::find($id);
        if ($books) {
            Books::destroy($id);
            $new_value = 'Activate';
        } else {
            Books::withTrashed()->find($id)->restore();
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
