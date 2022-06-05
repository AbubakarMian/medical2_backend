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
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// Category;

class categoryController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        $control = 'create';
        return view('admin.category.create', compact('control'));
    }

    public function save(Request $request)
    {
        $category = new Category();
        $this->add_or_update($request, $category);

        return redirect('admin/category');
    }



    public function edit($id)
    {
        $control = 'edit';
        $category = Category::find($id);
        return view('admin.category.create', compact(
            'control',
            'category',
        ));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->add_or_update($request, $category);
        return Redirect('admin/category');
    }


    public function add_or_update(Request $request, $category)
    {

        $category->name = $request->name;
        $category->description = $request->description;




        $category->save();
        return redirect()->back();
    }

    public function destroy_undestroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            Category::destroy($id);
            $new_value = 'Activate';
        } else {
            Category::withTrashed()->find($id)->restore();
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
