<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorys')->insert([
            [
                'id' => 2,
                'name' => 'Dien Thoai',
                'slug' => 'dien-thoai',
                'image' => 'image/gQfiHjQNLy68GO0vZbYJv4mucMRm2C99y5lRbEb3.jpg',
                'created_at' => '2025-04-10 02:16:02',
                'updated_at' => '2025-04-16 23:26:04',
            ],
            [
                'id' => 3,
                'name' => 'Phu Kien',
                'slug' => 'phu-kien',
                'image' => 'image/J0Qr48TCgaI4y7ogxUOlghDJGhhSVZ9Oy2bmBDvi.jpg',
                'created_at' => '2025-04-16 23:26:16',
                'updated_at' => '2025-04-16 23:26:16',
            ],
            [
                'id' => 4,
                'name' => 'Ti vi',
                'slug' => 'ti-vi',
                'image' => 'image/v3ZNiSVXwgosd33981vo8SChCYJCQk36Brd6E2D6.png',
                'created_at' => '2025-04-16 23:26:37',
                'updated_at' => '2025-04-16 23:26:37',
            ],
            [
                'id' => 5,
                'name' => 'Lap Top',
                'slug' => 'lap-top',
                'image' => 'image/NaAydZVGh0bRviOOaNXt22xRXUQbChtfeRh7SwDN.jpg',
                'created_at' => '2025-04-16 23:26:50',
                'updated_at' => '2025-04-16 23:26:50',
            ],
        ]);
    }
}
