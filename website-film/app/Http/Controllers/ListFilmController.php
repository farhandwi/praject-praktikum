<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class ListFilmController extends Controller
{

    public function show()
    {
        $route = Route::getCurrentRoute();
        if ($route) {
            $routeName = $route->uri();
        }
        if($routeName == '/')
        {
            return view('index',[
                "route" => $routeName 
            ]);
        }
        else if($routeName == 'favorite')
        {
            return view('favorite',[
                "route" => $routeName 
            ]);
        }
    }
}
