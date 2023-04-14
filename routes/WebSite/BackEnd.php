<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsContoller;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function (){
    Route::get("",[HomeController::class,"HomeView"])->name("home");
    Route::prefix("user")->controller(ProfileUserController::class)->group(function (){
        /*===========================================
        =         Start Profile User Routes        =
       =============================================*/
        Route::get("profile","ShowProfile")->name("profile.show");
        Route::post("profile/update","UpdateProfile")->name('profile.update');
        /*===========================================
        =         End Profile User Routes        =
       =============================================*/
       
        /*===========================================
        =         Start Notification Routes        =
       =============================================*/
        Route::prefix("notifications")->controller(NotificationsContoller::class)
        ->group(function(){
            Route::get("show","getNotifications")->name("notifications.show");
            Route::delete("clear","clearNotifications")->name("notifications.clear");
            Route::put("edit/read","editNotificationsToRead")->name("notifications.edit");
        });
        /*===========================================
        =         End Notification Routes        =
       =============================================*/
    });
    Route::resource("users", UserController::class);
    Route::resource("roles", RoleController::class);
});
