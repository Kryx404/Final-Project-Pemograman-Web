<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



//import model
use App\Models\Tagihan;
use App\Models\User;
use App\Models\Laporan;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function index()
    {
        $users = User::with('tagihan')->where('id', auth()->id())->get();
        return view('user.homepage', [
            "title" => "homepage",
        ], compact('users'));
    }


    public function profil()
    {
        return view('user.profil', [
            "title" => "profil"
        ]);
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        $password = $request->password;
        $newPassword = $request->newPassword;

        if (Hash::check($password, $user->password)) {
            $user->update(['password' => bcrypt($newPassword)]);
            Session::flash('success', 'Password berhasil diubah');
        } else {
            Session::flash('error', 'Password lama salah');
        }

        return redirect()->back();
    }

    public function update(Request $request){
        $user = auth()->user();
        $user->update($request->except('_token'));
        Session::flash('success', 'Profil berhasil diubah');
        return redirect()->back();
    }


}
