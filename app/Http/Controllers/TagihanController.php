<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTagihanRequest;
use App\Http\Requests\UpdateTagihanRequest;
use Illuminate\Support\Facades\Session;

//import model
use App\Models\Tagihan;
use App\Models\User;


class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $tagihan = Tagihan::all();
        // $datapembayaran = Tagihan::with('user')->get();
        // return view('admin.tagihan',[
        //     "title" => "tagihan"
        // ], compact('tagihan', 'datapembayaran'));

        $users = User::with('tagihan')->whereNotIn('role', ['admin', 'pengelola'])->get();

        // Menambahkan pencarian nama user sebelum pengurutan
        if ($search = request('search')) {
            $users = $users->filter(function($user) use ($search) {
                return str_contains($user->nama, $search);
            });
        }

        // menambahkan filter bulan
        if ($bulan = request('bulan')) {
            // Ambil data berdasarkan bulan yang dipilih dari kolom bulan pada database tagihan
            $users = $users->filter(function($user) use ($bulan) {
                return $user->tagihan->where('bulan', $bulan)->count() > 0;
            });
        }

        // Mengurutkan pengguna berdasarkan status pembayaran
        $sortedUsers = $users->sortBy(function ($user) {
            $firstTagihan = $user->tagihan->first();
            return $firstTagihan ? ($firstTagihan->status == 'sudah terbayar' ? 0 : 1) : 1;
        });

        return view('admin.tagihan', [
            "title" => "tagihan",
            'users' => $sortedUsers
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tagihan $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
//
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();
        return redirect('/admin/tagihan');
    }
}
