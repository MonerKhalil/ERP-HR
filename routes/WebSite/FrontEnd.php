<?php

use Illuminate\Support\Facades\Route;

/*===========================================
	=          For Test         =
=============================================*/

Route::get('/Test-1', function () {
    return view('System.Pages.logoutPage');
});

Route::get('/Test-2', function () {
    return view('System.Pages.404');
});

Route::get('/Test-3', function () {
    return view('System.Pages.comingSoon');
});

Route::get('/Test-4', function () {
    return view('System.Pages.Actors.decisionForm');
});

Route::get('/Test-5', function () {
    return view('System/Pages/Docs/decisionPrint');
});

Route::get('/Test-6', function () {
    return view('System/Pages/Actors/sessionForm');
});

Route::get('/Test-7', function () {
    return view('System/Pages/Actors/sessionView');
});
