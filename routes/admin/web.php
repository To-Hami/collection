<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\UserController;
use \App\Http\Controllers\admin\HomeController;
use \App\Http\Controllers\admin\AdminAuthController;



Route::group(['prefix' => 'admin', 'name' => 'admin.'], function () {
    \Illuminate\Support\Facades\Config::set('auth.defines', 'admin');

    //auth
    Route::get('login',[AdminAuthController::class , 'login'])->name('login');
    Route::post('login',[AdminAuthController::class , 'submit'])->name('loginsubmit');

    //home
    Route::group(['middleware' => 'admin:admin'], function () {

        Route::post('/logout',[AdminAuthController::class , 'logout'])->name('logout');


        Route::get('home', function (){
            return 'admin home';
        });

        Route::get('home', [HomeController::class ,'index'])->name('home');
        Route::resource('users', UserController::class);

    });
});

