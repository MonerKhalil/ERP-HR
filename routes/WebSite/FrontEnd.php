<?php

use Illuminate\Support\Facades\Route;



Route::get('/Test-1', function () {
    return view('System.Pages.loginPage');
});

Route::get('/Test-2', function () {
    return view('System.Pages.Actors.Admin.addUser');
});
<<<<<<< Updated upstream
=======

Route::get('/Test-3', function () {
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
>>>>>>> Stashed changes
