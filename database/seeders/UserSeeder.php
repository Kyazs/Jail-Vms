<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('password'),
                'role_id' => 1
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('password'),
                'role_id' => 2,
            ]
        ]);
    }
}
