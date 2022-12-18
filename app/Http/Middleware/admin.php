<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{

    public function handle(Request $request, Closure $next = null ,$guard = 'admin')
    {


        if (Auth::guard($guard)->check()) {
            return $next($request);
//            return redirect(RouteServiceProvider::HOME);
        }else{
            return redirect('admin/login');
        }



    }
}
