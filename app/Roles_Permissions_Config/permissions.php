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
$contracts = Permissions::getPermissions("contracts");
$correspondences = Permissions::getPermissions("correspondences");
$correspondence_source_dests = Permissions::getPermissions("correspondence_source_dests");
$languages = Permissions::getPermissions("languages");
$language_skills = Permissions::getPermissions("language_skills");
$membership_types= Permissions::getPermissions("membership_types");
$memberships= Permissions::getPermissions("memberships");
return array_merge($users,$roles,$employees
    ,$session_decisions,$type_decisions,$decisions,$sections,
    $conferences,$positions,$position_employees,$data_end_services,$request_end_services,
    $leave_types
    ,$leaves,$contracts,$correspondences,$correspondence_source_dests,
    $languages,$language_skills,$membership_types,$memberships,
    [
        #addPermissions
        #Example : "read_model"...
    ]);
