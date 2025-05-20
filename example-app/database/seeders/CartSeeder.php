<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run()
    {
        DB::table('carts')->insert([
            [
                'id_user' => 1,
                'id_product' => 5,
                'soluong' => 2,
            ],
            [
                'id_user' => 1,
                'id_product' => 4,
                'soluong' => 1,
            ],
        ]);
    }
}
