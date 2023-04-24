<?php

use App\HelpersClasses\MessagesFlash;
use Illuminate\Support\Facades\Session;

function FilterDataRequest(){
    return  !is_null(request('filter')) ? request('filter') : [];
}

function Errors($key)
{
    return Session::has(MessagesFlash::$Errors) && isset(Session::get(MessagesFlash::$Errors)[$key])
        ? Session::get(MessagesFlash::$Errors)[$key][0] : null;
}

function Error(){
    return Session::has(MessagesFlash::$err)
        ? Session::get(MessagesFlash::$err) : null;
}

function Success(){
    return Session::has(MessagesFlash::$suc)
        ? Session::get(MessagesFlash::$suc) : null;
}
