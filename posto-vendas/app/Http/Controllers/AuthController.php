<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar formulário de registro
    public function showRegisterForm() {
        return view('auth.register');
    }

    // Registrar usuário
    public function register(Request $request) {
        // Validação básica
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:6|confirmed', // precisa de campo password_confirmation no form
        ]);

        // Criar usuário com role
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role' => $request->role ?? 'frentista', // padrão: frentista
        ]);

        Auth::login($user);

        // Redireciona de acordo com a role
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard'); // rota do admin
        } else {
            return redirect('/products'); // rota do frentista
        }
    }

    // Mostrar formulário de login
    public function showLoginForm() {
        return view('auth.login');
    }

    // Login
    public function login(Request $request) {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redireciona de acordo com a role
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/products');
            }
        }

        return back()->withErrors(['email'=>'Credenciais inválidas']);
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}