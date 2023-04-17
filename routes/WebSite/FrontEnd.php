<?php

use Illuminate\Support\Facades\Route;

/*===========================================
	=          For Test         =
=============================================*/

Route::get('/Test', function () {
    return view('System.Pages.test');
});

Route::get('/Test-1', function () {
    return view('System.Pages.loginPage');
});

Route::get('/Test-2', function () {
    return view('System.Pages.Actors.Admin.addUser');
});

Route::get('/Test-4', function () {
    return view('System.Pages.Actors.Admin.viewUsers');
});

Route::get('/Test-5', function () {
    return view('System.Pages.Actors.comingSoon');
});

/*===========================================
	=          Real Route         =
=============================================*/

Route::get("/MyProfile" , function () {
    return view('System.Pages.Actors.profile');
});

Route::get('/RoleAdd', function () {
    return view('System.Pages.Actors.Admin.roleAdd');
});
