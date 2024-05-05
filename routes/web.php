<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDashboardController;

// start landing page
Route::get('/', function () {
    return view('landing-page.landing',[
        "title" => "home"
    ]
    );
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/penggunaan', function () {
    return view('landing-page.penggunaan',[
        "title" => "penggunaan"
    ]
    );
});
// end landing page


// start user
Route::get('/user', [UserDashboardController::class, 'index'])->name('user');

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
// end admin

// start pengelola
Route::get('/pengelola', function () {
    return view('pengelola.dashboard',[
        "title" => "pengelola"
    ]
    );
});
