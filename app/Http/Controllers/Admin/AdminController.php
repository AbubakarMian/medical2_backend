<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Product;
use app\User;




class AdminController extends Controller
{
    function index()
    {
        return view('login.login');
    }


    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password'),
            'role_id' => 1
        );

        if(Auth::attempt($user_data))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }



    function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }


    function dashboard (){

        $admin_common = new \stdClass();
        $admin_dashboard = $this->admin_dashboard();

        $modules = $admin_dashboard['modules'];
        // $reports = $admin_dashboard['reports'];
        $admin_common->id = '1';
        $admin_common->modules = $modules;
        // $admin_common->reports = $reports;
        $admin_common->name = 'Admin';

        $chart = $admin_dashboard['chart'];

        session(['admin_common' => $admin_common]);
        return view('layouts.default_dashboard',compact(
            'chart'));
    }
    public function admin_dashboard()
    {


        $modules[] = [

            'url' => 'admin/users',
            'title' => 'Users ',

        ];
        $modules[] = [

            'url' => 'admin/courses',
            'title' => 'Courses',

        ];


        $modules[] = [

            'url' => 'admin/question',
            'title' => 'Question ',

        ];
        $modules[]= [

            'url'=>'admin/quiz',
            'title'=>'Exams'

        ];
        $modules[]= [

            'url'=>'admin/settings',
            'title'=>'Settings'

        ];
        $modules[]= [

            'url'=>'admin/category',
            'title'=>'Category'
        ];
        $modules[]= [

            'url'=>'admin/books',
            'title'=>'Books'
        ];

        // $modules[] = [

        //     'url' => 'admin/product/promotion',
        //     'title' => 'Promotion ',

        // ];












        // $reports[] = [
        //     'url' => 'admin/reports/orders',
        //     'title' => 'Orders',
        // ];



        $myvar = [];
        $myvar['modules'] = $modules;
        // $myvar['reports'] = $reports ;
        $myvar['chart'] = [];

        return $myvar;
    }


    /////////////////////

    // public function home()
    // {
    //     # code...
    //     return View('users.home.home');
    // }

    // public function faq()
    // {
    //     # code...
    //     return View('users.faq.faq');
    // }

//     public Function contact()
//     {
//         return View('users.contact.contact');
// }

// public Function cart()
//     {
//         return View('users.cart.cart');
//     }

    // public Function customization()
    // {
    //     return View('users.customization.customization');
    // }


    // public Function about()
    // {
    //     return View('users.about.about');
    // }


    // public Function payment()
    // {
    //     return View('users.paymentinfo.payment');
    // }

    // public Function product()
    // {
    //     return View('users.productdetails.product');
    //         //  dd('ddddc');
    // }



    // public Function shop()
    // {
    //     return View('users.shop.shop');
    // }






// public function map(){

//     return view('layouts.map');

// }







    }
