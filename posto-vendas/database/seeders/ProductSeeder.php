<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'CLEAN GAS', 'price' => 10.00, 'stock' => 50],
            ['name' => 'MAX DIESEL', 'price' => 12.00, 'stock' => 40],
            ['name' => 'FLEX', 'price' => 9.50, 'stock' => 60],
            ['name' => 'MAX POWER', 'price' => 15.00, 'stock' => 30],

            ['name' => 'FLUIDO RADIADOR ROSA', 'price' => 20.00, 'stock' => 25],
            ['name' => 'FLUIDO RADIADOR VERDE', 'price' => 22.00, 'stock' => 20],

            ['name' => 'ÓLEO 15W40', 'price' => 35.00, 'stock' => 50],
            ['name' => 'ÓLEO 25W50', 'price' => 38.00, 'stock' => 45],
            ['name' => 'ÓLEO 5W30', 'price' => 40.00, 'stock' => 40],
            ['name' => 'ÓLEO 10W30', 'price' => 42.00, 'stock' => 35],
            ['name' => 'ÓLEO 0W30', 'price' => 45.00, 'stock' => 30],

            ['name' => 'STP FLEX', 'price' => 18.00, 'stock' => 50],
            ['name' => 'STP MOTOR DIESEL', 'price' => 19.50, 'stock' => 40],
            ['name' => 'STP OCTANE BOOSTER', 'price' => 21.00, 'stock' => 30],

            ['name' => 'GALÃO DE 5L', 'price' => 25.00, 'stock' => 60],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['name' => $product['name']], // procura pelo nome
                ['price' => $product['price'], 'stock' => $product['stock']] // insere ou atualiza
            );