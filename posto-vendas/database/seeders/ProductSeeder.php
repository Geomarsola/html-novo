<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'CLEAN GAS', 'price' => 10.00],
            ['name' => 'MAX DIESEL', 'price' => 12.00],
            ['name' => 'FLEX', 'price' => 9.50],
            ['name' => 'MAX POWER', 'price' => 15.00],

            ['name' => 'FLUIDO RADIADOR ROSA', 'price' => 20.00],
            ['name' => 'FLUIDO RADIADOR VERDE', 'price' => 22.00],

            ['name' => 'ÓLEO 15W40', 'price' => 35.00],
            ['name' => 'ÓLEO 25W50', 'price' => 38.00],
            ['name' => 'ÓLEO 5W30', 'price' => 40.00],
            ['name' => 'ÓLEO 10W30', 'price' => 42.00],
            ['name' => 'ÓLEO 0W30', 'price' => 45.00],

            ['name' => 'STP FLEX', 'price' => 18.00],
            ['name' => 'STP MOTOR DIESEL', 'price' => 19.50],
            ['name' => 'STP OCTANE BOOSTER', 'price' => 21.00],

            ['name' => 'GALÃO DE 5L', 'price' => 25.00],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['name' => $product['name']], // condição de busca
                ['price' => $product['price']] // valores a atualizar/inserir
            );
        }
    }
}