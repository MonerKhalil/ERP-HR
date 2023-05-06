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

Route::get('/Test-10', function () {
    return view('System.Pages.Actors.decisionForm');
});

Route::get('/Test-11', function () {
    return view('System/Pages/Docs/decisionPrint');
});

Route::get('/Test-12', function () {
    return view('System/Pages/Actors/sessionForm');
});

Route::get('/Test-13', function () {
    return view('System/Pages/Actors/sessionView');
});

Route::get('/Test-8', function () {
    return view('System/Pages/Docs/tablePrint');
});

Route::get('/Test-16', function () {
    return view('System.Pages.Actors.profile');
});

Route::get('/Test-4', function () {
    return view('System.Pages.Actors.Admin.viewUsers');
});

Route::get('/Test-5', function () {
    return view('System.Pages.Actors.HR_Manager.addEmployee');
});

Route::get('/Test-6', function () {
    return view('System.Pages.Actors.HR_Manager.viewEmployees');
});

Route::get('/Test-7', function () {
    return view('System.Pages.Actors.HR_Manager.addContract');
});

Route::get('/Test-8', function () {
    return view('System.Pages.Actors.HR_Manager.addCourse');
});

Route::get('/Test-9', function () {
    return view('System.Pages.Actors.HR_Manager.employeeEndOfServiceForm');
});

Route::get('/Test-0', function () {
    return view('System.Pages.Actors.Admin.addUser');
});


Route::get('/Test-14', function () {
    return view('System.Pages.Actors.Diwan_User.addOutgoingCorrespondense');
});

Route::get('/Test-15', function () {
    return view('System/Pages/Actors/Diwan_User/viewCorrespondenses');
});

Route::get('/Test-17', function () {
    return view('System/Pages/Actors/decisionView');
});

Route::get('/Test-18', function () {
    return view('System/Pages/Actors/decisionDetails');
});

Route::get('/Test-19', function () {
    return view('System/Pages/Actors/sessionDetails');
});
