<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\jabatan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function Authlogin(Request $request):RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // $credential = $request->only('email','password');
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }else
        {
            return back()->with('loginError', 'Login Failde !');
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
