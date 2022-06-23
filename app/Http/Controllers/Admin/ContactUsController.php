<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use App\Model\Contact_us;

class ContactUsController extends Controller
{

    public function index(){

        $contact_us = Contact_us::orderby('created_at','desc')->paginate(10);

        return view('admin.contact.index',compact('contact_us'));
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
