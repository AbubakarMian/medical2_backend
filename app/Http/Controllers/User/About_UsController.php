<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\About_us;
use App\Model\Category;
use App\Model\Courses;
use App\Model\Contact_us;
use Illuminate\Http\Request;

class About_UsController extends Controller
{
    public function index()
    {

        $about_us  =  About_us::where('name','aboutus')->first();
        // dd($about_us);
        return view('user.about_us.index',compact('about_us'));
    }
    public function contactus()
    {


        // dd($about_us);
        return view('user.contactus.index');
    }

    public function contactform(Request $request)
    {


        $contact_us = new Contact_us();
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->subject = $request->subject;
        $contact_us->comment = $request->comment;
        $contact_us->phone_no = $request->phone_no;
        $contact_us->save();
        return redirect()->back()->with('success', 'Thank you for getting in touch!');

    }


}
