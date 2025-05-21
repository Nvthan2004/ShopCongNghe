<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'id' => 3,
                'name' => 'Sam Sung',
                'slug' => 'sam-sung',
                'logo' => 'logos/8R6mzO8bFWT9NQHUTvHaTINC6tDwCVhEIvAXi70q.png',
                'created_at' => '2025-04-16 23:27:52',
                'updated_at' => '2025-04-16 23:32:18',
            ],
            [
                'id' => 4,
                'name' => 'Apple',
                'slug' => 'apple',
                'logo' => 'logos/cEzQc79iW7SpNjkNGNcmqNxsIOkg7oqkXv8q2SIj.jpg',
                'created_at' => '2025-04-16 23:28:07',
                'updated_at' => '2025-04-17 00:26:22',
            ],
            [
                'id' => 5,
                'name' => 'Sony',
                'slug' => 'sony',
                'logo' => 'logos/3j9RPAFsE85pChw6O6k2GV1Am55H2NwAotukbAyw.jpg',
                'created_at' => '2025-04-16 23:28:35',
                'updated_at' => '2025-04-16 23:32:46',
            ],
            [
                'id' => 6,
                'name' => 'Oppo',
                'slug' => 'oppo',
                'logo' => 'logos/DoAJydndQrNZosaUtjkmneilgY6LHe0zSx67qJlW.jpg',
                'created_at' => '2025-04-16 23:28:51',
                'updated_at' => '2025-04-16 23:31:33',
            ],
            [
                'id' => 7,
                'name' => 'Realme',
                'slug' => 'realme',
                'logo' => 'logos/PBqOhoaKbqv3RC5NeEfsAjabFm2TuHk2KgjBrKiv.jpg',
                'created_at' => '2025-04-16 23:33:00',
                'updated_at' => '2025-04-16 23:33:00',
            ],
            [
                'id' => 8,
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'logo' => 'logos/mrD9vj2kkZ2Guf8JQckS9VmCs8C6oNvsgJYFl9eQ.png',
                'created_at' => '2025-04-16 23:53:55',
                'updated_at' => '2025-04-16 23:53:55',
            ],
        ]);
    }
}
