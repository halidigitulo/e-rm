<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // protected $redirectTo = '/login';
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            flash()->success('Login Sukses', 'Selamat Datang di halaman Dashboard');
            return redirect()->intended('/dashboard');
        } else {
            flash()->warning('Login Gagal', 'Periksa username dan password Anda');
            return redirect()->back();
        }
    }

    public function otp()
    {
        return view('loginotp');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        flash()->success('Logout Berhasil', 'Anda telah keluar dari halaman Dashboard.');
        return redirect('/');
    }
}
