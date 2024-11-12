<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->insert([
            ['gender_name' => 'Male', 'created_at' => now(), 'updated_at' => now()],
            ['gender_name' => 'Female', 'created_at' => now(), 'updated_at' => now()],
            ['gender_name' => 'Other', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
