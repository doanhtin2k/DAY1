<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        // neu ton tai session co key la user name roi thi chuyen huong sang trang demo
        if(session()->has('username'))
        {
            return redirect()->route("demo");
        }
        return view('login');
    }
    public function login(Request $request)
    {
        if(session()->has('username'))
        {
            return redirect()->route("demo");
        }
        if($request->username=="doanhad" && $request->password=="123456")
        {
            
            // echo $request->username;
            // echo $request->password;
            session(['username'=>$request->username]);
            return redirect()->route("demo");
        }else{
            return view('login');
        }
    }
    public function logout()
    {
        session()->forget("username");
        return redirect()->route("viewLogin");
    }
}
