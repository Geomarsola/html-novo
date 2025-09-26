<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'CLEAN GAS', 'price' => 10.00],
            ['name' => 'MAX DIESEL', 'price' => 12.00],
            ['name' => 'FLEX', 'price' => 9.50],
            ['name' => 'MAX POWER', 'price' => 15.00],
        ]);
    }
}