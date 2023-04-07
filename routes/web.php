<?php

use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;


Route::get('xxx', function () {
    \App\HelpersClasses\Permissions::addRolesAndUsersInSeeder();
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
