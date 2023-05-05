<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionDecisionController;
use App\Http\Controllers\TypeDecisionController;
use App\Http\Controllers\TypeInstitutionController;
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

        Route::prefix("notifications")->controller(NotificationsController::class)
        ->group(function(){
            Route::get("show","getNotifications")->name("notifications.show");
            Route::delete("clear","clearNotifications")->name("notifications.clear");
            Route::put("edit/read","editNotificationsToRead")->name("notifications.edit");
        });
        Route::get("audit/show",[AuditController::class,"NotificationsAuditUserShow"])->name("audit.show");

        /*===========================================
        =         End Notification Routes        =
       =============================================*/

    });

    /*===========================================
    =         Start Users Routes        =
   =============================================*/

    Route::resource("users", UserController::class)->except(["edit","update"]);
    Route::prefix('users')->controller(UserController::class)->group(function (){
        Route::post('export/xlsx',"ExportXls")->name("users.xls");
        Route::post('export/pdf',"ExportPDF")->name("users.pdf");
        Route::post("update/{user}","update")->name("users.update");
        Route::delete("multi/delete","MultiUsersDelete")->name("users.multi.delete");
        Route::delete("force_delete/{user}","forceDelete")->name("users.force_delete");
        Route::delete("multi/force_delete","MultiUsersForceDelete")->name("users.multi.force_delete");
    });

    /*===========================================
    =         End Users Routes        =
   =============================================*/

    Route::resource("roles", RoleController::class);
    /*===========================================
        =         Start System Routes        =
   =============================================*/

    Route::prefix("system")->name("system.")->group(function (){
        Route::resource('type_institutions', TypeInstitutionController::class)->except([
            "edit","create","show"
        ]);
        Route::resource('institutions', InstitutionController::class)->except([
            "edit","create","show"
        ]);
        Route::resource('type_decisions', TypeDecisionController::class)->except([
            "edit","create","show"
        ]);
        Route::resource('session_decisions', SessionDecisionController::class);
        Route::resource('decisions', DecisionController::class);
    });


    /*===========================================
    =         End System Routes        =
   =============================================*/
});
