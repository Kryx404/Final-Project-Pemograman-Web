<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserDashboardController;

// start landing page
Route::get('/', [LandingPageController::class, 'homepage']);
Route::get('/penggunaan', [LandingPageController::class, 'penggunaan']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

// end landing page


// start user
Route::get('/user', [UserDashboardController::class, 'index'])->name('user')->middleware('auth');
Route::get('/pembayaran', [UserDashboardController::class, 'pembayaran'])->middleware('auth');

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
