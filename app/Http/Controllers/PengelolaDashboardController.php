<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import model
use App\Models\User;
use App\Models\Tagihan;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


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

     // Ambil semua data user
     $users = User::whereNotIn('role', ['admin', 'pengelola'])->get();

     $no = 1;

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
    ], compact('laporan', 'tagihan', 'laporanPerBulan', 'users', 'no'));

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


    public function pdf_terbayar()
{
    $tagihan = Tagihan::where('status', 'Sudah Terbayar')->get();

    $pdf = PDF::loadView('pengelola.pdf-terbayar', compact('tagihan'));
    return $pdf->download('Tagihan Terbayar.pdf');
}

    public function pdf_menunggu()
{
    $tagihan = Tagihan::where('status', 'Menunggu Konfirmasi')->get();

    $pdf = PDF::loadView('pengelola.pdf-menunggu', compact('tagihan'));
    return $pdf->download('Tagihan Pending.pdf');
}


}
