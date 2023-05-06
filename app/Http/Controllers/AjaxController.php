<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AjaxController extends Controller
{
    public function getAllAddressCountry(Request $request){
        try {
            $request->validate([
                "id_country" => ["required",Rule::exists("countries","id")]
            ]);
            return address($request->id_country);
        }catch (\Exception $exception){
            return response()->json([
                "error" => $exception->getMessage(),
            ],$exception->getCode());
        }

    }
}
