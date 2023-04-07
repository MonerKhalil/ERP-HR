<?php

use Illuminate\Support\Facades\Route;



Route::get('/Test-1', function () {
    return view('System.Pages.loginPage');
});

Route::get('/Test-2', function () {
    return view('System.Pages.Actors.Admin.addUser');
});

Route::get('/Test-3', function () {
    return view('System.Pages.Actors.profile');
});
