<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visits')->insert([
            [
                'visitor_id' => 1,
                'inmate_id' => 1,
                'relationship' => 'Friend',
                'check_in_time' => now(),
                'check_out_time' => now()->addHours(1),
                'status_id' => 1,
                'visit_duration' => 60
            ],
            [
                'visitor_id' => 1,
                'inmate_id' => 2,
                'relationship' => 'Husband',
                'check_in_time' => now(),
                'check_out_time' => now()->addHours(2),
                'status_id' => 2,
                'visit_duration' => 120
            ],
        ]);
    }
}
