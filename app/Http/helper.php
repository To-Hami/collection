<?php

namespace App\Http;


if (!function_exists('aurl')) {

    function aurl($url = null)
    {
        return redirect('admin/' . $url);
    }
};



if (!function_exists('admin')) {

  function admin()
    {
        return auth()->guard('admin');
    }
}




