<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        return redirect('/dashboard');
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
