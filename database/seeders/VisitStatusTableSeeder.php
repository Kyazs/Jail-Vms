<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visit_status')->insert([
            ['status_name' => 'in progress'],
            ['status_name' => 'completed'],
            ['status_name' => 'cancelled'],
        ]);
    }
}
