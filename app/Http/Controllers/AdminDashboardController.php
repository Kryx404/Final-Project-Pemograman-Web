<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

// import model user
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $warga = User::all();
        return view('admin.warga',[
            "title" => "admin"
        ], compact('warga'));
    }
    public function tagihan()
    {
        return view('admin.tagihan',[
            "title" => "tagihan"
        ]
        );
    }

    public function edit($id)
    {
        $warga = User::findorfail($id);

        return view ('admin.ubah-data', compact('warga'), [
            "title" => "edit-data",
        ]);

    }

    public function update(Request $request, $id)
    {
        $warga = User::findorfail($id);
        $warga->update($request->all());

        Session::flash('success', 'Data baru berhasil diedit.');
        return redirect('/admin');
    }



    public function show()
    {

        return view('admin.data-baru',[
            "title" => "data-baru"
        ]
        );
    }

    public function create()
    {
        return view('admin.data-baru');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Simpan data baru ke dalam tabel users
        $user = new User;
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->alamat = $request->input('alamat');
        $user->email = $request->input('email');
        $user->save();

        // Redirect ke halaman yang diinginkan setelah data berhasil disimpan
        Session::flash('success', 'Data baru berhasil ditambahkan.');

    return redirect('/admin');
}

public function destroy($id)
{
    DB::table('users')->where('id', $id)->delete();

    return redirect('/admin')->with('success', 'Data berhasil dihapus.');
}

}
