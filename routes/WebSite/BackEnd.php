<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware([])->group(function (){
    Route::resource("users", UserController::class);
    Route::resource("roles", UserController::class);
});
