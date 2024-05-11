<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengelolaDashboardController extends Controller
{
    public function pengelola(){
        return view('pengelola.dashboard',[
            "title" => "pengelola"
        ]
        );
    }
}
