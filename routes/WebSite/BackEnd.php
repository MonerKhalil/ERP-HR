<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function (){
    Route::get("",[HomeController::class,"HomeView"])->name("home");
    Route::resource("users", UserController::class);
    Route::resource("roles", RoleController::class);
});
