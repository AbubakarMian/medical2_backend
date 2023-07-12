<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use App\Models\Contact_us;

class ContactUsController extends Controller
{

    public function index(){


        return view('admin.contact.index');
    }
    public function get_contactus(){

        $contact_us = Contact_us::orderby('created_at','desc')->select('*')->get();
        $contact_usData['data'] = $contact_us;
        echo json_encode($contact_usData);
    }

    // public function full_desc($id){

    //     $contact = ContactUs::find($id);
    //     $response = Response::json([
    //         "status"=>true,
    //         "msg"=>$contact->message
    //     ]);
    //     return $response;
    // }



}
