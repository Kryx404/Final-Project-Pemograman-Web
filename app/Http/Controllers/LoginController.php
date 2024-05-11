<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('landing-page.login',[
        "title" => "login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'min:3', 'max:25'],
            'password' => ['required', 'min:8', 'max:72'],
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->route('user');
        // }
        if (Auth::attempt($credentials)) {
           if(Auth::user()->role == 'admin'){
            return redirect('/admin');
           }
           elseif(Auth::user()->role == 'user'){
            return redirect('/user');
           }
        }
        return back()->with('loginError', 'Login Gagal');
    }



    public function logout(Request $request){

Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
return redirect('/login');

    }
}
