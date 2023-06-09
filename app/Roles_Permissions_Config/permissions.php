<?php

use App\HelpersClasses\Permissions;

$users = Permissions::ExceptPermissions("users",["export"]);
$roles = Permissions::ExceptPermissions("roles",["export"]);
$employees = Permissions::getPermissions("employees");
$type_decisions = Permissions::ExceptPermissions("type_decisions",["export"]);
$session_decisions = Permissions::getPermissions("session_decisions");
$decisions = Permissions::getPermissions("decisions");
$conferences = Permissions::getPermissions("conferences");
$sections = Permissions::getPermissions("sections");
$positions = Permissions::getPermissions("positions");
$position_employees = Permissions::ExceptPermissions("position_employees",["export"]);
$data_end_services = Permissions::getPermissions("data_end_services");
$request_end_services = Permissions::OnlyPermissions("request_end_services",["create","all","export"]);
$leave_types = Permissions::getPermissions("leave_types");
$leaves = Permissions::getPermissions("leaves");
$company_settings = Permissions::OnlyPermissions("company_settings",["all","read"]);
$work_settings = Permissions::getPermissions("work_settings");

return array_merge($users,$roles,$employees
,$session_decisions,$type_decisions,$decisions,$sections,
$conferences,$positions,$position_employees,$data_end_services,$request_end_services,
$leave_types,$leaves,$company_settings,$work_settings,
[
    #addPermissions
    #Example : "read_model"...
]);
