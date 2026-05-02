<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 🔵 MOSTRAR LOGIN
    public function loginForm()
    {
        return view('auth.login');
    }

    // 🔐 LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas'
        ]);
    }

    // 🟢 MOSTRAR REGISTRO
    public function registerForm()
    {
        return view('auth.register');
    }

    // 👤 REGISTRAR USUARIO
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'analista'
        ]);

        return redirect('login');
    }

    // 🏠 DASHBOARD
    public function dashboard()
    {
        return view('dashboard.index');
    }

    // 🚪 LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
