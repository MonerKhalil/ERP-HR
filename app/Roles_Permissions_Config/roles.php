<?php

$userPermissions = [
    "read_users","read_roles",
];


return [
    "super_admin" => require __DIR__."/permissions.php",
    "user" => $userPermissions,
];
