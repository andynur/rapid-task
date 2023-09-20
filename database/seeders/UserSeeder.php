<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_password = 'password';

        $data = [
            [
                'name' => 'ADMIN',
                'email' => 'admin@test.com',
                'password' => Hash::make($default_password),
            ],
            [
                'name' => 'USER',
                'email' => 'user@test.com',
                'password' => Hash::make($default_password),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
