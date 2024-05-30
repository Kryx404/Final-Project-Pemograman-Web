<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import model
use App\Models\User;
use App\Models\Tagihan;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;

class PengelolaDashboardController extends Controller
{

    public function index()
    {
        $laporan = Laporan::all();
        return view('pengelola.dashboard', [
            "title" => "pengelola",
        ], compact('laporan'));
    }


    public function pengelola(){
        return view('pengelola.dashboard',[
            "title" => "pengelola"
        ]
        );
    }
}
