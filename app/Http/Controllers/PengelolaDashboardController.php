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
//     public function index()
// {
//     $laporan = Laporan::all();
//     $tagihan = Tagihan::all();

//     return view('pengelola.dashboard', [
//         "title" => "pengelola",
//     ], compact('laporan', 'tagihan'));


// }
public function index()
{
    // Ambil semua data laporan
    $laporan = Laporan::all();

    // Ambil semua data tagihan
    $tagihan = Tagihan::all();

    // Kumpulkan data berdasarkan bulan dan hitung total nominal
    $laporanPerBulan = $tagihan->groupBy('bulan')
                            ->map(function ($items) {
                                return [
                                    'bulan' => $items->first()->bulan,
                                    'total_nominal' => $items->sum('nominal')
                                ];
                            })
                            ->values()
                            ->toArray();

    return view('pengelola.dashboard', [
        "title" => "pengelola",
    ], compact('laporan', 'tagihan', 'laporanPerBulan'));

}


    public function pengelola(){
        return view('pengelola.dashboard',[
            "title" => "pengelola"
        ]
        );
    }

    public function detail(Request $request, $id){

        // $tagihan = Tagihan::where('bulan', $request)->get();
$tagihan = tagihan::findorfail($id);

        if ($tagihan) {

    // dd($tagihan);

            return view('pengelola.detail-laporan', [
                "title" => "detail"
            ], compact('tagihan'));
        } else {
            // Tangani kasus data tidak ditemukan
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }


    }



}
