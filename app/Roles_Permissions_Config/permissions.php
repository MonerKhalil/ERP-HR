<?php

use App\HelpersClasses\Permissions;

$users = Permissions::ExceptPermissions("users",["export"]);
$roles = Permissions::ExceptPermissions("roles",["export"]);
$test = Permissions::getPermissions("employees");

return array_merge($users,$roles,[
    #addPermissions
    #Example : "read_model"...
]);
