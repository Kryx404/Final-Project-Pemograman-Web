<?php

use Illuminate\Support\Facades\Route;

// start landing page
Route::get('/', function () {
    return view('landing-page.landing',[
        "title" => "home"
    ]
    );
});

Route::get('/login', function () {
    return view('landing-page.login',[
        "title" => "login"
    ]
    );
});

Route::get('/penggunaan', function () {
    return view('landing-page.penggunaan',[
        "title" => "penggunaan"
    ]
    );
});
// end landing page

// Route::get('/login', [LoginController::class, 'index']);

Route::get('/admin', function () {
    return view('dashboard-admin',[
        "title" => "admin"
    ]
    );
});

// start user
Route::get('/user', function () {
    return view('user.homepage',[
        "title" => "homepage",
        "nama" => "Kelompok 4"
    ]
    );
});

// end user
