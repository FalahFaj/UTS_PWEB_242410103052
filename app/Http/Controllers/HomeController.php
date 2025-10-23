<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function tampilkanHome()
    {
        $info = "Selamat datang di halaman ini, ini adalah mini projek sebagai uts mata kuliah pemrograman web.";
        return view('home', ['info' => $info]);
    }
}
