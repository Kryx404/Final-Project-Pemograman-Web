<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import model
use App\Models\Tagihan;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index()
    {
        $users = User::with('tagihan')->where('id', auth()->id())->get();
        return view('user.homepage', [
            "title" => "homepage",
        ], compact('users'));
    }

    public function pembayaran()
    {
        return view('user.pembayaran', [
            "title" => "pembayaran"
        ]);
    }

}
