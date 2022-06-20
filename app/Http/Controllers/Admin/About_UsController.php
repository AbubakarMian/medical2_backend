<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\About_us;
use App\Model\Category;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
// About_us;

class About_UsController extends Controller
{
    public function index(Request $request)
    {
        $about_us = About_us::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.about_us.index', compact('about_us'));
    }

    public function create()
    {
        $control = 'create';
        return view('admin.about_us.create', compact('control'));
    }

    public function save(Request $request)
    {
        $about_us = new About_us();
        $this->add_or_update($request, $about_us);

        return redirect('admin/aboutus');
    }
    public function edit($id)
    {
        $control = 'edit';
        $about_us = About_us::find($id);
        return view('admin.about_us.create', compact(
            'control',
            'about_us'
        ));
    }

    public function update(Request $request, $id)
    {
        $about_us = About_us::find($id);
        $this->add_or_update($request, $about_us);
        return Redirect('admin/aboutus');
    }


    public function add_or_update(Request $request, $about_us)
    {
        // dd($request->all());

        // $about_us->name = $request->name;
        $about_us->description = $request->description;

        $about_us->save();
        return redirect()->back();
    }

    public function destroy_undestroy($id)
    {
        $about_us = About_us::find($id);
        if ($about_us) {
            About_us::destroy($id);
            $new_value = 'Activate';
        } else {
            About_us::withTrashed()->find($id)->restore();
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
