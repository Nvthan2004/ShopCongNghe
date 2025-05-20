<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'admin',
                'img' => 'images/1746687839_24a114a24c53f8621973001609780c1d.png',
                'email' => 'huynhvanduy1904@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$f3A/Ox2anqpSbQxGvqcLO..33WLHziFavmlhbb6JE5VgXgqrinH4S',
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => '2025-05-08 00:03:59',
                'updated_at' => '2025-05-08 00:03:59',
            ],
            [
                'id' => 2,
                'username' => 'aaa',
                'img' => 'images/1746689659_03df3f663da40eb38e50a5ef8a60c7846883efba.jpg',
                'email' => 'aaa@gmai.com',
                'email_verified_at' => null,
                'password' => '$2y$10$OxPKlNFufyomw7XenT4lAO8.XEPa2ziEXI6Lis8mHj/64FbfRDRmO',
                'role' => 'user',
                'remember_token' => null,
                'created_at' => '2025-05-08 00:34:19',
                'updated_at' => '2025-05-08 00:34:19',
            ],
        ]);
    }
}
