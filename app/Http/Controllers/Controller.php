<?php

namespace App\Http\Controllers;

use App\HelpersClasses\TResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,TResponse;

    protected function addMiddlewarePermissionsToFunctions(string $table){
        if (!is_null(auth()->user()) && !auth()->user()->can("all_".$table)){
            $this->middleware(["permission:read_".$table])->only(["index"]);
            $this->middleware(["permission:create_".$table])->only(["create","store"]);
            $this->middleware(["permission:update_".$table])->only(["edit","update"]);
            $this->middleware(["permission:delete_".$table])->only(["destroy"]);
        }
    }
}
