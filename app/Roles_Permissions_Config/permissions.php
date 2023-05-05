<?php

use App\HelpersClasses\Permissions;

$users = Permissions::ExceptPermissions("users",["export"]);
$roles = Permissions::ExceptPermissions("roles",["export"]);
$employees = Permissions::getPermissions("employees");
$type_institutions = Permissions::ExceptPermissions("type_institutions",["export"]);
$type_decisions = Permissions::ExceptPermissions("type_decisions",["export"]);
$institutions = Permissions::getPermissions("institutions");
$session_decisions = Permissions::getPermissions("session_decisions");
$decisions = Permissions::getPermissions("decisions");

return array_merge($users,$roles,$employees,$type_institutions,$institutions,$session_decisions,
$type_decisions,$decisions,
[
    #addPermissions
    #Example : "read_model"...
]);
