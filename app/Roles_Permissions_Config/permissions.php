<?php

use App\HelpersClasses\Permissions;

$users = Permissions::ExceptPermissions("users",["print"]);
$roles = Permissions::ExceptPermissions("roles",["print"]);
$test = Permissions::getPermissions("test");

return array_merge($users,$roles,[
    #addPermissions
    #Example : "read_model"...
]);
