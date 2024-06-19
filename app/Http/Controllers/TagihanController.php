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
            if ($firstTagihan) {
                if ($firstTagihan->status == 'Menunggu Konfirmasi') {
                    return 0;
                } elseif ($firstTagihan->status == 'Sudah Terbayar') {
                    return 1;
                } else {
                    return 2;
                }
            } else {
                return 3;
            }
        });

        return view('admin.tagihan', [
            "title" => "tagihan",
            'users' => $sortedUsers
        ]);


    }

    public function detail($id)
{
    $tagihan = Tagihan::findOrFail($id);

    return view('admin.detail', [
        "title" => "Detail Tagihan",
        'tagihan' => $tagihan
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
     * Update the status to 'sudah terbayar'
     */
    public function updateStatus($id)
    {
        // Dapatkan tagihan berdasarkan $id
        $tagihan = Tagihan::findOrFail($id);

        // Perbarui status tagihan
        $tagihan->status = 'Sudah Terbayar';
        $tagihan->save();

        // Redirect atau berikan respons yang sesuai
        return redirect()->back()->with('success', 'Status tagihan berhasil diperbarui.');
    }

    // public function updateStatus(Request $request, Tagihan $tagihan)
    // {
    //     $tagihan->update([
    //         'status' => 'Sudah Terbayar',
    //         'user_id' => auth()->id(),  // tambahkan user_id saat perbarui status
    //     ]);

    //     // Redirect atau berikan response sesuai kebutuhan
    //     return redirect()->back()->with('success', 'Status tagihan berhasil diperbarui.');
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();
        return redirect('/admin/tagihan');
    }
}
