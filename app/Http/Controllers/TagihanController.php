<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;

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
        //buat mengurutkan
        $sortedUsers = $users->sortBy(function ($user) {
            return $user->tagihan->first()
                ? ($user->tagihan->first()->status == 'sudah terbayar' ? 0 : 1)
                : 1;
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
    public function store(StorePembayaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
