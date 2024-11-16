<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IdTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('id_types')->insert([
            ['id_type_name' => 'Passport'],
            ['id_type_name' => 'Driver\'s License'],
            ['id_type_name' => 'National ID'],
            ['id_type_name' => 'Other'],
        ]);
    }
}
