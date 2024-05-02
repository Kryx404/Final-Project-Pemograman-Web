<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/login', [LoginController::class, 'index']);

Route::get('/admin', function () {
    return view('dashboard-admin',[
        "title" => "admin"
    ]
    );
});

Route::get('/dashboard', function () {
    return view('dashboard-user',[
        "title" => "dasboard"
    ]
    );
});
