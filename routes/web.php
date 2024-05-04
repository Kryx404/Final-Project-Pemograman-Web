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

// start user
Route::get('/user', function () {
    return view('user.homepage',[
        "title" => "homepage",
        "nama" => "Kelompok 4"
    ]
    );
});
Route::get('/pembayaran', function () {
    return view('user.pembayaran',[
        "title" => "pembayaran"
    ]
    );
});

// end user

// start admin
Route::get('/admin', function () {
    return view('admin.warga',[
        "title" => "admin"
    ]
    );
});
Route::get('/admin/tagihan', function () {
    return view('admin.tagihan',[
        "title" => "tagihan"
    ]
    );
});
Route::get('/admin/data-warga', function () {
    return view('admin.warga',[
        "title" => "data-warga"
    ]
    );
});
Route::get('/admin/data-baru', function () {
    return view('admin.data-baru',[
        "title" => "data-baru"
    ]
    );
});
