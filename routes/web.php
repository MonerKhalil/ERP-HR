<?php

use App\Http\Controllers\LocalizationController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    \App\HelpersClasses\MessagesFlash::Success();
    return view("dashboard");
//    return $permissions = Permission::query()->whereIn("name",[
//        "read_users","read_roles",
//    ])->pluck("id","name")->all();
//    return require app_path("Roles_Permissions_Config/roles.php");
});

require __DIR__.'/auth.php';

require __DIR__."/WebSite/"."FrontEnd.php";
require __DIR__."/WebSite/"."BackEnd.php";

Route::get("lang/change/{Lang}",[LocalizationController::class,"SwitchLang"])->name("lang.change");
