<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Cria o usuário admin se não existir
        User::firstOrCreate(
            ['email' => 'admin@teste.com'], // e-mail do admin
            [
                'name' => 'Administrador',
                'password' => Hash::make('senha123'), // senha do admin
                'role' => 'admin',
            ]
        );
    }
}