<?php

use Illuminate\Support\Facades\Route;



Route::get('/Test', function () {
    return view('System.Pages.Actors.Admin.addUser');
});
