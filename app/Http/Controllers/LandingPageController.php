<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function homepage() {
        return view('landing-page.landing',[
            "title" => "home"
        ]
        );
    }

    public function penggunaan() {
        return view('landing-page.penggunaan',[
            "title" => "penggunaan"
        ]
        );
    }
}
