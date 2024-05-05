<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.homepage', [
            "title" => "homepage",
            "nama" => "Kelompok 4"
        ]);
    }
    public function pembayaran()
    {
        return view('user.pembayaran', [
            "title" => "pembayaran"
        ]);
    }
}
