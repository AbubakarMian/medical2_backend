<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Models\Books;
use App\Models\Books_courses;
use App\Models\Category;
use App\Models\Courses;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Books;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.books.index');
    }

    public function get_books(Request $request)
    {
        $books = Books::orderBy('created_at', 'DESC')->select('*')->get();
        $booksData['data'] = $books;
        echo json_encode($booksData);
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
        if($request->hasFile('upload_book')){

            $file =$request->upload_book;
            $filename = $file->getClientOriginalName();

            $path = public_path().'/uploads/';
            $u  =  $file->move($path, $filename);

            $db_path_save_book = asset('/uploads/'.$filename);
            $books->upload_book =  $db_path_save_book;
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $root = $request->root();
            $books->avatar = $this->move_img_get_path($avatar, $root, 'image');
        }
        $books->save();

        // $books_courses


        foreach($request->courses_id as $c){
            $books_courses = new Books_courses();
            $books_courses->book_id = $books->id;
            $books_courses->course_id = $c;
            $books_courses->save();
        }
        //  $books_courses


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
