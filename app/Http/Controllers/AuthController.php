<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function proseslogout()
    {
        if (Auth::guard('karyawan')->check()) {
            Auth::guard('karyawan')->logout();
            return redirect('/');
        }
    }

    public function proseslogoutadmin()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
            return redirect('/panel');
        }
    }

    public function proseslogin(Request $request)
    {
        // Logout admin jika masih login agar tidak bentrok
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }

        if (Auth::guard('karyawan')->attempt([
            'nik' => $request->nik,
            'password' => $request->password
        ])) {
            return redirect('/dashboard');
        } else {
            return redirect('/')->with('warning', 'NIK / Password salah');
        }
    }

    public function prosesloginadmin(Request $request)
    {
        // Logout karyawan jika masih login agar tidak bentrok
        if (Auth::guard('karyawan')->check()) {
            Auth::guard('karyawan')->logout();
        }

        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/panel/dashboardadmin');
        } else {
            return redirect('/panel')->with('warning', 'Username / Password Salah');
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('karyawan')->logout();              // Logout guard 'karyawan'
        $request->session()->invalidate();              // Hancurkan session
        $request->session()->regenerateToken();         // Regenerate CSRF token
    
        return redirect('/proseslogout');               // <-- arahkan ke sini setelah logout
    }
}