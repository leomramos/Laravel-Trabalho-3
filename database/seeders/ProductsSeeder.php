<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Carro 1',
            'image' => 'carro1.jpg',
            'description' => 'Descrição do primeiro carro',
            'year' => 2020,
            'price' => 100000,
        ]);
        DB::table('products')->insert([
            'name' => 'Carro 2',
            'image' => 'carro2.jpg',
            'description' => 'Descrição do segundo carro',
            'year' => 2021,
            'price' => 200000,
        ]);
        DB::table('products')->insert([
            'name' => 'Carro 3',
            'image' => 'carro3.jpg',
            'description' => 'Descrição do terceiro carro',
            'year' => 2022,
            'price' => 300000,
        ]);
    }
}
