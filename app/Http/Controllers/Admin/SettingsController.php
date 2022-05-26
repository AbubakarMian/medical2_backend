<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Pages_Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class SettingsController extends Controller
{


    public function index()
    {

        $pages_images = Pages_Images::orderBy('created_at', 'DESC')->paginate(10);
        // $pages_images = Pages_Images::get();
        // dd($pages_images);
        return view('admin.settings.index', compact('pages_images'));

    }
    public function edit($id)
    {
        $control = 'edit';
        $pages_images = Pages_Images::find($id);

        return view('admin.settings.create', compact(
            'pages_images',
            'control',

        ));

    }
    public function update(Request $request,$id)
    {
        dd($request->all());

        $pages_images = Pages_Images::find($id);

       if ($request->hasFile('image')) {
            $avatar = $request->image;
            $root = $request->root();
            $image = $this->move_img_get_path($avatar, $root, 'image');
            $url = json_encode($image);
            $pages_images->image = $url;
        }
        $pages_images->save();
        $response = Response::json([
            "status" => true,
            'pages_images' => $url,
        ]);
        return $response;


    }






}
