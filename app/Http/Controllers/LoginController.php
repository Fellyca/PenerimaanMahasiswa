<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        // Ambil semua pengumuman dari database
        $title = "login";
        return view('Auth/login', compact('title'));
    }

    public function authenticate(Request $request){
        // Ambil semua pengumuman dari database
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // berhasil
        if (Auth::attempt($credentials)) {
            // Cek apakah akun telah diverifikasi
            if (Auth::user()->is_accepted) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } else {
                // Logout jika pengguna tidak diterima dan kirim pesan error
                Auth::logout();
                return back()->with('loginError', 'Akun Anda belum terverifikasi');
            }
        } else {
            // Jika kredensial salah
            return back()->with('loginError', 'Username atau password salah');
        }
        
        //gagal
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
