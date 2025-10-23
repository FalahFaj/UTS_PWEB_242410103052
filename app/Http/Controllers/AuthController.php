<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function tampilkanLogin()
    {
        return view("login");
    }

    public function Login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->password != 'admin') {
            return back()->withErrors(['password' => 'Password yang anda masukkan salah'])->withInput();
        }

        $request->session()->put('username', $username);

        return redirect()->route('dashboard', ['username' => $username]);
    }
    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect()->route('home');
    }
}
