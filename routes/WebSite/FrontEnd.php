<?php

use Illuminate\Support\Facades\Route;

/*===========================================
	=          For Test         =
=============================================*/

Route::get('/Test-11', function () {
    return view('System/Pages/Docs/decisionPrint');
});

Route::get('/Test-8', function () {
    return view('System/Pages/Docs/tablePrint');
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

Route::get('/Test-14', function () {
    return view('System.Pages.Actors.Diwan_User.addOutgoingCorrespondense');
});

Route::get('/Test-15', function () {
    return view('System/Pages/Actors/Diwan_User/viewCorrespondenses');
});

Route::get('/Test-17', function () {
    return view('System/Pages/Actors/decisionView');
});

Route::get('/Test-20', function () {
    return view('System/Pages/Actors/HR_Manager/reportEmployeesForm');
});

Route::get('/Test-30', function () {
    return view('System/Pages/Actors/Vacations/newTypeForm');
});

Route::get('/Test-31', function () {
    return view('System/Pages/Actors/Vacations/vacationTypesView');
});

Route::get('/Test-21', function () {
    return view('System/Pages/Actors/HR_Manager/viewEmployee');
});

Route::get('/Test-32', function () {
    return view('System/Pages/Actors/Vacations/vacationRequest');
});

Route::get('/Test-33', function () {
    return view('System/Pages/Actors/Vacations/vacationsDetails');
});

Route::get('/Test-34', function () {
    return view('System/Pages/Actors/Vacations/myVacationsView');
});

Route::get('/Test-35', function () {
    return view('System/Pages/Actors/Vacations/vacationTypeDetails');
});

Route::get('/Test-36', function () {
    return view('System/Pages/Actors/Vacations/allVacationsView');
});
