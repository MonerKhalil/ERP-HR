<?php

namespace App\HelpersClasses;

use Illuminate\Support\Arr;

class Permissions
{
    private const Process_Permissions = [
        "create","read","update","delete","print",
    ];

    /**
     * @param string $key
     * @return array
     * @author moner khalil
     */
    public static function getPermissions(string $key,array $arr = null): array
    {
        $final = self::Process_Permissions;
        if (!is_null($arr)){
            $final = $arr;
        }
        return Arr::map($final,function ($ele) use ($key){
            return $ele . "_" . $key;
        });
    }

    /**
     * @param string $key
     * @param array $except
     * @return array
     * @author moner khalil
     */
    public static function ExceptPermissions(string $key, array $except): array
    {
        return self::getPermissions($key,Arr::except(self::Process_Permissions,$except));
    }

    /**
     * @param string $key
     * @param array $only
     * @return array
     * @author moner khalil
     */
    public static function OnlyPermissions(string $key, array $only): array
    {
        return self::getPermissions($key,Arr::only(self::Process_Permissions,$only));
    }

    /**
     * @param string $key
     * @param array $add
     * @return array
     * @author moner khalil
     */
    public static function AddPermissions(string $key, array $add): array
    {
        return self::getPermissions($key,array_merge(self::Process_Permissions ,$add));
    }
}
