<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function tampilkanProfile(Request $request)
    {
        $username = $request->session()->get('username');
        return view('profile', ['username' => $username]);
    }
}
