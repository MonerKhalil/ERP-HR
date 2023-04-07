<?php

namespace App\HelpersClasses;

use Illuminate\Support\Facades\Session;

class MessagesFlash
{
    public static $suc = "success";
    public static $err = "errors";

    /**
     * @param string $process
     * @return mixed
     * @author moner khalil
     */
    private static function Messages(string $process): mixed
    {
        $msg = [
            "create" => __("suc.create"),
            "update" => __("suc.update"),
            "delete" => __("suc.delete"),
            "default" => __("suc.default"),
        ];
        return $msg[$process] ?? $msg['default'];
    }

    /**
     * @param string $process
     * @author moner khalil
     */
    public static function Success(string $process = ""){
        Session::flash(self::$suc,self::Messages($process));
    }

    /**
     * @param mixed $errors
     * @author moner khalil
     */
    public static function Errors(mixed $errors){
        Session::flash(self::$err,is_string($errors) ? __($errors) : $errors);
    }
}
