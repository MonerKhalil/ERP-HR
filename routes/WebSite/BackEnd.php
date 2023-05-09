<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageSkillController;
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
     =        contract  Routes        =
     =============================================*/
    Route::resources([
        "contract"=>ContractController::class,
        "language" => LanguageSkillController::class
    ]);
    Route::get('contract/data/trash', [ContractController::class, 'trash'])
        ->name('contract.trash');
    Route::put('contract/{contract}/restore', [ContractController::class, 'restore'])
        ->name('contract.restore');
    Route::delete('contract/{contract}/force-delete', [ContractController::class, 'forceDelete'])
        ->name('contract.force-delete');
});

Route::get('language/data/trash', [LanguageSkillController::class, 'trash'])
    ->name('language_skill.trash');
Route::put('language/{language}/restore', [LanguageSkillController::class, 'restore'])
    ->name('language_skill.restore');
Route::delete('language/{language}/force-delete', [LanguageSkillController::class, 'forceDelete'])
    ->name('language_skill.force-delete');
