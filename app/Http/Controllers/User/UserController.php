<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $route_name = \Request::route()->getName();
        // dd( $route_name);
        // dd($route_name);
        return view('user.index');
    }

    public function registration()
    {
        return view('user.registrationform');
    }

    public function courses_registration()
    {
        return view('user.courses_registration');
    }
    public function save(Request $request)
    {
        // dd('assa');

        $users = new User();
        return $this->add_or_update($request, $users);
    }

    public function add_or_update(Request $request, $users)
    {
        // dd($request->all());
        $validator =  Validator::make(['email' => $request->email], [
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($users->id)]
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        // dd('asdasd');
        // dd($request->all());
        $users->name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->phone_no = $request->contact;
        $users->adderss = $request->address;
        $users->city = $request->city;
        $users->zip_code = $request->zip_code;
        // 
        // $users->state = $request->state;
        // 
        $users->education = $request->education;
        $users->collage_name = $request->collage_name;
        $users->computer_experience = $request->computer_experience;
        $users->work_experience = $request->work_experience;
        $users->expectations = $request->expectations;
        $users->certification = $request->certification;
        $users->password = Hash::make($request->password);
        $users->role_id = 2;
        $users->save();
        Auth::login($users);
        return redirect('/')->with('success', 'ThankYou  ' .  $users->name . ' ! You are successfully Register');
    }


    public function user_login(Request $request)
    {
        //   dd($request->all());

        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);
        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password'),
            'role_id' => 2
        );

        if (Auth::attempt($user_data)) {
            return redirect('/')->with('success', 'ThankYou ! You are successfully logged in');
        } else {
            return redirect()->back()->with('login_error', 'Wrong Login Details');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'ThankYou ! You are successfully logOut');
    }
}
