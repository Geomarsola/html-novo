<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect('/sales/create');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/sales/create');
        }
        return back()->withErrors(['email'=>'Credenciais inválidas']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}