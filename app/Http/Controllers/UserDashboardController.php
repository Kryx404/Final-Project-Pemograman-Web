<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


//import model
use App\Models\Tagihan;
use App\Models\User;
use App\Models\Laporan;

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

    public function store(Request $request)
    {
        $tagihan = new Tagihan;
        $tagihan->bulan = $request->input('bulan');
        $tagihan->nominal = $request->input('nominal');
        $tagihan->catatan = $request->input('catatan');
        $tagihan->bukti = $request->file('bukti')->store('bukti_pembayaran');
        $tagihan->user_id = auth()->id();
           // Mengisi foreign key 'tagihan_id' secara otomatis
    // $tagihan->laporan()->associate($request->input('laporan_id'));
    // $tagihan->laporan_id = $request->input('laporan_id');
        $tagihan->status = 'sudah terbayar';
        $tagihan->save();

        // Redirect ke halaman yang diinginkan setelah data berhasil disimpan
        Session::flash('success', 'Data baru berhasil ditambahkan.');
return redirect()->back();
    }

}
