<?php

use App\HelpersClasses\Permissions;

$users = Permissions::ExceptPermissions("users",["export"]);
$roles = Permissions::ExceptPermissions("roles",["export"]);
$employees = Permissions::getPermissions("employees");
$type_decisions = Permissions::ExceptPermissions("type_decisions",["export"]);
$session_decisions = Permissions::getPermissions("session_decisions");
$decisions = Permissions::getPermissions("decisions");

return array_merge($users,$roles,$employees,$session_decisions,
$type_decisions,$decisions,
[
    #addPermissions
    #Example : "read_model"...
]);
