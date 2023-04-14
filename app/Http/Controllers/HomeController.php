<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function HomeView(): Response
    {
        return response()->view("System.Pages.globalPage");
    }
}
