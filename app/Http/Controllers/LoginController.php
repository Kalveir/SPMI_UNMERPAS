<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\jabatan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function Authlogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // $credential = $request->only('email','password');
        $user = User::where('email', $credentials['email'])->first();


        if ($user && $user->status == 1) { // Assuming status 1 means active, adjust this according to your logic
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Selamat Datang', Auth::user()->nama);
            return redirect()->intended('dashboard');
        } else {
            Alert::error('Login Gagal', 'Periksa Username & Password anda');
            return redirect()->back();
        }
    } else {
        Alert::error('Login Gagal', 'Akun telah dinonaktifkan, Silahkan hubungi Admin');
        return redirect()->back();
}
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
