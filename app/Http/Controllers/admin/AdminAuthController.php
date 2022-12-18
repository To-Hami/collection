<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function App\Http\aurl;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function submit(){

       if(auth()->guard('admin')
       ->attempt(['email' => \request('email') , 'password' => \request('password')])){

//           return view('admin.home');

           return aurl('home');

       }else{
//           return 'error in login';
           return redirect()->back();

       }
    }


    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }


}
