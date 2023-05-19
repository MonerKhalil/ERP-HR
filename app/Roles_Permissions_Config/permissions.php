<?php

use App\HelpersClasses\Permissions;

$users = Permissions::ExceptPermissions("users",["export"]);
$roles = Permissions::ExceptPermissions("roles",["export"]);
$employees = Permissions::getPermissions("employees");
$type_decisions = Permissions::ExceptPermissions("type_decisions",["export"]);
$session_decisions = Permissions::getPermissions("session_decisions");
$decisions = Permissions::getPermissions("decisions");
$conferences = Permissions::getPermissions("conferences");
$positions = Permissions::getPermissions("positions");
$position_employees = Permissions::ExceptPermissions("position_employees",["export"]);
$data_end_services = Permissions::getPermissions("data_end_services");
$request_end_services = Permissions::OnlyPermissions("request_end_services",["create","all","export"]);

return array_merge($users,$roles,$employees
,$session_decisions,$type_decisions,$decisions,
$conferences,$positions,$position_employees,$data_end_services,$request_end_services,
[
    #addPermissions
    #Example : "read_model"...
]);
