<?php

use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

require __DIR__.'/auth.php';

require __DIR__."/WebSite/"."FrontEnd.php";
require __DIR__."/WebSite/"."BackEnd.php";

Route::get("lang/change/{Lang}",[LocalizationController::class,"SwitchLang"])->name("lang.change");
