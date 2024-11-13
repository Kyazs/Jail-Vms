<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InmateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inmates')->insert([      
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'inmate_number' => '12345',
                'cell_number' => 'A1'
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'inmate_number' => '67890',
                'cell_number' => 'B2'
            ]
        ]);
    }
}
