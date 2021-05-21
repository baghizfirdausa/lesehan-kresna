<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(AuthRequest $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (auth()->user()->role == 'pemilik') {
                return redirect('/pemilik/dashboard');
            }
            if (auth()->user()->role == 'kasir') {
                return redirect('/kasir/dashboard');
            } else {
                return redirect('/keuangan/dashboard');
            }
        } else {
            return redirect('/')->with('failed', 'Username atau Password Tidak Sesuai!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
