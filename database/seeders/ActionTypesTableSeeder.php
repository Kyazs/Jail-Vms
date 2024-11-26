<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('action_types')->insert([
            ['action_type_name' => 'visitor_registered'],
            ['action_type_name' => 'visitor_updated'],
            ['action_type_name' => 'visitor_blacklisted'],
            ['action_type_name' => 'visitor_unblacklisted'],
            ['action_type_name' => 'inmate_added'],
            ['action_type_name' => 'inmate_updated'],
            ['action_type_name' => 'inmate_deleted'],
            ['action_type_name' => 'visit_started'],
            ['action_type_name' => 'visit_completed'],
            ['action_type_name' => 'visit_cancelled'],
            ['action_type_name' => 'user_added'],
            ['action_type_name' => 'user_updated'],
            ['action_type_name' => 'user_deleted'],
            ['action_type_name' => 'visitor_rejected'],
        ]);
    }
}
