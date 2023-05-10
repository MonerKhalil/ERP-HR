<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\EducationDataController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageSkillController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionDecisionController;
use App\Http\Controllers\TypeDecisionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get("", [HomeController::class, "HomeView"])->name("home");
    Route::prefix("user")->controller(ProfileUserController::class)->group(function () {
        /*===========================================
        =         Start Profile User Routes        =
       =============================================*/

        Route::get("profile", "ShowProfile")->name("profile.show");
        Route::post("profile/update", "UpdateProfile")->name('profile.update');

        /*===========================================
        =         End Profile User Routes        =
       =============================================*/


        /*===========================================
        =         Start Notification Routes        =
       =============================================*/

        Route::prefix("notifications")->controller(NotificationsController::class)
            ->group(function () {
                Route::get("show", "getNotifications")->name("notifications.show");
                Route::delete("clear", "clearNotifications")->name("notifications.clear");
                Route::put("edit/read", "editNotificationsToRead")->name("notifications.edit");
            });
        Route::get("audit/show", [AuditController::class, "NotificationsAuditUserShow"])->name("audit.show");

        /*===========================================
        =         End Notification Routes        =
       =============================================*/

    });

    /*===========================================
    =         Start Users Routes        =
   =============================================*/

    Route::resource("users", UserController::class)->except(["edit", "update"]);
    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::post('export/xlsx', "ExportXls")->name("users.xls");
        Route::post('export/pdf', "ExportPDF")->name("users.pdf");
        Route::post("update/{user}", "update")->name("users.update");
        Route::delete("multi/delete", "MultiUsersDelete")->name("users.multi.delete");
        Route::delete("force_delete/{user}", "forceDelete")->name("users.force_delete");
        Route::delete("multi/force_delete", "MultiUsersForceDelete")->name("users.multi.force_delete");
    });

    /*===========================================
    =         End Users Routes        =
   =============================================*/

    Route::resource("roles", RoleController::class);

    /*===========================================
     =        contract languageSkill membership Routes        =
     =============================================*/
    Route::resources(
        [
            "contract" => ContractController::class,
            "languageSkill" => LanguageSkillController::class,
            "membership" => MembershipController::class,
        ]);

    Route::get('contract/data/trash', [ContractController::class, 'trash'])
        ->name('contract.trash');
    Route::put('contract/{contract}/restore', [ContractController::class, 'restore'])
        ->name('contract.restore');
    Route::delete('contract/{contract}/force-delete', [ContractController::class, 'forceDelete'])
        ->name('contract.force-delete');

    Route::get('language/data/trash', [LanguageSkillController::class, 'trash'])
        ->name('language_skill.trash');
    Route::put('language/{language}/restore', [LanguageSkillController::class, 'restore'])
        ->name('language_skill.restore');
    Route::delete('language/{language}/force-delete', [LanguageSkillController::class, 'forceDelete'])
        ->name('language_skill.force-delete');

    Route::get('membership/data/trash', [MembershipController::class, 'trash'])
        ->name('membership.trash');
    Route::put('membership/{membership}/restore', [MembershipController::class, 'restore'])
        ->name('membership.restore');
    Route::delete('membership/{membership}/force-delete', [MembershipController::class, 'forceDelete'])
        ->name('membership.force-delete');
    /*===========================================
        =         Start System Routes        =
   =============================================*/

    Route::prefix("system")->name("system.")->group(function () {
        /*===========================================
            =         Start Decisions Routes        =
        =============================================*/
        Route::resource('type_decisions', TypeDecisionController::class)->except([
            "edit", "create", "show"
        ]);
        Route::resource('session_decisions', SessionDecisionController::class);
        Route::prefix("session_decisions")->name("session_decisions.")
            ->controller(SessionDecisionController::class)->group(function () {
                Route::post('export/xlsx', "ExportXls")->name("export.xls");
                Route::post('export/pdf', "ExportPDF")->name("export.pdf");
                Route::delete("multi/delete", "MultiDelete")->name("multi.delete");
            });
        Route::resource('decisions', DecisionController::class)->except(["update"]);
        Route::post("decisions/{decision}", [DecisionController::class, "update"])->name("decisions.update");
        Route::prefix("decisions")->name("decisions.")
            ->controller(DecisionController::class)->group(function () {
                Route::get("print/pdf/{decision}", "PrintDecision")->name("print.pdf");
                Route::post('export/xlsx', "ExportXls")->name("export.xls");
                Route::post('export/pdf', "ExportPDF")->name("export.pdf");
                Route::delete("multi/delete", "MultiDelete")->name("multi.delete");
            });
        Route::get("decisions/create/session_decisions/{session_decisions}", [DecisionController::class, "addDecisions"])->name("decisions.session_decisions.add");

        /*===========================================
            =         End Decisions Routes        =
       =============================================*/

        /*===========================================
            =         Start Employees Routes        =
       =============================================*/

        Route::resource('employees', EmployeeController::class)->except([
            "show", "edit", "update",
        ]);
        Route::get("employees/show/{employee?}", [EmployeeController::class, "show"])->name("employees.show");
        Route::get("employees/edit/{employee?}", [EmployeeController::class, "edit"])->name("employees.edit");
        Route::post("employees/update/{employee?}", [EmployeeController::class, "update"])->name("employees.update");
        #contact_data
        Route::post("employees/edit/contact/{contact}", [ContactController::class, "updateContact"])->name("employees.contact.update");
        Route::post("employees/add/contact_document/{contact}", [ContactController::class, "addContactDocument"])->name("employees.contact_document.add");
        Route::post("employees/edit/contact_document/{contact_document}", [ContactController::class, "updateContactDocument"])->name("employees.contact_document.update");
        #education_data
        Route::post("employees/edit/education_data/{education_data}", [EducationDataController::class, "updateEducationData"])->name("employees.education_data.update");
        Route::post("employees/add/education_document/{education_data}", [EducationDataController::class, "addEducationDocument"])->name("employees.education_document.add");
        Route::post("employees/edit/education_document/{education_document}", [EducationDataController::class, "updateContactDocument"])->name("employees.education_document.update");
        /*===========================================
            =         End Employees Routes        =
       =============================================*/
    });
    /*===========================================
    =         End System Routes        =
   =============================================*/

    /*===========================================
    =         Start Ajax Routes        =
   =============================================*/

    Route::prefix("ajax")->controller(AjaxController::class)->group(function () {
        Route::get("get/address", "getAllAddressCountry")->name("get.address");
    });


    /*===========================================
    =         End Ajax Routes        =
   =============================================*/


    Route::post("mmm", [EmployeeController::class, "store"]);

});
