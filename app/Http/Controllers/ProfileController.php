<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function tampilkanProfile(Request $request)
    {
        $username = $request->session()->get('username');
        // return view('profile', ['username' => $username]);
        if ($username !== 'Guest' && $username !== '') {
            $profileData = [
                'email' => strtolower($username) . '@mail.unej.ac.id',
                'role' => 'Administrator',
                'password_dummy' => 'admin'
            ];
        } else {
             $profileData = [
                'email' => 'muhammadfalah@gmail.com',
                'role' => 'User',
                'password_dummy' => '12345678'
            ];
        }
        return view('profile', [
            'username' => $username,
            'profile' => $profileData
        ]);
    }
}
