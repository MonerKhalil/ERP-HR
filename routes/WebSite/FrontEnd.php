<?php

use Illuminate\Support\Facades\Route;

/*===========================================
	=          For Test         =
=============================================*/

Route::get('/Test', function () {
    return view('System.Pages.print');
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
