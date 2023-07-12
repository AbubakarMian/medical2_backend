<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages_Images;
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
    public function upload_cropped_image(Request $request)
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

    public function update(Request $request,$id)
    {
        $pages_images = Pages_Images::find($id);
        $pages_images->image = $request->image;
        $pages_images->save();

        return response()->json(['success'=>'Crop Image Uploaded Successfully','image'=>$pages_images]);
    }


}


    // dd($request->image);

    // $pages_images = Pages_Images::find($id);

    // if ($request->hasFile('image')) {
    //      // $avatar = $request->image;
    //      // $root = $request->root();
    //      // $image = $this->move_img_get_path($avatar, $root, 'image');
    //      $url = json_encode($request->image);
    //      $pages_images->image = $url;
    //  }
    //  $pages_images->save();
    //  $response = Response::json([
    //      "status" => true,
    //      'pages_images' => $pages_images->image ,
    //  ]);
    //  return $response;






