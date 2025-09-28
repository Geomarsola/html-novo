<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('admin.users.create');
    }

    // Salva o novo frentista
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'frentista', // sempre frentista
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Frentista cadastrado com sucesso!');
    }
}