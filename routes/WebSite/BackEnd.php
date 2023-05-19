<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataEndServiceController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\EducationDataController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageSkillController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PositionEmployeeController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\RequestEndServiceController;
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
    Route::delete("roles/multi/delete",[RoleController::class,"MultiDelete"])->name("roles.multi.delete");
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
        Route::delete("type_decisions/multi/delete",[TypeDecisionController::class,"MultiDelete"])->name("type_decisions.multi.delete");
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
      Route::get("decisions/show/session_decisions/{session_decisions}",[DecisionController::class,"showDecisionsSession"])->name("decisions.session_decisions.show");

        /*===========================================
            =         End Decisions Routes        =
       =============================================*/
        Route::resource('conferences', ConferenceController::class);
        Route::prefix("conferences")->name("conferences.")
            ->controller(ConferenceController::class)->group(function (){
                Route::post('export/xlsx',"ExportXls")->name("export.xls");
                Route::post('export/pdf',"ExportPDF")->name("export.pdf");
                Route::delete("multi/delete","MultiDelete")->name("multi.delete");
            });

        Route::prefix("request_end_services")->name("request_end_services.")
            ->controller(RequestEndServiceController::class)->group(function (){
                Route::get("all","allRequest")->name("index");
                Route::get("show/my/requests/{employee?}","showMyRequest")->name("show.my.request");
                Route::get("create","create")->name("create");
                Route::post("store","store")->name("store");
                Route::get("show/{request}","showRequest")->name("show.request");
                Route::post("accept/{id_request}","accept")->name("accept.request");
                Route::delete("cancel/multi","cancelMultiRequest")->name("multi.cancel.request");
            });

        Route::resource('data_end_services', DataEndServiceController::class);
        Route::prefix("data_end_services")->name("data_end_services.")
            ->controller(DataEndServiceController::class)->group(function (){
                Route::get("add/employee/{employee}","createFromEmployee")->name("employee.create");
                Route::post('export/xlsx',"ExportXls")->name("export.xls");
                Route::post('export/pdf',"ExportPDF")->name("export.pdf");
                Route::delete("multi/delete","MultiDelete")->name("multi.delete");
            });

        Route::resource('positions', PositionController::class);
        Route::prefix("positions")->name("positions.")
            ->controller(PositionController::class)->group(function (){
                Route::post('export/xlsx',"ExportXls")->name("export.xls");
                Route::post('export/pdf',"ExportPDF")->name("export.pdf");
                Route::delete("multi/delete","MultiDelete")->name("multi.delete");
            });

        Route::resource('position_employees', PositionEmployeeController::class);
        Route::prefix("position_employees")->name("position_employees.")
            ->controller(PositionEmployeeController::class)->group(function (){
                Route::delete("multi/delete","MultiDelete")->name("multi.delete");
            });



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

        /*===========================================
           =        contract languageSkill membership Routes        =
          =============================================*/
Route::group([ 'as' => 'employees.',],function (){
    Route::resource('contract', ContractController::class)->except([
        "show", "edit", "update",
    ]);
    Route::resource('languageSkill', LanguageSkillController::class)->except([
        "show", "edit", "update",
    ]);
    Route::resource('membership', MembershipController::class)->except([
        "show", "edit", "update",
    ]);
});

        Route::get("contract/show/{contract?}", [ContractController::class, "show"])->name("employees.contract.show");
        Route::get("contract/edit/{contract?}", [ContractController::class, "edit"])->name("employees.contract.edit");
        Route::post("contract/update/{contract?}", [ContractController::class, "update"])->name("employees.contract.update");

        Route::get("languageSkill/show/{languageSkill?}", [LanguageSkillController::class, "show"])->name("employees.languageSkill.show");
        Route::get("languageSkill/edit/{languageSkill?}", [LanguageSkillController::class, "edit"])->name("employees.languageSkill.edit");
        Route::post("languageSkill/update/{languageSkill?}", [LanguageSkillController::class, "update"])->name("employees.languageSkill.update");

        Route::get("membership/show/{membership?}", [MembershipController::class, "show"])->name("employees.membership.show");
        Route::get("membership/edit/{membership?}", [MembershipController::class, "edit"])->name("employees.membership.edit");
        Route::post("membership/update/{membership?}", [MembershipController::class, "update"])->name("employees.membership.update");

        Route::get('contract/data/trash', [ContractController::class, 'trash'])
            ->name('employees.contract.trash');
        Route::put('contract/{contract}/restore', [ContractController::class, 'restore'])
            ->name('employees.contract.restore');
        Route::delete('contract/{contract}/force-delete', [ContractController::class, 'forceDelete'])
            ->name('employees.contract.force-delete');

        Route::get('language/data/trash', [LanguageSkillController::class, 'trash'])
            ->name('employees.language_skill.trash');
        Route::put('language/{language}/restore', [LanguageSkillController::class, 'restore'])
            ->name('employees.language_skill.restore');
        Route::delete('language/{language}/force-delete', [LanguageSkillController::class, 'forceDelete'])
            ->name('employees.language_skill.force-delete');

        Route::get('membership/data/trash', [MembershipController::class, 'trash'])
            ->name('membership.trash');
        Route::put('membership/{membership}/restore', [MembershipController::class, 'restore'])
            ->name('membership.restore');
        Route::delete('membership/{membership}/force-delete', [MembershipController::class, 'forceDelete'])
            ->name('membership.force-delete');
    });
    /*===========================================
    =         End System Routes        =
   =============================================*/

    /*===========================================
    =         Start Ajax Routes        =
   =============================================*/

    Route::prefix("ajax")->controller(AjaxController::class)->group(function (){
        Route::get("get/address","getAllAddressCountry")->name("get.address");
        Route::get("get/employee","getEmployeesSection")->name("get.employee");
    });

    /*===========================================
    =         End Ajax Routes        =
   =============================================*/
});
