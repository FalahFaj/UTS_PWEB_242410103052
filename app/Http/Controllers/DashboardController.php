<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function tampilkanDashboard($username)
    {
        return view('dashboard', ['username' => $username]);
    }
}
