<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function formLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login manual
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // LOGIN MENGGUNAKAN AUTH::ATTEMPT (WAJIB)
        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {

            // regenerate session (WAJIB)
            $request->session()->regenerate();

            // redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            }

            return redirect('/absensi'); // anggota PKL
        }

        // jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
